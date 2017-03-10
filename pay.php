<?php 
	$errorMsg = array();
	$headerNbr = false;
	$headerCvv = false;

	if($_POST['cardNumber'] != '' && $_POST['endDate'] != '' && $_POST['cvv'] != ''){
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
		$date = explode('/', $_POST['endDate']);
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
			echo 'Payment sent';
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
	echo 
	'<script type="text/javascript">
		alert(\''.$msg.'\');
		window.location.href = \'index.php\';
	</script>';
	$errorMsg[] = array();
 }
 ?>