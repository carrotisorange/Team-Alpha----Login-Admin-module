<?php
	require 'db.php';
	session_start();

	$_SESSION['email'] = $_POST['email'];

	$email = $_SESSION['email'];
	$password = $_POST['password'];
	$query = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");

	if(isset($_POST['Give'])) {
		if(!$row = mysqli_fetch_array($query)) {
			echo "<h1>You are not yet registered</h1>
			<button><a href = 'index.php'>Go Back</a></button>";
		}
		else if ($row['password'] != md5($password)) {
			echo "<h1>Your password is incorrect</h1>
			<button><a href = 'index.php'>Go Back</a></button>";
		}
		else if($row['status'] == 'pending') {
			echo "<h1>Your account is still pending ask the administrators for acceptance</h1>
			<button><a href = 'index.php'>Go Back</a></button>";

		}
		else if ($row['status'] == admin) {
			header('Location: admin.php');
		}
		else {
			header('Location: givemain.html');
		}
	}
	if(isset($_POST['Take'])) {
		if(!$row = mysqli_fetch_array($query)) {
			echo "<h1>You are not yet registered</h1>
			<button><a href = 'index.php'>Go Back</a></button>";
		}
		else if ($row['password'] != md5($password)) {
			echo "<h1>Your password is incorrect</h1>
			<button><a href = 'index.php'>Go Back</a></button>";
		}
		else if($row['status'] == 'pending') {
			echo "<h1>Your account is still pending ask the administartors for acceptance</h1>
			<button><a href = 'index.php'>Go Back</a></button>";

		}
		else if ($row['status'] == admin) {
			header('Location: admin.php');
		}
		else {
			header('Location: takemain.html');
		}	
	}
	