<?php

session_start();
if(!isset($_SESSION["ADMIN_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();
}
?>

<?php

$msg = "";

$title = "";
$description = "";
$price = "";
$stock = "";
$vendor = "";
$category = "";
$sub_category = "";
$sub_sub_category = "";
$date = "";




if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["title"])) {



     $title = test_input($_POST["title"]);
	 $description = $_POST["description"];
	 $price = test_input($_POST["price"]);
	 $stock = test_input($_POST["stock"]);
	 $vendor = test_input($_POST["vendor"]);
	 $category = test_input($_POST["category"]);
	 $sub_category = test_input($_POST["sub_category"]);
	 $sub_sub_category = test_input($_POST["sub_sub_category"]);
	 $date = date("Y-m-d H:i:s");

		include "config/connect_to_mysql.php";
		$sql = mysql_query("INSERT INTO `product`(`title`, `description`, `price`, `stock`, `vendor`, `category`, `sub_category`, `sub_sub_category`, `entry_date`)
							VALUES (
									'$title',
									'$description',
									'$price',
									'$stock',
									'$vendor',
									'$category',
									'$sub_category',
									'$sub_sub_category',
									'$date'
									)")or die(mysql_error());

		$Photo_id = mysql_insert_id();

		$newname = "$Photo_id.jpg";
		move_uploaded_file($_FILES['image']['tmp_name'], "../images/product/$newname");


		if($sql){
			ob_start();
			header("location: addproduct.php");
			ob_end_flush();
			exit();
	    }else{
			$msg = "Unsuccessfull";
		}
		//mysql_close($con);


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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Karbar Admin Panel</title>

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

	<script type="text/javascript">
	var ar_ext = ['JPEG', 'JPG', 'jpeg', 'jpg', 'PNG', 'png'];        // array with allowed extensions

	function checkName(el) {

	  // get the file name and split it to separe the extension
	  var name = el.value;
	  var ar_name = name.split('.');

	  // check the file extension
	  var re = 0;
	  for(var i=0; i<ar_ext.length; i++) {
	    if(ar_ext[i] == ar_name[1]) {
	      re = 1;
	      break;
	    }
	  }

	  // if re is 1, the extension is in the allowed list
	  if(re==1) {


	  }
	  else {
	    // delete the file name, disable Submit, Alert message
	    el.value = '';
	    alert('".'+ ar_name[1]+ '" is not an file type allowed for upload');
	  }
	}
	</script>

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
                            Dashboard - Add Product
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard

                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div class="row">

                    <form class="col-md-12"  name="name" action='addproduct.php' method='post' enctype="multipart/form-data">

					<div class="form-group" >
				        <input type="text" name="title" class="form-control input-lg" placeholder="Title" required="required">
				    </div>
				    <!--<div class="form-group" >
				        <input type="text" name="description" class="form-control input-lg" placeholder="Description" required="required">
				    </div>-->
					<div class="form-group" >
				        <textarea name="description" class="form-control input-lg" rows="10" placeholder="Description" required="required"></textarea>
				    </div>
				    <div class="form-group" >
				        <input type="number" name="price" class="form-control input-lg" placeholder="Price" required="required">
				    </div>
				    <div class="form-group" >
				        <input type="number" name="stock" class="form-control input-lg" placeholder="Stock" required="required">
				    </div>
					<div class="form-group">
				       <select name="vendor" class="form-control">

						   <?php


							  $vendor = "";
							  $vendor_id = "";

							  include "config/connect_to_mysql.php";
							  $sql = mysql_query("SELECT * FROM vendor");
							  $numberofrows = mysql_num_rows($sql);
							  if($numberofrows > 0){
							  while($row = mysql_fetch_array($sql)){
								$vendor = $row["name"];
								$vendor_id = $row["id"];

								?>
								  <option value="<?php echo $vendor_id; ?>"><?php echo $vendor; ?></option>
								<?php
								}
							}
							?>
						  </select><br />

						  <select name="category" class="form-control">

						   <?php


							  $category = "";
							  $category_id = "";

							  include "config/connect_to_mysql.php";
							  $sql = mysql_query("SELECT * FROM category");
							  $numberofrows = mysql_num_rows($sql);
							  if($numberofrows > 0){
							  while($row = mysql_fetch_array($sql)){
								$category = $row["name"];
								$category_id = $row["id"];

								?>
								  <option value="<?php echo $category_id; ?>"><?php echo $category; ?></option>
								<?php
								}
							}
							?>
						  </select><br />

						  <select name="sub_category" class="form-control">

						   <?php


							  $sub_category = "";
							  $sub_category_id = "";

							  include "config/connect_to_mysql.php";
							  $sql = mysql_query("SELECT * FROM sub_category");
							  $numberofrows = mysql_num_rows($sql);
							  if($numberofrows > 0){
							  while($row = mysql_fetch_array($sql)){
								$sub_category = $row["name"];
								$sub_category_id = $row["id"];

								?>
								  <option value="<?php echo $sub_category_id; ?>"><?php echo $sub_category; ?></option>
								<?php
								}
							}
							?>
						  </select><br />

						  <select name="sub_sub_category" class="form-control">

						   <?php


							  $sub_sub_category = "";
							  $sub_sub_category_id = "";

							  include "config/connect_to_mysql.php";
							  $sql = mysql_query("SELECT * FROM sub_sub_category");
							  $numberofrows = mysql_num_rows($sql);
							  if($numberofrows > 0){
							  while($row = mysql_fetch_array($sql)){
								$sub_sub_category = $row["name"];
								$sub_sub_category_id = $row["id"];

								?>
								  <option value="<?php echo $sub_sub_category_id; ?>"><?php echo $sub_sub_category; ?></option>
								<?php
								}
							}
							?>
						  </select>


					</div>
					<div class="form-group">

				        <input type="file" name="image" id="image" class="form-control input-lg" placeholder="Put your image" onchange="checkName(this)" title="Please upload only image file.">

				    </div>

				    <div class="form-group">
				        <input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value='Save' >
				    </div>
			</form>


                </div>
                <!-- /.row

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge">just now</span>
                                        <i class="fa fa-fw fa-calendar"></i> Calendar updated
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">4 minutes ago</span>
                                        <i class="fa fa-fw fa-comment"></i> Commented on a post
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">23 minutes ago</span>
                                        <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">46 minutes ago</span>
                                        <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1 hour ago</span>
                                        <i class="fa fa-fw fa-user"></i> A new user has been added
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2 hours ago</span>
                                        <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">yesterday</span>
                                        <i class="fa fa-fw fa-globe"></i> Saved the world
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">two days ago</span>
                                        <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                                    </a>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order Time</th>
                                                <th>Amount (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr>
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr>
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
                                            <tr>
                                                <td>3321</td>
                                                <td>10/21/2013</td>
                                                <td>2:23 PM</td>
                                                <td>$245.12</td>
                                            </tr>
                                            <tr>
                                                <td>3320</td>
                                                <td>10/21/2013</td>
                                                <td>2:15 PM</td>
                                                <td>$5663.54</td>
                                            </tr>
                                            <tr>
                                                <td>3319</td>
                                                <td>10/21/2013</td>
                                                <td>2:13 PM</td>
                                                <td>$943.45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
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
