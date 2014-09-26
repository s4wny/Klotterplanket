<?php
header('Content-Type: application/json');		//Easier for browser to read... Mabey..
$data = array();								//Data to send back as json
$ids = array();
if(isset($_POST["post_ids"]))					//We want the ids of the posts that we have sent, so that we dont send them again.
	$ids = json_decode($_POST["post_ids"]);		//We should mabey not send them as json. But for the time being 

$db = new PDO('mysql:host=localhost;dbname=Klotter;charset=utf8', 'root', 'toor'); //Initiate a connection, 


echo json_encode($data);