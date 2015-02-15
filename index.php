<?php 
session_start();
if(!isset($_SESSION["CUSTOMERCARE_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}
?>
<!DOCTYPE html>
<!-- saved from url=(0030)http://aparajito.com/priyojon/ -->
<html lang="en" class="no-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Airtel Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3">
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class">
        <meta name="author" content="Codrops">
        <link rel="shortcut icon" href="Login and Registration Form_files/only_logo.png"> 
        <link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/demo.css">
        <link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/style.css">
		<link rel="stylesheet" type="text/css" href="./Login and Registration Form_files/animate-custom.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<script type="text/javascript" src="js/RealTimeFetch.js"></script>
		
		
	<link href="http://bimajito.aparajito.com/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="./Login and Registration Form_files/jquery-1.9.1.js"></script>
	<script src="./Login and Registration Form_files/jquery-ui-1.10.3.custom.js"></script>
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script>

	
	
	        $(function () {
            $("#dob").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                minDate: "-100Y", maxDate: "+0M"
            });
        });
        
         $(function () {
            $("#ndob").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                minDate: "-100Y", maxDate: "+0M"
            });
        });
		
		



$(document).ready(function () {
    $('.group').hide();
    $('#aparajito_bondhu').show();
    $('#selectMe').change(function () {
        $('.group').hide();
        $('#'+$(this).val()).show();
    })
});


		  
	</script>
 
  
    <link href="./Login and Registration Form_files/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
    <body onload="process()">
        <div class="container">
        	<div class="panel panel-default">
        		
				  <div class="panel-heading">
				    <h3 class="panel-title">Search by phone number</h3>
				  </div>
				  
				  <div class="panel-body">
				   		<form>
				   			<div class="form-group">
							    <label>Mobile Number :</label>
							    <input type="text" id="userInput" class="form-control" placeholder="Enter Mobile Number">
						  </div>
                        
                        </form>
                        <div id="underInput" />						
				  </div>
				  <br><br><br>
				  <a class="btn btn-primary" target="_blank" href="edit.php" role="button">Edit</a>
				  <a class="btn btn-primary" target="_blank" href="insert.php" role="button">Insert</a>
				  
			</div>
			
		</div>	
		<div id="footer">
      <div class="container">
        <p class="muted credit">Do you want to <b> <a style="color:red;" href="logout.php">Logout?</a> </b></p>
      </div>
    </div>

			
</body></html>