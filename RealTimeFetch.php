<?php
	session_start();
	
	header('Content-Type: text/xml');
	
	$row_array = array();	
			  
	include "scripts/connect_to_mysql.php";
	
	$sql = mysql_query("SELECT mobile FROM information");
	$numberofrows = mysql_num_rows($sql);
	if($numberofrows > 0){
		while ($row = mysql_fetch_assoc($sql)){
									
			$row_array[] = $row["mobile"];
									
		}
							  
	}
					 
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
	
	echo '<response>';
	
	//$button ="<a class="btn btn-default" href="#" role="button">Link</a>";
		
	$RealTimeInput = $_GET['fetch'];
		
	if ($RealTimeInput == '') {
		echo "Enter Mobile Number in the above field";
			
	}else {
		
		if(in_array($RealTimeInput, $row_array)){
			
		
		echo "Match found : $RealTimeInput, " . "\n" . " Hit the Edit button.";
		
		$_SESSION["mobile"] = $RealTimeInput ;
			
		
			
	}else{
		
		echo "Mobile number not found, " . "\n" . " Hit the Insert button.";
		}
	}
	
	echo '</response>';

?>