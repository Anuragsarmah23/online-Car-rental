<?php
$con=mysqli_connect("localhost","root","","ecar");
if(!$con)
	die("Error");
$id=$_POST['pid'];

$q="update payment set status='completed' where id='$id'";
$q_run=mysqli_query($con,$q);
if($q_run)
	header("location:payments.php");
?>