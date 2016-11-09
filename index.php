<?php
	header("content-type: application/json; charset=utf-8");
	header("access-control-allow-origin: *");
	$response=array('status' => 0);
	echo json_encode($response);
?>
