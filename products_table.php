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

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="resources/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/style-responsive.css" rel="stylesheet">

    <link href="resources/css/table-responsive.css" rel="stylesheet">
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
                      <a href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="active"  >
                          <i class="fa fa-desktop"></i>
                          <span>Table List</span>
                      </a>
                      <ul class="sub">
                          <li><a href="products_table.php" >View products</a></li>
                          <li><a href="users_table.php">View Users</a></li>
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
          	<h3>LIST OF PRODUCTS</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4>Products</h4>
                          <section id="unseen">
                          <?php
                            $result = mysqli_query($db,"SELECT * FROM products");
                            echo'<table class="table table-bordered table-striped table-condensed">
                                            <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Description</th>
                                                <th>Owner Name</th>
                                                <th>Category</th>
                                                <th class="numeric">Date Posted</th>
                                                <th>Approved</th>
                                                <th>Taken</th>  
                                            </tr>
                                            </thead>';
                            while($row = mysqli_fetch_array($result)) {
                              $person = $row['donorid'];
                              if($row['isApproved' == 'N']) {
                                $approve = "Not Yet";
                              }
                              else {
                                $approve = "Yes";
                              }
                              if($row['isTaken'] == 'N') {
                                $taken = "Not Yet";
                              }
                              else {
                                $taken = "Yes";
                              }
                              $query = mysqli_query($db, "SELECT * FROM users WHERE userid = $person");
                              if($rows = mysqli_fetch_array($query)) {
                                $name = $rows['fname'] . " " . $rows['lname'];
                                echo "<tbody>";
                                echo "<tr>";
                                echo '<td>'.$row['prodid'].'</td>';
                                echo "<td>".$row['description']."</td>";
                                echo "<td>".$name."</td>";
                                echo "<td>".$row['category']."</td>";
                                echo "<td>".$row['datePosted']."</td>";
                                echo "<td>".$approve."</td>";
                                echo "<td>".$taken."</td>";
                              }
                            }
                            echo '</table>';
                          ?>
                               <button type="button" class="btn btn-default btn-xs">Previous</button>
                               <button type="button" class="btn btn-default btn-xs">Next</button>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	

		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--Confirmation -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Remove Product</h4>
                        </div>
                          <div class="modal-body">
                            Are You sure You want to remove this Product?
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                          <button type="button" class="btn btn-primary">YES</button>
                        </div>
                    </div>
                </div>
            </div>
      <!--End of Confirmation--> 

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016
              <a href="products_table.php" class="go-top">
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
    

  </body>
</html>
