<?php
$id = "";
$id = $_GET["id"];
$stock = "";
$stock = $_GET["stock"];

include "config/connect_to_mysql.php";
$updateSQL = mysql_query("UPDATE product SET stock = '$stock' WHERE id = '$id'");

if($updateSQL){
	ob_start();
	header("location: productlist.php");
	ob_end_flush();
}
?>