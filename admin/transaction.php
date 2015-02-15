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

    <title>Transactions</title>

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
                            Transactions
                            <small>List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Transaction
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> Transactions </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>Serial</th>
					  <th>Transaction ID</th>
					  <th>Transaction Type</th>
					  <th>Total Amount</th>
					  <th>Status</th>
					  <th>Date/Time</th>
					  <th>Products</th>
					</tr>
				  </thead>
				  <tbody>
				  
					<?php 
					include "config/connect_to_mysql.php";
					$checkoutID = "";
					$checkout_transactionID = "";
					$checkoutType = "";
					$checkoutStatus = "";
					$checkoutDateTime = "";
					
					$checkout_cartID = "";
					$checkout_TotalAmount = "";
					
					$sql = mysql_query("SELECT * FROM checkout ORDER BY id DESC");
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
						
							$checkoutID = $row["id"];
							$checkout_transactionID = $row["transaction_id"];
							$checkoutType = $row["type"];
							$checkoutStatus = $row["confirmation"];
							$checkoutDateTime = $row["datetime"];
							
							$checkout_TotalAmount = $row["total_amount"];
							
							$checkout_cartID = $row["cart_id"];
							
							
							//$sql_productCount = mysql_query("SELECT id FROM checkout ORDER BY id DESC");
							//$numberofrows_productCount = mysql_num_rows($sql_productCount);
							$result = mysql_query("SELECT count(*) as total FROM cart_list WHERE cart_id = '$checkout_cartID'");
							$data = mysql_fetch_assoc($result);
							?>
							<tr>
								<td><?php echo $checkoutID; ?></td>
								<td><?php echo $checkout_transactionID; ?></td>
								<td> <?php echo $checkoutType; ?> </td>
								<td> <?php echo $checkout_TotalAmount; ?> </td>
								<td> <?php echo $checkoutStatus; ?> </td>
								<td> <?php echo $checkoutDateTime; ?> </td>
								<td> <!-- Product button -->
									<button class="btn btn-primary" type="button" onclick="window.location.href='transaction_productlist.php?id=<?php echo $checkout_transactionID; ?>'">
										Products <span class="badge"><?php echo $data['total'];?></span>
									</button>
								</td>
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
