<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?></title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<script src="assets/js/jquerymin.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mybookmart</a>
            </div>

            <div class="header-right">

                <!--<a href="#" class="btn btn-info" title="New Message"><b></b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>0 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>-->

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                Mybookmart
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a  href="index.php" style="font-size:20px"><i class="fa fa-dashboard "></i>Make Sale</a>
                    </li>
					
					 <li>
                        <a href="#" style="font-size:20px"><i class="fa fa-yelp "></i>Sale report<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
						 <li>
                                <a href="today_sale.php" style="font-size:20px"><i class="fa fa-plus"></i>Today Sales</a>
                            </li>
                            <li>
                                <a href="overall_sale.php" style="font-size:20px"><i class="fa fa-plus"></i>Overall Sales</a>
                            </li>						
							</ul>
                    </li>
					
					<li>
                        <a  href="add_product.php" style="font-size:20px"><i class="fa fa-plus "></i>Add Product</a>
                    </li>
					<li>
                        <a  href="view_products.php" style="font-size:20px"><i class="fa fa-eye "></i>View Product</a>
                    </li>
					<li>
                        <a  href="view_customer.php" style="font-size:20px"><i class="fa fa-eye "></i>View Customer & Invoice</a>
                    </li>
					
					
		
					 <li>
                        <a href="#" style="font-size:20px"><i class="fa fa-yelp "></i>Stock<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
						 <li>
                        <a  href="add_stock.php" style="font-size:20px"><i class="fa fa-plus "></i>Add Stock</a>
						</li>
                            <li>
                                <a href="view_stock_addition_detail.php" style="font-size:20px"><i class="fa fa-plus"></i>View Stock Addition Detail</a>
                            </li>						
							</ul>
                    </li>
                    
                </ul>

            </div>

        </nav>