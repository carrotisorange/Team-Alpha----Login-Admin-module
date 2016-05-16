<?php
  require 'db.php';
  session_start();
  $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="resources/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="resources/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="resources/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="admin.php" class="logo"><b>Grabage</b></a>
            <!--logo end-->
            
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <?php
                    $result = mysqli_query($db,"SELECT * FROM users WHERE email = '$email'");
                    if($row = mysqli_fetch_array($result)) {
                      $name = $row['fname'] . " " . $row['lname'];
                      $fname = $row['fname'];
                    }
                    echo "<p class='centered'><a href='profile.php'><img src='images/$fname.jpg' class='img-circle' width='60'></a></p>";
                    echo "<h5 class='centered'>$name</h5>";
                  ?>
                    
                  <li class="mt">
                      <a class="active" href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Table List</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="products_table.php">View products</a></li>
                          <li><a  href="users_table.php">View Users</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3>PROFILE SETTINGS</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb">YOUR PROFILE</h4>
                      <form class="form-horizontal style-form" method="get">
                        <?php
                          $result = mysqli_query($db,"SELECT * FROM users WHERE email = '$email'");
                          if($row = mysqli_fetch_array($result)) {
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $contactNum = $row['contactNum'];
                            $address = $row['address'];
                            echo "<div class='form-group'>
                                  <label class='col-lg-2 col-sm-2 control-label'>First Name</label>
                                  <div class='col-lg-10'>
                                  <p class='form-control-static'>$fname</p>
                                  </div>
                                  </div>
                                  <div class='form-group'>
                                  <label class='col-lg-2 col-sm-2 control-label'>Last Name</label>
                                  <div class='col-lg-10'>
                                  <p class='form-control-static'>$lname</p>
                                  </div>
                                  </div>
                                  <div class='form-group'>
                                  <label class='col-lg-2 col-sm-2 control-label'>Email</label>
                                  <div class='col-lg-10'>
                                  <p class='form-control-static'>$email</p>
                                  </div>
                                  </div>
                                  <div class='form-group'>
                                  <label class='col-lg-2 col-sm-2 control-label'>Contact Number</label>
                                  <div class='col-lg-10'>
                                  <p class='form-control-static'>$contactNum</p>
                                  </div>
                                  </div>
                                  <div class='form-group'>
                                  <label class='col-lg-2 col-sm-2 control-label'>Address</label>
                                  <div class='col-lg-10'>
                                  <p class='form-control-static'>$address</p>
                                  </div>
                                  </div>
                                  </form>
                                  <button type='button' class='btn btn-default btn-sm' id='editBut'>Edit profile</button>";
                          }
                          ?>
                          
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="resources/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="resources/js/jquery.scrollTo.min.js"></script>
    <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="resources/js/common-scripts.js"></script>
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
