<?php
	require 'db.php';
	session_start();
	$count = $_SESSION['count'];
	for($c = 1; $c < $count; $c++) {
		$id = $_SESSION['person'.$c];
		$accept = "UPDATE users SET status='customer' WHERE userid='$id'";
		$reject = "DELETE FROM users WHERE userid='$id'";
		if(isset($_POST['Accept'.$c])) {
			if(mysqli_query($db, $accept)){
				$msg = "Account has been accepted.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header("Location: admin.php");
			} else {
				echo "Error updating record.";
			}
			break;
		}
		else if(isset($_POST['Reject'.$c])) {
			if(mysqli_query($db, $reject)){
				$msg = "Account has been removed.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header("Location:  admin.php");
			} else {
				echo "Error updating record.";
			}
			break;
		}
	}
?>