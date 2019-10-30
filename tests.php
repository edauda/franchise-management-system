<?php
	/*$fullname = "Emmanuel Dauda ";
	list($fname,$lname,$oname) = explode(' ', $fullname);
	echo $fname ."<br/>";
	echo $lname ."<br/>";
	if(empty($oname)){
		$oname="";
	}
	else{
		 $oname = $oname;
		 echo $oname;
	}
	echo 'This message';*/


require_once __DIR__.'/vendor/autoload.php';
$messagebird = new MessageBird\Client('zSSGmxJ0dQzmexRATV6U6ZzaD');
$message = new MessageBird\Objects\Message;
$message->originator = '+2348134001202';
$message->recipients = [ '+2348134001202' ];
$message->body = 'Hello World, I am a text message and I was hatched by PHP code!';
$response = $messagebird->messages->create($message);
var_dump($response);

?>