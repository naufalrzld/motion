<?php
	//header('Content-Type: application/json');
	require_once dirname(__FILE__) . '/Functions.php';
	$fun = new Functions();

	$response = array("error" => FALSE);

	$mahasiswa = $fun->getDataMahasiswa();

	if ($mahasiswa) {
		foreach ($mahasiswa as $row) {
			$response["mahasiswa"][] = [
				"nim" => $row["nim"],
				"nama" => $row["nama"],
				"kelas" => $row["kelas"],
				"jurusan" => $row["jurusan"],
			];
		}
	} else {
		$response["error"] = TRUE;
		$response["msg"] = "Tidak ada data!";
	}

	echo json_encode($response);
?>