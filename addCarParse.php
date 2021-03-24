<?php
	$File=basename($_FILES["File"]["name"]);
	$target_dir = "img/cars/";
	$target_file = $target_dir.$File;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$erroR=1;
	if ($_FILES["File"]["size"] > 2524288){
		echo "<script>alert('Size exceeded.. select a smaller size image')</script>";
		echo "<script>window.history.back();</script>";
		$erroR=0;
	}	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){ 
		echo "<script>alert('File type must be jpg or png')</script>";
		echo "<script>window.history.back();</script>";
		$erroR=0;
	}	
	if($erroR==1){
		$con=mysqli_connect('localhost','root','','ecar');
		if(!$con){
			die("CONNECTION NOT FOUND".mysqli_error());
		}
		$cname1=mysqli_real_escape_string($con,$_POST['cname']);
		$cname=strtolower($cname1);
		$carno1=mysqli_real_escape_string($con,$_POST['carno']);
		$carno=strtolower($carno1);
		$seats=mysqli_real_escape_string($con,$_POST['seats']);
		$rate=mysqli_real_escape_string($con,$_POST['rate']);
		$id=$cname.$carno;
		$fileName=$id.".".$imageFileType;
		$targetDir=$target_dir.$fileName;
		$q1="select * from car where id='$id'";
		$q1_run=mysqli_query($con,$q1);
		$rows=mysqli_num_rows($q1_run);
		if($rows > 0){
			echo '<script>alert("Car Exist..Enter Another..")</script>';
			echo '<script>location.href="cars.php";</script>';
		}	
		else{	
			if (move_uploaded_file($_FILES["File"]["tmp_name"], $targetDir)){
				$q="insert into car values('$id','$cname','$carno','$seats','$rate','$fileName')";
				$q_run=mysqli_query($con,$q);
				if($q_run){
					echo "<script>alert('success')</script>";
					echo '<script>location.href="cars.php";</script>';
				}
				else{	
					echo "1";
				}	
			}	
			else{	
					echo "<script>alert('File Upload Error')</script>";
					echo '<script>window.history.back();</script>';
				}	
		}
		mysqli_close($con);
	}	
?>