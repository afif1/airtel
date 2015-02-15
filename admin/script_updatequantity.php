<?php
session_start();
$USER_ID = "";
if(!isset($_SESSION["USER_ID"])){
	//ob_start();
	//header("location: ../Bondhujito/login.php");
	//ob_end_flush();
	echo '<script type="text/javascript">'; 
	echo 'alert("You are not logged in Karbar!");'; 
	echo 'window.location.href = "../Bondhu/login.php";';
	echo '</script>';
	die();
}else{
	$USER_ID = $_SESSION["USER_ID"];
}
include("connect_to_mysql.php");

//------------------------------------------------------------------------------------------

$list_id = "";
$list_id = $_GET["list_id"];
$quantity = "";
$quantity = $_GET["quantity"];

$product_id = "";
$product_id = $_GET["product_id"];
$product_price = "";

$sql = mysql_query("SELECT * FROM product WHERE id = '$product_id'");
$numberofrows = mysql_num_rows($sql);
if($numberofrows > 0){
	while($row = mysql_fetch_array($sql)){
		$product_price = $row["price"];
	}
}

$product_price = $product_price * $quantity;

$updateSQL = mysql_query("UPDATE cart_list SET quantity = '$quantity', price = '$product_price' WHERE id = '$list_id'");

if($updateSQL){
	ob_start();
	header("location: ../cart.php");
	ob_end_flush();
}
?>