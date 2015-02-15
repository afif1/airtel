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

    <title>Product List | Karbar</title>

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
                            Product
                            <small>List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Products
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12">
              <h2 class="sub-header"> Products </h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>ID</th>
					  <th>Name</th>
					  <th>Price</th>
					  <th>Stock</th>
					</tr>
				  </thead>
				  <tbody>
				  
					<?php 
					include "config/connect_to_mysql.php";
					$product_id = "";
					$product_title = "";
					$product_description = "";
					$product_price = "";	
					$product_stock = "";	
					$sql = mysql_query("SELECT * FROM product ORDER BY title") OR DIE(mysql_error());
					$numberofrows = mysql_num_rows($sql);
					if($numberofrows > 0){
						while($row = mysql_fetch_array($sql)){
								$product_id = $row["id"];
								$product_title = $row["title"];
								$product_description = $row["description"];
								$product_price = $row["price"];
								$product_stock = $row["stock"];
								?>
							
							<tr>
							  <td>	<?php echo $product_id; ?>	</td>
							  <td> 	<?php echo $product_title  ?>  </td>
							  <td> 	<?php echo $product_price ?> </td>
							  <td> 	<form action="script_updatestock.php" method="get" name="update">
										<input class="cart_quantity_input" type="hidden" name="id" value="<?php echo $product_id; ?>">
										<input class="cart_quantity_input" type="number" min="0" max="1000" name="stock" value="<?php echo $product_stock; ?>" autocomplete="off" size="2">
										<input type="submit" value="update" class="btn btn-default check_out"/>
									</form>	 </td>
							  <td><a href="product_delete.php?id=<?php echo $product_id ; ?>" class="btn btn-danger">Delete</a></td>
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
