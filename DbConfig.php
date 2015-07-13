<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "crudoop"; 

try {
	
	$con = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}catch(PDOException $e){
	
	echo $e->getMessage();
	
}


include_once 'crud.class.php';
$objCrud = new Crud($con);