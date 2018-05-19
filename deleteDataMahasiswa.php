<?php
	require_once dirname(__FILE__) . '/Functions.php';
	$fun = new Functions();

	$response = array("error" => FALSE);

	if (isset($_POST["nim"])) {
		$nim = $_POST["nim"];

		$delete = $fun->deleteDataMahasiswa($nim);

		if ($delete) {
			$response["msg"] = "Delete data berhasil";
		} else {
			$response["error"] = TRUE;
			$response["msg"] = "Delete data gagal";
		}
	} else {
		$response["error"] = TRUE;
		$response["msg"] = "Parameter kosong!";
	}

	echo json_encode($response);
?>