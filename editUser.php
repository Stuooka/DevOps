<?php

	include('dbConnect.php');

	$editSuccess = false;

	$editId = $correctUser['id'];
	$editMoney = $_POST['market'];

	$req = $db->prepare('UPDATE user 
						 SET accountMoney = accountMoney - :accountMoney
						 WHERE id = :id');
	try{
		$req->execute(array(
			'id'=>$editId,
			'accountMoney'=>$editMoney
			)
		);
		$editSuccess = true;
	}catch (PDOException $e){
	    print 'Error : ' . $e->getMessage();
	    $editSuccess = false;
	    die();
	}

	$req->closeCursor();
?>