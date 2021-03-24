<?php
	//RADHEY
	$con=mysqli_connect('localhost','root','','ecar');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$cno=mysqli_real_escape_string($con,$_POST['cno']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$aadhaar=mysqli_real_escape_string($con,$_POST['aadhaar']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	$cnfpass=mysqli_real_escape_string($con,$_POST['cnfpass']);
	$idR=rand(1000,9999);
	$id=$name.$idR;
	if($pass==$cnfpass){
		$q="select * from customer WHERE email='$email'";
		$q_run=mysqli_query($con,$q);
		if(mysqli_num_rows($q_run)>0)
			$dispmsg='emailError';
		else{
			$q="insert into customer values('$id','$name','$email','$address','$aadhaar','$cno','$pass')";
			$q_run=mysqli_query($con,$q);
			if($q_run)
				$dispmsg=$id;	
			else	
				$dispmsg='error';
		}	
	}else
		$dispmsg='passError';
	mysqli_close($con);
	echo json_encode($dispmsg);
?>