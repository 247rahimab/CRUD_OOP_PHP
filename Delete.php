<?php
include_once 'DbConfig.php';

$id = $_GET['id'];
//echo $id;exit;
$objCrud->deleteData($id);
if($objCrud->deleteData($id)){
	//echo "Delete Successful";
	header("location: index.php");
}else {
	echo "Deleting Problem";
} 