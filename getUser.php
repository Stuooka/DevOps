<?php
	
	include('dbConnect.php');

	$response = $db->query('SELECT * FROM user');
	$users = array();

	while($data = $response->fetch()){
		$user=array();
		$user['id'] =$data['id'];
		$user['firstName']= $data['firstName'];
		$user['lastName']= $data['lastName'];
		$user['accountMoney']= $data['accountMoney'];
		$user['cardNumber']= $data['cardNumber'];
		$user['expirationDate']= $data['expirationDate'];
		$user['cvv']= $data['cvv'];
		array_push($users, $user);
	}
	
	$response->closeCursor();
?>