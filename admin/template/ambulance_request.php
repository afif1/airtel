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

    <title>Admin - Ambulance</title>

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
                            Ambulance
                            <small>Requests</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Requests
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> Patient ID </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Address</th>
					  <th>City</th>
					  <th>Type</th>
					</tr>
				  </thead>
				  <tbody>
				  
				  <?php 
				  include "config/connect_to_mysql.php";
				  $id = "";
				  $Name = "";
				  $Email = "";
				  $Address = "";
				  $City = "";
				  $Type = "";
				  $Verified = "";
				  $sql = mysql_query("SELECT * FROM ambulance_request ORDER BY id DESC");
				  $numberofrows = mysql_num_rows($sql);
				  if($numberofrows > 0){
					  while($row = mysql_fetch_array($sql)){
						
							$id = $row["id"];
							$Name = $row["name"];
							$Email = $row["email"];
							$Address = $row["address"];
							$City = $row["city"];
							$Type = $row["type"];
							$Verified = $row["verified"];
							
							if ($Verified == "no"){
							?>
							<tr>
							  <td><?php echo $Name; ?></td>
							  <td> <?php echo $Email; ?> </td>
							  <td> <?php echo $Address; ?> </td>
							  <td> <?php echo $City; ?> </td>
							  <td> <?php echo $Type; ?> </td>
							  
							  
							  <td><a href="ambulance_verify.php?ID=<?php echo $id; ?>" class="btn btn-primary">Verify</a></td>
							  
							</tr>
						
							<?php 
							}else{
							?>
							
							<tr>
							  <td><?php echo $Name; ?></td>
							  <td> <?php echo $Email; ?> </td>
							  <td> <?php echo $Address; ?> </td>
							  <td> <?php echo $City; ?> </td>
							  <td> <?php echo $Type; ?> </td>
							  
							  <td>
							  
							  </td>
							  
							</tr>
							
							<?php
							
							}
						
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
