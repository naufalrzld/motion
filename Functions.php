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

			/*
			* $result akan berisi TRUE atau FALSE
			* Jika proses input data berhasil maka $result akan berisi TRUE, jika gagal akan bernilai FALSE
			*/

			return $result;
		}

		public function getDataMahasiswa() {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_mahasiswa");
			$stmt->execute();
			$stmt->bind_result($nim, $nama, $kelas, $jurusan);

			$mahasiswa = array();

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

		public function updateDataMahasiswa($nim, $nama, $kelas, $jurusan) {
			$stmt = $this->conn->prepare("UPDATE tbl_mahasiswa SET nama = ?, kelas = ?, jurusan = ? WHERE nim = ?");
			$stmt->bind_param("ssss", $nama, $kelas, $jurusan, $nim);
			$result = $stmt->execute();
			$stmt->close();

			/*
			* $result akan berisi TRUE atau FALSE
			* Jika proses update data berhasil maka $result akan berisi TRUE, jika gagal akan bernilai FALSE
			*/

			return $result;
		}

		public function deleteDataMahasiswa($nim) {
			$stmt = $this->conn->prepare("DELETE FROM tbl_mahasiswa WHERE nim = ?");
			$stmt->bind_param("s", $nim);
			$result = $stmt->execute();
			$stmt->close();

			/*
			* $result akan berisi TRUE atau FALSE
			* Jika proses update data berhasil maka $result akan berisi TRUE, jika gagal akan bernilai FALSE
			*/

			return $result;
		}
	}
?>