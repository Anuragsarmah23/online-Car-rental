<?php
	session_start();
	if(!isset($_SESSION["adminID"]))
		header("location:index.php");
?>
<html>
	<head>
		<title>ADD CAR|E-CAR</title>
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
					ADD CAR
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="addCarParse.php" enctype="multipart/form-data">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="cname" class="labelElements">Enter Car Name</label>
						<input type="text" name="cname" data-rule-required="true" data-msg-required="Please Enter Car Name" class="form-control" id="type" placeholder="Enter Car Name">
					  </div>
					  <div class="form-group col-md-6">
						<label for="carno" class="labelElements">Enter Car Number</label>
						<input type="text" name="carno" class="form-control" id="breed" data-rule-required="true" data-msg-required="Please Enter Car Number" placeholder="Enter Car Number">
					  </div>
					  <div class="form-group col-md-6">
						<label for="seats" class="labelElements">Enter Total Seats</label>
						<input type="number" name="seats" class="form-control" id="price" data-rule-required="true" data-msg-required="Please Enter Seats" placeholder="Enter Seats">
					  </div>
					  <div class="form-group col-md-6">
						<label for="rate" class="labelElements">Enter Rate(Rs. Per Hour)</label>
						<input type="number" name="rate" class="form-control" id="qty" data-rule-required="true" data-msg-required="Please Enter Rate" placeholder="Enter Rate">
					  </div>
					  <div class="form-group col-md-6">
						<label for="File" class="labelElements">Image</label>
					 	<input type="file" name="File" data-rule-required="true" data-msg-required="Please Select An Image" class="custom-file-input form-control" id="File">
					  </div>
				  </div>
				  <button type="submit" class="btn sub2 col-md-4" style="margin-top:0;">ADD</button>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$('#validateIt').validate();
	</script>
		
	</body>
</html>