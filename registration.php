<?php 
	require 'db.php';
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['submit'])) 
	{
		$fname = $_POST["fname"];
		$lname = $_POST['lname']; 
		$email = $_POST['email'];
		$address = $_POST['address'];		
		$password = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$contactnum = $_POST['contactnum'];

		$query = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");
		if(!$query){
			printf("Error: %s\n", mysqli_error($db));
			exit();
		}

		if(!$row = mysqli_fetch_array($query)) {
			if($password != $cpass) {
				$msg = "Your passwod does not match";
				echo "<script>alert('$msg');</script>";
			}
			else {
				$password = md5($password);
				$query = "INSERT INTO users (userid,fname,lname,email, address, password, contactNum, status) VALUES (FLOOR(RAND() * 1000) + 10, '$fname','$lname','$email', '$address', '$password', '$contactnum', 'pending')"; 
				$data = mysqli_query ($db, $query)or die(mysqli_error($db));
				if($data) 
				{
					$msg = "Your registration is completed. Wait for the acceptance of the administrators";
					echo "<script>alert('$msg');</script>"; 
				}
				header('Location: index.php');
			}
		}
		else
			{
				$msg = "This email address ($email) is already registered. Try another one.";
				echo "<script>alert('$msg');</script>"; 
			}
	}
?>
<!DOCTYPE html>
<html lang = "en">
	 <head>
	   <link rel ="stylesheet"  type = "text/css" href = "resources/css/home.css">
	   <link rel ="stylesheet"  type = "text/css" href = "resources/css/global.css">
	 </head>
	 <body>
 		<div class= "container">
 			<div class =" up">
 		  		<img src = "images/logofinal.png" width = '100' height='100'>
 		  	</div>

 		  	<!--login form-->
 		  	 <div class= "Regform">
 		  	 	<h2><span>S</span>ign <span>U</span>p</h2>
 		  	 	<br><br><br>
 		  	 	<form method="POST" action="registration.php" class="register">
 		  	 		<label for = "Fname">First Name</label>
 		  	 		<br>
 		  	 		<input id="Fnamesignup" name="fname" required="required" type="text"/>
 		  	 		<br>
 		  	 		<label for = "Lname">Last Name</label>
 		  	 		<br>
 		  	 		<input id="Lnamesignup" name="lname" required="required" type="text"/>
 		  	 		<br>
 		  	 		<label for = "Email">Email</label>
 		  	 		<br>
 		  	 		<input id="Emailsignup" name="email" required="required" type="text"/>
 		  	 		<br>
					<label for = "Address">Address</label>
 		  	 		<br>
 		  	 		<input id="Addresssignup" name="address" required="required" type="text"/>
 		  	 		<br>
 		  	 		<label for = "Contact">Contact Number</label>
 		  	 		<br>
 		  	 		<input id="Csignup" name="contactnum" required="required" type="text"/>
 		  	 		<br>
 		  	 		<label for = "Pass">Password</label>
 		  	 		<br>
 		  	 		<input id="Psignup" name="pass" required="required" type="password"/><span id="pass"></span>
 		  	 		<br>
 		  	 		<label for = "ConPass">Confirm Password</label>
 		  	 		<br>
 		  	 		<input id="Cpsignup" name="cpass" required="required" type="password"/>
 		  	 		<br>
 		  	 		<tr> <td><input id="button" type="submit" name="submit" value="Register" class="register"></td> 
					</tr> 
 		  	 	</form>
 		  	 </div>
 		  	 </div>

 			</div>


	 </body>
</html>