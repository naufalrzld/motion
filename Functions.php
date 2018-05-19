<?php
	/**
	* 
	*/
	class Functions {
		private $conn;
		
		function __construct() {
			require_once dirname(__FILE__) . '/DB_Config.php';
			$db = new DB_Config();
			$this->conn = $db->connect();
		}

		public function inputData($nim, $nama, $kelas, $jurusan) {
			$stmt = $this->conn->prepare("INSERT INTO tbl_mahasiswa VALUES(?, ?, ?, ?)");
			$stmt->bind_param("ssss", $nim, $nama, $kelas, $jurusan);
			$result = $stmt->execute();
			$stmt->close();

			if ($result) {
				$stmt = $this->conn->prepare("SELECT * FROM tbl_mahasiswa");
				$stmt->execute();
				$stmt->bind_result($nim, $nama, $kelas, $jurusan);
				$stmt->fetch();

				$mahasiswa = array();
				$mahasiswa["nim"] = $nim;
				$mahasiswa["nama"] = $nama;
				$mahasiswa["kelas"] = $kelas;
				$mahasiswa["jurusan"] = $jurusan;

				$stmt->close();

				return $mahasiswa;
			} else {
				return false;
			}
		}

		public function getDataMahasiswa() {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_mahasiswa");
			$stmt->execute();
			$stmt->bind_result($nim, $nama, $kelas, $jurusan);

			while ($stmt->fetch()) {
				$mahasiswa[] = [
					"nim"=>$nim,
					"nama"=>$nama,
					"kelas"=>$kelas,
					"jurusan"=>$jurusan,
				];
			}

			return $mahasiswa;
		}
	}
?>