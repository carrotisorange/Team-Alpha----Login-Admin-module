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
    <link rel="stylesheet" type="text/css" href="resources/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="resources/css/iconstyle.css">    
    
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
                      <a class="active" href="javascript:;">
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
            <!--middle row-->
              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			          <span class="li_heart"></span>
					  			          <h3>933</h3>
                  			</div>
					  			          <p>933 People liked your page the last 24hs. Whoohoo!</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			          <span class="li_cloud"></span>
					  			          <h3>+48</h3>
                  			</div>
					  			          <p>48 New files were added in your cloud storage.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			          <span class="li_stack"></span>
					  			          <h3>23</h3>
                  			</div>
					  			          <p>You have 23 unread messages in your inbox.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			          <span class="li_news"></span>
					  			          <h3>+10</h3>
                  			</div>
					  			          <p>More than 10 news were added in your reader.</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			          <span class="li_data"></span>
					  			          <h3>OK!</h3>
                  			</div>
					  			          <p>Your server is working perfectly. Relax and enjoy.</p>
                  		</div>
                  	
                  	</div><!-- /row mt -->	
                  
                      
                      <div class="row mt">
                        <!--New Products-->
                        <div class="col-md-4 col-sm-4 mb">
                          <div class="white-panel pn">
                            <div class="white-header">
                                 <h5>New PRODUCT</h5>
                            </div>
                          <div class="row">
                             <div class="col-sm-6 col-xs-6 goleft">
                         </div>

                       </div>
                            <div class="centered">
                              <img src="resources/img/product.png" width="120">
                            </div>
                          </div>
                      </div><!-- /col-md-4 -->

                      <!--site statistics-->
                      	<div class="col-md-4 col-sm-4 mb">
                          <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5>SITE STATISTICS</h5>
                            </div>
                              <img src="images/logofinal.png" alt="logo" width="150px" height="150px"/>
                              <p>+ 1,789 NEW VISITS</p>
                          </div><!-- /darkblue panel -->
                        </div><!-- /col-md-4 -->
                      	
                      
                      	
						            <div class="col-md-4 mb">
							       <!-- WHITE PANEL - TOP USER -->
							             <div class="white-panel pn">
								              <div class="white-header">
									               <h5>NEW USER</h5>
					                    </div>
								                  <p><img src="images/pika.gif" class="img-circle" width="80"></p>
								                  <p><b>Kurt Ordonez</b></p>
							             </div>
						            </div><!-- /col-md-4 -->                     	

                    </div><!-- /row mt-->
                  		
              </div><!-- /col-lg-9 END SECTION MIDDLE -->

                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--Notifications-->
						          <h3>NOTIFICATIONS</h3>
					  
                      <!-- First Action -->
          						<?php
          							$result = mysqli_query($db,"SELECT * FROM users WHERE status = 'pending'");
                        $count = 1;
          							while($row = mysqli_fetch_array($result)) {
          								$name = $row['fname'] . " " . $row['lname'];
                          $id = $row['userid'];
          								echo "<div class='desc'>";
          								echo "<div class='thumb'>";
          								echo "<span class='badge bg-theme'><i class='fa fa-clock-o'></i></span>";
          								echo "</div>";
          								echo "<div class='details'>";
          								echo "<a href='#' name='$name'>$name</a> wants to be a part of the company<br/>";
          								echo "<form method ='POST' action='confirmUser.php'>";
          								echo "<input type = 'submit' name = 'Accept$count' class ='btn btn-success' value='Accept'>";
          								echo "<input type = 'submit' name = 'Reject$count' class ='btn btn-danger' value='Reject'>";
          								echo "</form>";
          								echo "</p>";
          								echo "</div>";
          								echo "</div>";
										      $_SESSION['person'.$count] = $id;
										      $count++;
          							}
                        $_SESSION['count'] = $count;
          						?>
                      <!-- Second Action -->
                      <?php
                        $result =mysqli_query($db,"SELECT * FROM products WHERE isApproved = 'N'");
                        $count = 1;
                        while($row = mysqli_fetch_array($result)) {
                          $id = $row['prodid'];
                          $description = $row['description'];
                          $category = $row['category'];
                          $person = $row['donorid'];
                          $query = mysqli_query($db, "SELECT * FROM users WHERE userid = $person");
                          if($rows = mysqli_fetch_array($query)) {
                            $name = $rows['fname'] . " " . $rows['lname'];
                            echo "<div class='desc'>";
                            echo "<div class='thumb'>";
                            echo "<span class='badge bh-theme'><i class='fa fa-clock-o'></i></span>";
                            echo "</div>";
                            echo "<div class='details'>";
                            echo "<a href=#>$name</a> wants to post a <a href=products_table.php>new product</a><br/>";
                            echo "<span style=font-size:11px;>Description: $description</span><br/>";
                            echo "<span style=font-size:11px;>Category: $category</span>";
                            echo "<form method ='POST' action='confirmProducts.php'>";
                            echo "<input type = 'submit' name = 'Post$count' class ='btn btn-success' value='Post'>";
                            echo "<input type = 'submit' name = 'Reject$count' class ='btn btn-danger' value='Reject'>";
                            echo "</form>";
                            echo "</p>";
                            echo "</div>";
                            echo "</div>";
                            $_SESSION['product'.$count] = $id;
                            $count++;
                          }
                        }
                        $_SESSION['counts'] = $count;
                      ?>                      
                       <!-- USERS ONLINE SECTION -->
						              <h3>TEAM MEMBERS</h3>
                      <!-- First Member -->
                      <?php
                        $result = mysqli_query($db,"SELECT * FROM users WHERE status = 'admin'");
                        while($row = mysqli_fetch_array($result)) {
                          if ($_SESSION['email'] == $row['email']) {
                            $status = 'Available';
                          }
                          else {
                            $status = 'Offline';
                          }
                          $name = $row['fname'] . " " . $row['lname'];
                          $fname = $row['fname'];
                          echo "<div class='desc'>";
                          echo "<div class='thumb'>";
                          echo "<img class='img-circle' src='images/$fname.jpg' width='35px' height='35px' align=''>";
                          echo "</div>";
                          echo "<div class='details'>";
                          echo "<p><a href='#'>$name</a><br/>";
                          echo "<muted>$status</muted>";
                          echo "</p>";
                          echo "</div>";
                          echo "</div>";
                        }
                      ?>
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/jquery-1.8.3.min.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="resources/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="resources/js/jquery.scrollTo.min.js"></script>
    <script src="resources/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="resources/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="resources/js/common-scripts.js"></script>

    <!--script for this page-->    
	<script src="resources/js/zabuto_calendar.js"></script>	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                }
                
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

  </body>
</html>
