<?php 
session_start();
if(isset($_SESSION["CUSTOMERCARE_ID"])){
  ob_start();
  header("location: index.php");
  ob_end_flush();	
}
include "scripts/connect_to_mysql.php";
?>
<?php 

$id ="";
$username = "";
$password = "";
$name = "";

$emailErr = $passErr = $mobErr = $flag = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    if (empty($_POST["username"])) {
		$mobErr = "Username is required";
		$flag = 1;
	} else {
	
		$username = $_POST["username"];
     
		$sql = mysql_query(" SELECT `username` FROM `customer_care` WHERE `username` = '$username' ");
		$existCount = mysql_num_rows($sql); // count the row nums
		
		if ($existCount == 0){
		  $mobErr = "Username Doesn't Exist"; 
			$flag = 1;
		} 
	}
    
	if (empty($_POST["password"])) {
		$passErr = "Password is required";
		$flag = 1;
	} else {
		$password = $_POST["password"];
		
		$sql = mysql_query(" SELECT `password` FROM `customer_care` WHERE `password` = '$password' ");
		$existCount = mysql_num_rows($sql); // count the row nums
		
		if ($existCount == 0){
		  $passErr = "Password is Incorrect"; 
			$flag = 1;
		} 
		
	}
	if ($flag !=1) {
   
		$sql = mysql_query("SELECT * FROM customer_care WHERE username = '$username' AND password = '$password'") or die(mysql_error());  // query the person
		// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
		$existCount = mysql_num_rows($sql); // count the row nums
		
		if ($existCount == 1){
			while($row = mysql_fetch_array($sql)){
			
				$id = $row["id"]; 
				$username = $row["username"];
				$name = $row["name"];
		   }
		   
			$_SESSION["CUSTOMERCARE_ID"] = $id;
			$_SESSION["CUSTOMERCARE_USERNAME"] = $username;
			$_SESSION["CUSTOMERCARE_NAME"] = $name;
		   
			ob_start();
			header("location: index.php");
			ob_end_flush();
			exit();
		}
	}	
}
?>

<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Signin Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">

      <form class="form-signin" action="login.php" method="POST" name="login-admin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="" autofocus="">
		<span> <?php echo $mobErr;?> </span>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
		<span> <?php echo $passErr;?> </span>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

</body>
</html>