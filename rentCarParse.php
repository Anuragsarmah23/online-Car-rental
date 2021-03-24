<?php
session_start();
$con=mysqli_connect("localhost","root","","ecar");
if(!$con)
	die("error");
$customerID=$_SESSION["customerID"];
$carID=$_SESSION["carID"];
$no=rand(1000,9999);
$id=$customerID.$no;
$q1="select * from car where id='$carID'";
$q1_run=mysqli_query($con,$q1);
$row1=mysqli_fetch_assoc($q1_run);
$rate=$row1["rate"];
if(isset($_POST["hourSubmit"])){
	$q3="select * from booking where customerID='$customerID' and carID='$carID'";
	$q3_run=mysqli_query($con,$q3);
	$rows=mysqli_num_rows($q3_run);
	if($rows>0){
		echo '<script>alert("You have already booked this car..");</script>';
		echo '<script>location.href="carsUser.php"</script>';
		die();
	}
	$dob=$_POST["dob"];
	$hours=$_POST["hours"];
	$price=$hours*$rate;
	if($hours < 1 || $hours >10){
		echo '<script>alert("Booking cannot be done..hours should be in the range of 1 to 10");</script>';
		echo '<script>location.href="carsUser.php"</script>';
		die();
	}	
	$q="insert into booking values('$id','$dob','$dob','$carID','$customerID')";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		$q2="insert into bill(totalAmt,bookID,customerID) values('$price','$id','$customerID')";
		$q2_run=mysqli_query($con,$q2);
		if($q2_run){
			$no1=rand(10,99);
			$pid=$id.$no1;
			$q21="insert into payment values('$pid','$price','$id','$customerID','pending')";
			$q21_run=mysqli_query($con,$q21);
			if($q21_run){
				echo '<script>var bid="'.$id.'";</script>';
				echo '<script>var price='.$price.';</script>';
				echo '<script>alert("Booking confirmed with Booking ID: "+bid+" and total amount:Rs. "+price);</script>';
				echo '<script>location.href="bookingsUser.php"</script>';
			}
		}
		else{
			echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
			echo '<script>location.href="carsUser.php"</script>';
		}
	}
	else{
		echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
		echo '<script>location.href="carsUser.php"</script>';
	}
}
if(isset($_POST["daySubmit"])){
	$fromDay=$_POST["fromDay"];
	$toDay=$_POST["toDay"];
	$fromDay1=date_create($_POST["fromDay"]);
	$toDay1=date_create($_POST["toDay"]);
	$q3="select * from booking where customerID='$customerID' and carID='$carID'";
	$q3_run=mysqli_query($con,$q3);
	$rows=mysqli_num_rows($q3_run);
	if($rows>0){
		echo '<script>alert("You have already booked this car..");</script>';
		echo '<script>location.href="carsUser.php"</script>';
		die();
	}
	$days=date_diff($toDay1,$fromDay1);
	$days1=$days->format("%d");
	$price=$days1*$rate*8;	
	$q="insert into booking values('$id','$fromDay','$toDay','$carID','$customerID')";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		$q2="insert into bill(totalAmt,bookID,customerID) values('$price','$id','$customerID')";
		$q2_run=mysqli_query($con,$q2);
		if($q2_run){
			$no1=rand(10,99);
			$pid=$id.$no1;
			$q21="insert into payment values('$pid','$price','$id','$customerID','pending')";
			$q21_run=mysqli_query($con,$q21);
			if($q21_run){
				echo '<script>var bid="'.$id.'";</script>';
				echo '<script>var price='.$price.';</script>';
				echo '<script>alert("Booking confirmed with Booking ID: "+bid+" and total amount:Rs. "+price);</script>';
				echo '<script>location.href="bookingsUser.php"</script>';
			}	
		}
		else{
			echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
			echo '<script>location.href="carsUser.php"</script>';
		}
	}
	else{
		echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
		echo '<script>location.href="carsUser.php"</script>';
	}
}
if(isset($_POST["weekSubmit"])){
	$fromWeek=$_POST["fromWeek"];
	$toWeek=$_POST["toWeek"];
	$fromWeek1=date_create($_POST["fromWeek"]);
	$toWeek1=date_create($_POST["toWeek"]);
	$q3="select * from booking where customerID='$customerID' and carID='$carID'";
	$q3_run=mysqli_query($con,$q3);
	$rows=mysqli_num_rows($q3_run);
	if($rows>0){
		echo '<script>alert("You have already booked this car..");</script>';
		echo '<script>location.href="carsUser.php"</script>';
		die();
	}
	$days=date_diff($toWeek1,$fromWeek1);
	$days1=$days->format("%d");
	$priceWeek=$rate*8*5;	
	$priceDay=$priceWeek/7;
	$price=$priceDay*$days1;
	$q="insert into booking values('$id','$fromWeek','$toWeek','$carID','$customerID')";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		$q2="insert into bill(totalAmt,bookID,customerID) values('$price','$id','$customerID')";
		$q2_run=mysqli_query($con,$q2);
		if($q2_run){
			$no1=rand(10,99);
			$pid=$id.$no1;
			$q21="insert into payment values('$pid','$price','$id','$customerID','pending')";
			$q21_run=mysqli_query($con,$q21);
			if($q21_run){
				echo '<script>var bid="'.$id.'";</script>';
				echo '<script>var price='.$price.';</script>';
				echo '<script>alert("Booking confirmed with Booking ID: "+bid+" and total amount:Rs. "+price);</script>';
				echo '<script>location.href="bookingsUser.php"</script>';
			}	
		}
		else{
			echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
			echo '<script>location.href="carsUser.php"</script>';
		}
	}
	else{
		echo '<script>alert("Something Went Wrong.. Please Try Again);</script>';
		echo '<script>location.href="carsUser.php"</script>';
	}
}
?>