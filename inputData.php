<?php
	require_once dirname(__FILE__) . '/Functions.php';
	$fun = new Functions();

	$response = array("error" => FALSE);

	if (isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"]) && isset($_POST["jurusan"])) {
		$nim = $_POST["nim"];
		$nama = $_POST["nama"];
		$kelas = $_POST["kelas"];
		$jurusan = $_POST["jurusan"];

		$mahasiswa = $fun->inputData($nim, $nama, $kelas, $jurusan);

		if ($mahasiswa) {
			$response["msg"] = "Input data berhasil";
			
			echo json_encode($response);
		} else {
			$response["error"] = TRUE;
			$response["msg"] = "Input data gagal";
			echo json_encode($response);
		}
	} else {
		$response["error"] = TRUE;
		$response["msg"] = "Parameter kosong!";
		echo json_encode($response);
	}
?>