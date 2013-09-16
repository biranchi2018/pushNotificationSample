<?php
function ms2apple($deviceToken,$message='',$badge='',$sound='default', $data=null) {
	
	// Passphrase for the private key (certhealth.pem file)
	$pass = 'ihcnarib';

	// Get the parameters from http get or from command line

	// Construct the notification payload
	$body = array();

	if ($message)
	$body['aps']['alert'] = $message;

	if ($badge) {
		$body['aps']['badge'] = $badge;
	} else {
		$body['aps']['badge'] = 0;
	}
	$body['aps']['sound'] = $sound;

	/**
	 *	Custom data for app
	 */
	 if(!empty($data)){
		$body['data'] = $data;
	 }

	
	/* End of Configurable Items */
	$payload = json_encode($body);
	

	$current_folder=dirname(__FILE__);
	$certfile=$current_folder."/ck.pem";

	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', $certfile);
	// assume the private key passphase was removed.
	stream_context_set_option($ctx, 'ssl', 'passphrase', $pass);

	$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT, $ctx);
	if (!$fp) {
		print "Failed to connect $err $errstrn";
		//error_log("Failed to connect $err $errstrn");
		return;
	} else {
		print "Connection OK";
	}

	
	$msg = chr(0) . pack("n",32) . pack('H*', str_replace(' ', '', $deviceToken)) . pack("n",strlen($payload)) . $payload;
	//echo $msg;
	fwrite($fp, $msg);
	fclose($fp);
}

//date("d M Y,��h:i��A"); 
//date(DATE_RFC822);

$userData = "Hello Biranchi !!!\n";
$userData .= date("d")." ".date("M")." ".date("Y").", ".date("h").":".date("i").":".date("s")." ".date("A"); 

echo $userData;

//ms2apple("52d7074b c96c55ea 688141f6 28a50693 1b5ff768 95b3e993 410200fc 924e3af6", $userData , 3);

//Biranchi's iPad
ms2apple("1e5022c3 70012a57 1af8d712 044ed1d5 71e74a55 4f869a43 d2879d37 1324a46d",$userData , rand(1,50));


//Biranchi's iPhone
ms2apple("5aaa4ed2 3dccdb58 0ff5777b aa893bd3 06b8528b e878451c e3dbb066 63f52628",$userData , rand(1,50));

?>