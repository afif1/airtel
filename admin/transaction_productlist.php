<?php 
session_start();
if(!isset($_SESSION["ADMIN_ID"])){
	ob_start();
	header("location: login.php");
	ob_end_flush();	
}
?>
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
include "config/connect_to_mysql.php";
$checkoutID = "";
$checkout_transactionID = "";
$checkoutType = "";
$checkoutStatus = "";
$checkoutDateTime = "";
					
$checkout_cartID = "";
$checkout_TotalAmount = "";
					
$sql = mysql_query("SELECT * FROM checkout WHERE transaction_id = '$id'") OR DIE(mysql_error());
$numberofrows = mysql_num_rows($sql);
if($numberofrows > 0){
	while($row = mysql_fetch_array($sql)){
						
		$checkoutID = $row["id"];
		$checkout_transactionID = $row["transaction_id"];
		$checkoutType = $row["type"];
		$checkoutStatus = $row["confirmation"];
		$checkoutDateTime = $row["datetime"];
							
		$checkout_TotalAmount= $row["total_amount"];
							
		$checkout_cartID = $row["cart_id"];
	}
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

    <title><?php echo $id; ?></title>

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
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
							<li>
                                <i class="fa fa-dashboard"></i>  <a href="transaction.php">Transaction List</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Product List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Transaction Information
                        </h1>
                        <ul class="list-group">
						  <li class="list-group-item">
							Transaction Id: <?php echo $checkout_transactionID ; ?>
						  </li>
						  <li class="list-group-item">
							Type: <?php echo $checkoutType; ?>
						  </li>
						  <li class="list-group-item">
							Status: <?php echo $checkoutStatus ; ?>
						  </li>
						  <li class="list-group-item">
							Date/Time: <?php echo $checkoutDateTime ; ?>
						  </li>
						  <li class="list-group-item">
							Total Amount (Delivery Charge Included): <?php echo $checkout_TotalAmount; ?>
						  </li>
						  
						</ul>
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
					  <th>Product Title</th>
					  <th>Product Price</th>
					  <th>Quantity</th>
					  <th>Total Price</th>
					</tr>
				  </thead>
				  <tbody>
				  
					<?php 
					include "config/connect_to_mysql.php";
					$cart_listID = "";
					$cart_ProductId = "";
					$productTitle = "";
					$productPrice = "";
					$cart_listQuantity = "";
					$cart_listPrice = "";
					
					
					$sql_cartList = mysql_query("SELECT * FROM cart_list WHERE cart_id = '$checkout_cartID'");
					$numberofrows_cartList = mysql_num_rows($sql_cartList);
					if($numberofrows_cartList > 0){
						while($row_cartList = mysql_fetch_array($sql_cartList)){
						
							$cart_listID = $row_cartList["id"];
							$cart_ProductId = $row_cartList["product_id"];
							$cart_listQuantity = $row_cartList["quantity"];
							$cart_listPrice = $row_cartList["price"];
							
							$sql_productInfo = mysql_query("SELECT title, price FROM product WHERE id = '$cart_ProductId'");
							$numberofrows_productInfo = mysql_num_rows($sql_productInfo);
							if($numberofrows_cartList > 0){
								while($row_productInfo = mysql_fetch_array($sql_productInfo)){
								
									$productTitle = $row_productInfo["title"];
									$productPrice = $row_productInfo["price"];
								}
							}
							
							?>
							<tr>
								<td><?php echo $productTitle; ?></td>
								<td><?php echo $productPrice; ?></td>
								<td> <?php echo $cart_listQuantity; ?> </td>
								<td> <?php echo $cart_listPrice; ?> </td>
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
