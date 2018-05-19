<?php
	header('Content-Type: application/json');
	require_once dirname(__FILE__) . '/Functions.php';
	$fun = new Functions();

	$response = array("error" => FALSE);

	$mahasiswa = $fun->getDataMahasiswa();

	foreach ($mahasiswa as $row) {
		$response["mahasiswa"][] = [
			"nim" => $row["nim"],
			"nama" => $row["nama"],
			"kelas" => $row["kelas"],
			"jurusan" => $row["jurusan"],
		];
	}

	echo json_encode($response);
?>