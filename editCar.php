<?php
	session_start();
	if(!isset($_SESSION["adminID"]))
		header("location:index.php");
	$con=mysqli_connect("localhost","root","","ecar");
	if(!$con)
		die("error");
	$id=$_GET["id"];
	$_SESSION["carIDFA"]=$id;
	$q="select * from car where id='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
?>
<html>
	<head>
		<title>EDIT USER|ECARS</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.0.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		
	</head>
	<body>
		<div class="main">
		<div class="formMain">
			<div class="regFormElements">
				<div class="card-header">
					EDIT CAR DETAILS
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="updateCar.php">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="cname" class="labelElements">Enter Car Name</label>
						<input type="text" name="cname" data-rule-required="true" data-msg-required="Please Enter Name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="carno" class="labelElements">Enter Car Number</label>
						<input type="text" name="carno" data-rule-required="true" data-msg-required="Please Enter Car Number" class="form-control" id="email" placeholder="Enter Car Number" value="<?php echo $row['carno']; ?>">
					  </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="seats" class="labelElements">Enter Seats</label>
						<input type="number" name="seats" data-rule-required="true" data-msg-required="Please Enter Seats" class="form-control" id="seats" placeholder="Enter Seats" value="<?php echo $row['seats']; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="rate" class="labelElements">Enter Rate(Rs. Per Hour)</label>
						<input type="number" name="rate" data-rule-required="true" data-msg-required="Please Enter Rate" class="form-control" id="rate" placeholder="Enter Rate" value="<?php echo $row['rate']; ?>">
					  </div>
				  </div>
				  <div class="row">
					<button type="submit" class="btn sub2 col-md-4" style="margin-top:-20px;">Update</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
	<script>
		jQuery.validator.addMethod("numbersonly", function(value, element) {
			return this.optional(element) || /^[0-9]+$/i.test(value);
		}, "Enter Number");
	</script>
		
	<script>
		jQuery.validator.addMethod("password", function(value, element) {
			return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/i.test(value);
		}, "Enter combination of numbers and alphabets");
	</script>
	
	<script>
		$('#validateIt').validate();
	</script>	
	</body>
</html>