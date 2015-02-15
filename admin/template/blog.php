<?php 
session_start();
if(!isset($_SESSION["ADMIN_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

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
                            Blog
                            <small>List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blog
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<!-- Content Row -->
				<div class="row">
					<!-- Content Column -->
					<div class="col-lg-12">
					  <h2 class="sub-header"><a href="createNewBlog.php" class="btn btn-success" >Create New Blog</a> </h2>
					  <div class="table-responsive">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th>Title</th>
							  <th>Posted</th>
							</tr>
						  </thead>
						  <tbody>
						  
						  <?php 
						  include "config/connect_to_mysql.php";
						  $id = "";
						  $title = "";
						  $datetime = "";
						  mysql_query("SET CHARACTER SET utf8", $con);                                    //Extra for Bangla
						  mysql_query("SET SESSION collation_connection=’utf8_general_ci'", $con) ;       //Extra for Bangla
						  $sql = mysql_query("SELECT * FROM blog ORDER BY id DESC");
						  $numberofrows = mysql_num_rows($sql);
						  if($numberofrows > 0){
							  while($row = mysql_fetch_array($sql)){
								$id = $row["id"];
								$title = $row["title"];
								$datetime = $row["datetime"];
									?>
									<tr>
									  <td><a href="../blog/post.php?id=<?php echo $id;?>"><?php echo $title; ?></a></td>
									  <td> <?php echo $datetime ?> </td>
									  <td><a href="blog_delete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
									</tr>
								
									<?php 
								
							}
						}
						?>

						  </tbody>
						</table>
					  </div>
					</div>
				</div>
        <!-- /.row -->
            </div>
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
