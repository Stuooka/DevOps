<?php

$host = 'localhost';
$dbName = 'devops';
$login = 'root';
$pwd = '';

try{
	$db = new PDO('mysql:host='.$host.';dbname='.$dbName, $login, $pwd);
}catch (PDOException $e){
    print 'Error : ' . $e->getMessage();
    die();
}

?>