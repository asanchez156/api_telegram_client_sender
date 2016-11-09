<?php
	header("content-type: application/json; charset=utf-8");
        header("access-control-allow-origin: *");


	ini_set('date.timezone', 'Europe/Berlin');
	//$file = "log_" . date("Y-m-d",time());
	//file_put_contents("./logs/" . $file, $HTTP_RAW_POST_DATA);

	$output = shell_exec("python ./send_message.py Andoni 'Works!'");

        $response=array('status' => $output);
        echo json_encode($response);
