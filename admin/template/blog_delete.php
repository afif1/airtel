<?php 
$id = "";
if(isset($_GET["id"])){

	$id = $_GET["id"];
}else{
	ob_start();
	header("location: index.php");
	ob_end_flush();	
}
?>

<?php 
$confirmation = "";
if(isset($_GET["id"]) && isset($_GET["delete"])){

	$id = $_GET["id"];
	
	$confirmation = $_GET["delete"];
	
	include "config/connect_to_mysql.php";
	
	$_sql = mysql_query("DELETE FROM blog WHERE id = $id") 
			or Die(mysql_error());
			
	ob_start();
	header("location: blog.php");
	ob_end_flush();		
	
}else{
	?>
	<html>
	<head>
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<div align = center>
		<h1>Are you sure want to delete?<h1>
		<a href="blog_delete.php?id=<?php echo $id; ?>&delete=yes" class="btn btn-danger">Yes</a>
		<a href="blog.php" class="btn btn-success">No</a>
	</div>
	</html>
	<?PHP
}
?>