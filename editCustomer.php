<?php
	session_start();
	if(!isset($_SESSION["adminID"]))
		header("location:index.php");
	$con=mysqli_connect("localhost","root","","ecar");
	if(!$con)
		die("error");
	$id=$_GET["id"];
	$_SESSION["customerIDFA"]=$id;
	$q="select * from customer where id='$id'";
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
					EDIT USER DETAILS
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="updateCustomer.php">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="name" class="labelElements">Enter Name</label>
						<input type="text" name="name" data-rule-required="true" data-msg-required="Please Enter Name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="email" class="labelElements">Enter E-Mail</label>
						<input type="email" name="email" data-rule-required="true" data-msg-required="Please Enter Email" data-rule-email="true" data-msg-email="Please enter a valid email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
					  </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="address" class="labelElements">Enter Address</label>
						<input type="text" name="address" data-rule-required="true" data-msg-required="Please Enter Address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
					  </div>
					  <div class="form-group col-md-6">
						<label for="cno" class="labelElements">Enter Contact Number</label>
						<input type="text" name="cno" data-rule-minlength="10" data-rule-maxlength="10" data-rule-numbersonly="true" data-msg-numbersonly="Contact number do not expects any alphabet" data-rule-required="true" data-msg-required="Please Enter Contact Number" class="form-control" id="cno" placeholder="Enter Contact Number" value="<?php echo $row['contact']; ?>">
					  </div>
				  </div>
				  <div class="row">
					<div class="form-group col-md-12">
						<label for="aadhaar" class="labelElements">Enter Aadhaar</label>
						<input type="text" name="aadhaar" data-rule-numbersonly="true" data-msg-numbersonly="Aadhaar number should not be string" data-rule-minlength="12" data-rule-maxlength="12" data-rule-required="true" data-msg-required="Please Enter aadhaar" class="form-control" id="aadhaar" placeholder="Aadhaar" value="<?php echo $row['aadhaar']; ?>">
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