<?php
	require_once dirname(__FILE__) . '/Functions.php';
	$fun = new Functions();

	$response = array("error" => FALSE);

	if (isset($_POST["nim"]) && isset($_POST["nama"]) && isset($_POST["kelas"]) && isset($_POST["jurusan"])) {
		$nim = $_POST["nim"];
		$nama = $_POST["nama"];
		$kelas = $_POST["kelas"];
		$jurusan = $_POST["jurusan"];

		$update = $fun->updateDataMahasiswa($nim, $nama, $kelas, $jurusan);

		if ($update) {
			$response["msg"] = "Update data berhasil";
		} else {
			$response["error"] = TRUE;
			$response["msg"] = "Update data gagal";
		}
	} else {
		$response["error"] = TRUE;
		$response["msg"] = "Parameter kosong!";
	}

	echo json_encode($response);
?>