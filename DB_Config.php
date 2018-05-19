<?php
	/**
	* 
	*/
	class DB_Config {
		private $conn;

		public function connect() {
			$this->conn = new mysqli("localhost", "root", "", "mahasiswa");

			if (mysqli_connect_errno()) {
				echo "Koneksi gagal";
			}

			return $this->conn;
		}
	}
?>