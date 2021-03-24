<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','ecar');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_SESSION["carIDFA"];
	$cname=mysqli_real_escape_string($con,$_POST['cname']);
	$carno=mysqli_real_escape_string($con,$_POST['carno']);
	$seats=mysqli_real_escape_string($con,$_POST['seats']);
	$rate=mysqli_real_escape_string($con,$_POST['rate']);
	$q="update car set name='$cname', carno='$carno', seats='$seats', rate='$rate' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("success")</script>';
		echo '<script>location.href="cars.php";</script>';
	}
	else	
		echo'<script>alert("error")</script>';	
	mysqli_close($con);
?>