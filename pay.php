<?php 
	// All users are stored in $users[]
	include 'getUser.php';

	$errorMsg = array();
	$headerUsr = false;
	$headerNbr = false;
	$headerCvv = false;
	$foundUser = false;

	if($_POST['firstName'] != '' && $_POST['lastName'] != '' && $_POST['cardNumber'] != '' && $_POST['expirationDate'] != '' && $_POST['cvv'] != ''){
		/* CARD NUMBER*/
		if(strlen($_POST['cardNumber']) != 16){
			$errorMsg[] = '--Card Number--';
			$headerNbr = true;
			$errorMsg[] = '    Require 16 digits. No more, no less';
		}
		if(!preg_match("/^[0-9]*$/", $_POST['cardNumber'])){
			if(!$headerNbr) $errorMsg[] = '--Card Number--';
			$errorMsg[] = '   Only digits are allowed';
		}

		/* END DATE */
		$now = new \DateTime('now');
		$nowMonth = $now->format('m');
		$nowYear = $now->format('Y');
		$date = explode('/', $_POST['expirationDate']);
		if(((int)$date[1] < $nowYear) || ((int)$date[1] == $nowYear && (int)$date[0] < $nowMonth)){
			$errorMsg[] = '--End Date--';
			$errorMsg[] = '   Card expired';
		}

		/* CVV */
		if(strlen($_POST['cvv']) != 3){
			$errorMsg[] = '--CVV--';
			$headerCvv = true;
			$errorMsg[] = '   Require 3 digits. No more, no less';
		}
		if(!preg_match("/^[0-9]*$/", $_POST['cvv'])){
			if(!$headerCvv) $errorMsg[] = '--CVV--';
			$errorMsg[] = '   Only digits are allowed';
		}

		//if there's any error, call the redirect function
		if(sizeof($errorMsg)>0){
			errorRedirect($errorMsg);
		}else{
			foreach ($users as $user) {
				//Data's format is correct. Now we test if the datas themselves are corret, if the user exist.
				if(strtolower($_POST['firstName']) == strtolower($user['firstName']) && strtolower($_POST['lastName']) == strtolower($user['lastName']) 
					&& $_POST['cardNumber'] == $user['cardNumber'] && $_POST['expirationDate'] == $user['expirationDate'] 
					&& $_POST['cvv'] == $user['cvv']){
					$foundUser = true;
				}
			}
			if(!$foundUser) 
				$errorMsg[] = 'Unknown user. Please be sure you\'ve entered the right informations';

			if(sizeof($errorMsg)>0){
				errorRedirect($errorMsg);
			}else{
				echo 'Payment sent';
			}
		}
	}else{
		$errorMsg[] = 'Please, fill all datas'; 
		errorRedirect($errorMsg);
	}


 function errorRedirect($messages)
 {
 	$msg= '';
 	for ($i=0; $i < count($messages); $i++) {
 		$msg .= $messages[$i] . "\\n";
 	}
 	var_dump($msg);
	echo( 
		'<script type="text/javascript">
			alert(\''.$msg.'\');
			window.location.href = \'index.php\';
		</script>');
	$errorMsg[] = array();
 }
 ?>