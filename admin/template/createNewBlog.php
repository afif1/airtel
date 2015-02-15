<?php 
session_start();
if(!isset($_SESSION["ADMIN_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}

include "config/connect_to_mysql.php";
?>

<!-- pat_reg_script_start -->
<?php 
header('Content-Type: text/html;charset=UTF-8');
$newID = "";
$newImageID = "";

$title = "";
$name = "";
$datetime = "";
$body = "";


$flag = "";	
$bodyErr = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_POST["InputPost"])){
	
		$bodyErr = "Body field is empty";
		$flag = 1;
		
	}else{
	
		$title = $_POST["InputTitle"];
		$name = $_POST["InputName"];
		$datetime = $_POST["InputDateTime"];
		$body = $_POST["InputPost"];
	
	}
	
	
	if ($flag != 1 ){
	
		mysql_query("SET CHARACTER SET utf8", $con);                                    //Extra for Bangla
		mysql_query("SET SESSION collation_connection=’utf8_general_ci'", $con);       //Extra for Bangla
		
		$sql = mysql_query("INSERT INTO `blog`(`name`, `title`, `body`, `datetime`) 
							VALUES ('$name', '$title', '$body', '$datetime')");
							
		$newID = mysql_insert_id();
		
		if(isset($_FILES['InputImage']) && $_FILES['InputImage']['error'] == 0) {
             
            $allowedExts = array("JPEG", "jpeg", "jpg", "JPG");
            $temp = explode(".", $_FILES["InputImage"]["name"]);
            $extension = end($temp);
             
            if ((
               ($_FILES["InputImage"]["type"] == "image/JPEG")
            || ($_FILES["InputImage"]["type"] == "image/jpeg")
            || ($_FILES["InputImage"]["type"] == "image/jpg")
			|| ($_FILES["InputImage"]["type"] == "image/png")
            || ($_FILES["InputImage"]["type"] == "image/PNG")
            || ($_FILES["InputImage"]["type"] == "image/JPG"))
            && in_array($extension, $allowedExts)){
    
                if($_FILES['InputImage']['size'] > 1048576){ //1 MB (size is also in bytes)
                    
					ob_start();
					header("location: createNewBlog.php"); 
					ob_end_flush();
					exit();
					
                } else{ 
				
					$_sql = mysql_query("INSERT INTO `blog_image`(`blog_id`) 
														VALUES ('$newID')");
							
					$newImageID = mysql_insert_id();
					$newgallery = "$newImageID.jpg";
					
                    move_uploaded_file( $_FILES['InputImage']['tmp_name'], "../blog/gallery/$newgallery");

                    }
            }else{
				ob_start();
				header("location: createNewBlog.php"); 
				ob_end_flush();
				exit();
			
			}
        }
		if($sql){
			ob_start();
			header("location: blog.php"); 
			ob_end_flush();
			exit();
	    }else{
			echo $msg = "Unsuccessfull";
		}
		
	}
   
}

function test_input($data) {

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
		<?php include_once("include_templates/navigation.php"); ?>

		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create a new
                            <small>Blog</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Create Blog
                            </li>
                        </ol>
                    </div>
                </div>
				
				<div class="row">
					<form role="form" action="createNewBlog.php" method="POST" name="blog-form" accept-charset="ISO-8859-1" enctype="multipart/form-data">
						<div class="col-lg-6">
							<div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" name="InputTitle" id="InputTitle" placeholder="Enter Title" required>
									<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="InputName" name="InputName" placeholder="Enter Name">
									<span class="input-group-addon"><span></span></span>
								</div>
							</div>
							
							<?php 
							$pick_datetime = "";
							
							date_default_timezone_set('Asia/Dacca'); // your user's timezone
							$my_datetime = date('Y-m-d H:i:s');
							$pick_datetime = date('Y-m-d H:i:s',strtotime("$my_datetime GMT+06:00"));
							?>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="InputDateTime" name="InputDateTime" placeholder="Enter Date Time" value="<?php echo $pick_datetime;?>"required>
									<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<textarea name="InputPost" id="InputPost" class="form-control" rows="5" required></textarea>
									<span class="input-group-addon"><?php echo $bodyErr; ?><span class="glyphicon glyphicon-asterisk"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="file" class="form-control" id="InputImage" name="InputImage" placeholder="Select Image" >
									<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
								</div>
							</div>
							
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
						</div>
					</form>
				</div>
                <!-- /.row -->
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
