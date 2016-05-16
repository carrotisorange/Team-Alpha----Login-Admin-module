<?php
	require 'db.php';
	session_start();
	$count = $_SESSION['counts'];
	$date = date("Y-m-d");
	for($c = 1; $c < $count; $c++) {
		$id = $_SESSION['product'.$c];
		$post = "UPDATE products SET isApproved='Y', dateApproved='$date' WHERE prodid='$id'";
		$reject = "DELETE FROM products WHERE prodid='$id'";
		if(isset($_POST['Post'.$c])) {
			if(mysqli_query($db, $post)){
				$msg = "Product has been approved.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header("Location: admin.php");
			} else {
				echo "Error updating record.";
			}
			break;
		}
		else if(isset($_POST['Reject'.$c])){
			if(mysqli_query($db, $reject)){
				$msg = "Product has been removed.";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				header("Location:  admin.php");
			} else {
				echo "Error updating record.";
			}
			break;
		}
	}
?>