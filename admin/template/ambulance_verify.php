<?php 
session_start();
if(!isset($_SESSION["ADMIN_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}
?>
<?php 
$id = "";
if(isset($_GET["ID"])){

	$id = $_GET["ID"];
	
	include "config/connect_to_mysql.php";	

	$confirm_sql = mysql_query("UPDATE ambulance_request SET verified = 'yes' WHERE id = '$id'") or Die(mysql_error());
			
	ob_start();
	header("location: ambulance_request.php"); 
	ob_end_flush();
	exit();
}
	
	
	
?>