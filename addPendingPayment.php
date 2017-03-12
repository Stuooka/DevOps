<?php

	include('dbConnect.php');

	$addPaymentSuccess = false;

	$userId=$correctUser['id'];
	$money=$_POST['market'];
	$transactionDate= date('Y-m-d');
	$dueDate = date("Y-m-d", strtotime("$transactionDate +7 day"));

	$req = $db->prepare('INSERT INTO pendingpayment (userId, money, transactionDate, dueDate) VALUES (:userId, :dueMoney, :transactionDate, :dueDate)');

	try{
		$req->execute(array(
			'userId'=>$userId,
			'dueMoney'=>$money,
			'transactionDate'=>$transactionDate,
			'dueDate'=>$dueDate
			)
		);
		$addPaymentSuccess = true;
	}catch (PDOException $e){
	    print 'Error : ' . $e->getMessage();
	    $addPaymentSuccess = false;
	    die();
	}

	$req->closeCursor();
?>