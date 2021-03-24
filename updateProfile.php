<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','ecar');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_SESSION["customerID"];
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$cno=mysqli_real_escape_string($con,$_POST['cno']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$aadhaar=mysqli_real_escape_string($con,$_POST['aadhaar']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	$q="update customer set name='$name', email='$email', contact='$cno', address='$address', aadhaar='$aadhaar',password='$pass' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("success")</script>';
		echo '<script>location.href="main.php";</script>';
	}
	else	
		echo'<script>alert("error")</script>';	
	mysqli_close($con);
?>