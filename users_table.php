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
                          <li><a href="products_table.php">View products</a></li>
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
          	<h3>LISTS OF USERS</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4>Users</h4>
                          <section id="unseen">
            						  <?php
              							$result = mysqli_query($db,"SELECT * FROM users");
              							echo'<table class="table table-bordered table-striped table-condensed">
                                            <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th class="numeric">Contact Number</th>
                                                <th>Status</th>	
                                            </tr>
                                            </thead>';
                                          
              							while($row = mysqli_fetch_array($result)) {
              								if ($row['status'] == 'pending' || $row['status'] == 'customer') {
              									echo '<tr>';
              									echo '<td>'.$row['userid'].'</td>';
              									echo "<td>".$row['fname'] . "</td>";
              									echo "<td>".$row['lname'] . "</td>";
              									echo "<td>".$row['email'] . "</td>";
              									echo "<td>".$row['contactNum'] . "</td>";
              									echo "<td>".$row['status'] . "</td>";
              									echo "</tr>";
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
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4>Administrators</h4>
                          <section id="no-more-tables">
						  <?php
							$result = mysqli_query($db,"SELECT * FROM users");
							echo'<table class="table table-bordered table-striped table-condensed cf">
                              <thead class="cf">
                              <tr>
                                  <th>Member Id</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Email</th>
                                  <th class="numeric">Contact Number</th>
                              </tr>
                              </thead>';
                            
							while($row = mysqli_fetch_array($result)) {
								if ($row['status'] == 'admin') {
									echo '<tr>';
									echo '<td>'.$row['userid'].'</td>';
									echo "<td>".$row['fname'] . "</td>";
									echo "<td>".$row['lname'] . "</td>";
									echo "<td>".$row['email'] . "</td>";
									echo "<td>".$row['contactNum'] . "</td>";
									echo "</tr>";
								}
							}
							echo '</table>';
						?>
                               <button type="button" class="btn btn-default btn-xs">Previous</button>
                               <button type="button" class="btn btn-default btn-xs">Next</button>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->

		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
       <!--Confirmation -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Remove User</h4>
                        </div>
                          <div class="modal-body">
                            Are You sure You want to remove this User?
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                          <button type="button" class="btn btn-primary">YES</button>
                        </div>
                    </div>
                </div>
            </div>
      <!--End of Confirmation--> 
      <!--Confirmation -->
            <div class="modal fade" id="promote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Promote User</h4>
                        </div>
                          <div class="modal-body">
                            Are You sure You want to make this user an ADMIN?
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
              <a href="users_table.html#" class="go-top">
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

    <!--script for this page-->
    

  </body>
</html>
