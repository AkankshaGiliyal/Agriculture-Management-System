<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo"> <h2>Farm Management</h2>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-home"></i><span>home</span></a>
                            </li>


                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-pagelines"></i>
                                    <span>Crop</span></a>
                               <!-- <ul class="collapse">
                                    <li><a href="table-basic.html">basic table</a></li>
                                    <li><a href="table-layout.html">table layout</a></li>
                                    <li><a href="datatable.html">datatable</a></li>
                                </ul>  -->

                            </li>

                           <li class="active">
                                <a href="warehouse.php" aria-expanded="true"><i class="fa fa-building"></i><span>Warehouse</span></a>
                            </li>
                           <li>
                                <a href="field.php" aria-expanded="true"><i class="fa fa-leaf"></i><span>field</span></a>
                            </li>
                           <li>
                                <a href="fieldworker.php" aria-expanded="true"><i class="fa fa-user"></i><span>Field Worker</span></a>
                            </li>
                          <li>
                                <a href="pesticide.php" aria-expanded="true"><i class="fa fa-tint"></i><span>pesticide</span></a>
                          
                            </li>


                                </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->



        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div> 
                    </div>

                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">

                    </div>
                </div>
            </div>

            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Item Records</span></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- page title area end -->
            <div>

     <h1 style="text-align:center">Add Item Here</h1>
            <body>
<form method="POST" class="form-inline" action="warehouseadditem.php">
 
 <!-- <div class="form-group">
    <label for="name">Warehouse ID</label>
    <input type="text" class="form-control" name="warehouse_id">

  </div> 
-->

  <div class="form-group">
    <label for="name">Warehouse location</label>
    <input type="text" class="form-control" name="warehouse_location">
  </div>
  <div class="form-group">
        <label for="name">Warehouse name</label>
        <input type="text" class="form-control" name="warehouse_name">
    </div>
   <div class="form-group">
       <label for="name">Availability</label>
       <input type="text" class="form-control" name="availability">
    </div>

  <button type="submit" class="btn btn-default" name="add">Add item</button>

</form>
</body>
            <div class="main-content-inner">
                <div class="row">

                    <!-- Contextual Classes start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Warehouse</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <th scope="col">Warehouse ID</th>
                                                    <th scope="col">Warehouse location</th>
                                                    <th scope="col">Warehouse name </th>
                                                    <th scope="col">Availability</th>
                                            </tr>
                                            </thead>
                                            <tbody>
			<?php
               $conn = new mysqli("localhost","root","","agriculturemanagement");
               $sql = "SELECT * FROM warehouse";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {

                 while ($row = $result->fetch_assoc())
				 {
			
                   ?>


                   <tr>
                  <!--  <th><?php echo $count ?></th>   -->
                      <th><?php echo $row["warehouse_id"] ?></th>
                      <th><?php echo $row["location"] ?></th>
                      <th><?php echo $row["name"]  ?></th>
                      <th><?php echo $row["availability"]  ?></th>

                    <th> 
     <!-- <a href="up"Edit</a><a href="edit.php?id=<?php echo $row["warehouse_id"] ?>">Edit</a> <a href="up"Edit</a>  -->
   
                    <a href="warehousedelete.php?id=<?php echo $row["warehouse_id"] ?>">Delete</a></th>


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
                        </div>
                        <div>


</div>
                    </div>
                    <!-- Contextual Classes end -->

        <!-- main content area end -->

<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

</html>







    </div>
    <!-- page container area end -->
    <!-- offset area start -->

    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
