<?php
	header("content-type: application/json; charset=utf-8");
        header("access-control-allow-origin: *");
	header("Access-Control-Allow-Methods: GET, POST");


	ini_set('date.timezone', 'Europe/Berlin');
	$file = "../indaba/logs/log_" . date("Y-m-d",time());
	$file_data = file_get_contents($file);
	$ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
	$data = $file_data . $ip . " - " . date("H:i:s",time()) . "-> " . $HTTP_RAW_POST_DATA . "\n";
	file_put_contents($file, $data);
	$json_object = json_decode($HTTP_RAW_POST_DATA);

	if (!isset($json_object->user)){
		$response=array("status" => 1, "msg" => "Error user is not set");
	} else if (!isset($json_object->msg)){
		$response=array("status" => 2, "msg" => "Error msg is not set");
	} else {
		$user = $json_object->user;
		$msg = $json_object->msg;

		shell_exec("python ./send_message.py Andoni 'To " . $user . ": " . $msg ."'");

		$cmd="python ./send_message.py '". $user . "' '" . $msg ."'";

		$output = shell_exec($cmd);

		if($output==0){
			$msg_output="Success";
		}else{
			$output=3;
			$msg_output="Unknown error";
		}

        	$response=array("status" => $output, "msg" => $msg_output);
        	
		//shell_exec("python ./send_message.py Andoni 'Sent'");
	}

	echo json_encode($response);
