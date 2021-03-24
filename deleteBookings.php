<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','ecar');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_GET["id"];
	$q3="delete from payment where bookID='$id'";
	$q3_run=mysqli_query($con,$q3);
	if($q3_run){
		$q2="delete from bill where bookID='$id'";
		$q2_run=mysqli_query($con,$q2);
		if($q2_run){
			$q="delete from booking where id='$id'";
			$q_run=mysqli_query($con,$q);
			if($q_run){
				echo '<script>alert("success")</script>';
				echo '<script>location.href="bookings.php";</script>';
			}
			else	
				echo'<script>alert("error")</script>';
		}
	}
	mysqli_close($con);
?>	