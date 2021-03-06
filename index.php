<?php
	session_start();
?>

<!DOCTYPE html>
<html lang = "en">
	 <head>
	   <link rel ="stylesheet"  type = "text/css" href = "resources/css/home.css">
	   <link rel ="stylesheet"  type = "text/css" href = "resources/css/global.css">
	 </head>
	 <body>
 		<div class= "container">
 		  <!--menu bar-->
 		  <div class =" menu">
 		  	<div class = "welcometitle">
 				<img src = "images/logofinal.png" width = '250' height='250'>
 		  		<h4>Don't Need It? We'll take it</h4>
 		  			<form>
 		  	 			<button type ="button" class = "but"><a href = "registration.php">Start Now</a></button>
 		  	 		</form>
 		  	</div>

 		  </div><!--end of menu -->

 		  	<!--body-->
 		  	<div class= "body">
 		  		<!--About Us-->
 		  		<div class ="about">
 		  			<div class = "box1">
 		  					<h3>About This Site</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/aboutus.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>This site's purpose is to create a user and taker relationship wherein the taker 
								can choose available products for charity</p>
 		  				</div>
 		  			</div>
 		  			
 		  			<div class = "box1">
 		  					<h3>Try IT</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/try.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>It's design is very user friendly. Because of it's easy to use design, users
								will have fun not only in giving or taking but also in using the app </p>
 		  				</div>
 		  			</div>
 		  			<div class = "box1">
 		  					<h3>Contact Us</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/contact.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>If you have any comments or suggestions, you may contact us on this number
							<br>+63 9876543210</p>
 		  				</div>
 		  			</div>
 		  		</div><!--end of aboutus-->
 		  		

 		  	<!--middle block / login form-->
 		  	<div class ="mid">
 		  		<div class = "box2">
 		  			<h2> Start Now</h2>
 		  			<p>Sign up Now to start using our website and give all the stuff you don't need</p>
 		  				<img src = "resources/images/arrow.png" width = "100" height = "100"> 
 		  	 		<form>
 		  	 			<a href = "registration.php"><button type ="button" class = "reg">REGISTER</button></a>
 		  	 		</form>
 				</div>

 		  		
 		  	 	<div class= "login">
 		  	 		<div class = "top">
 		  	 			<h3>LOG IN</h3>
 		  	 		</div>
 		  	 		<form method ="POST" action= "locate.php">
 		  	 			<input type = "text" name = "email" placeholder = "E-mail">
 		  	 			<input type = "password" name = "password" placeholder = "Password">
 		  	 			<input type = "submit" name = "Take" class ="sign" value="Log in as Taker">
 		  	 			<input type = "submit" name = "Give" class ="sign" value="Log in as Giver">
 		  	 		</form>
 		  	 		
 				</div>
 			</div><!--end of middle block-->


 		  	<!--Features-->
 		  		<div class ="features">
 		  			<div class = "box1">
 		  					<h3>Secure</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/shield.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>We offer a secure application designed to prevent any misuse on your account</p>
 		  				</div>
 		  			</div>
 		  			<div class = "box1">
 		  					<h3>Responsive</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/respo.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>Either using a phone or a computer the design will create the best display layout
								for your convenience</p>
 		  				</div>
 		  			</div>
 		  			<div class = "box1">
 		  					<h3>24/7 Support</h3>
 		  				<div class = "round">
 		  					<img src = "resources/images/supp.png" width = "150" height = "150">
 		  				</div>
 		  				<div class = "desc">
 		  					<p>We are always available for any technical support with regards to the application</p>
 		  				</div>
 		  			</div>
 		  		</div><!--end of Features-->
 		  	</div>	<!--end of body-->
 		  		
 		  	

 			<!--footer-->
 			<footer class="footer-basic-centered">

			<p class="footer-company-motto">Home Of Second Chances.</p>

			<p class="footer-links">
				<a href="index.php">Home - </a>											
				<a href="#">About - </a>			
				<a href="#">Contact </a>
			</p>

			<p class="footer-company-name">TenderJuicy &copy; 2016</p>

			</footer>
 		</div>

	 </body>
</html>