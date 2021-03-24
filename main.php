<?php
	session_start();
	if(!isset($_SESSION["customerID"]))
		header("location:index.php");
	$con=mysqli_connect('localhost','root','','ecar');
	if(!$con)
 			die("CONNECTION NOT FOUND".mysqli_error());
	$id=$_SESSION["customerID"];
	$q="select * from customer where id='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>USER|ECARS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">
			<div class="logo">
				<a href="index.php" class="simple-text">
					ECARS
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="main.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="carsUser.php">
	                        <i class="material-icons">Cars</i>
	                        <p>Cars</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="bookingsUser.php">
	                        <i class="material-icons">Bookings</i>
	                        <p>My Bookings</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="paymentsUser.php">
	                        <i class="material-icons">Payments</i>
	                        <p>My Payments</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">ECARS</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="main.php">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li>
								<a href="logout.php">
									<i class="material-icons">logout</i>
									logout
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="title">Edit Profile</h4>
								</div>
								<div class="content" style="padding:20px;">
									<form method="post" class="regForm" id="validateIt" action="updateProfile.php">
										<div class="row">
											 <div class="form-group col-md-4">
												<label for="id" class="labelElements">Your ID</label>
												<input style="cursor:no-drop;" type="text" name="id" readonly class="form-control" id="id" value="<?php echo $row['id']; ?>">
											  </div>
											  <div class="form-group col-md-4">
												<label for="name" class="labelElements">Your Name</label>
												<input type="text" name="name" data-rule-required="true" data-msg-required="Please Enter Your Name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>">
											  </div>
											  <div class="form-group col-md-4">
												<label for="email" class="labelElements">Your E-Mail</label>
												<input type="email" name="email" data-rule-required="true" data-msg-required="Please Enter Your Email" data-rule-email="true" data-msg-email="Please enter a valid email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
											  </div>
										  </div>
										  <div class="row">
											  <div class="form-group col-md-6">
												<label for="address" class="labelElements">Your Address</label>
												<input type="text" name="address" data-rule-required="true" data-msg-required="Please Enter Your Address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
											  </div>
											  <div class="form-group col-md-6">
												<label for="cno" class="labelElements">Your Contact Number</label>
												<input type="text" name="cno" data-rule-minlength="10" data-rule-maxlength="10" data-rule-numbersonly="true" data-msg-numbersonly="Contact number do not expects any alphabet" data-rule-required="true" data-msg-required="Please Enter Your Contact Number" class="form-control" id="cno" placeholder="Enter Contact Number" value="<?php echo $row['contact']; ?>">
											  </div>
										  </div>
										  <div class="row">
											<div class="form-group col-md-6">
												<label for="aadhaar" class="labelElements">Your Aadhaar</label>
												<input type="text" name="aadhaar" data-rule-numbersonly="true" data-msg-numbersonly="Aadhaar number should not be string" data-rule-minlength="12" data-rule-maxlength="12" data-rule-required="true" data-msg-required="Please Enter Your aadhaar" class="form-control" id="aadhaar" placeholder="Aadhaar" value="<?php echo $row['aadhaar']; ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="password" class="labelElements">Your Password</label>
												<input type="password" name="password" data-rule-password="true" data-msg-password="Enter combination of numbers and letters of minimum 8 characters" data-rule-required="true" data-msg-required="Please Enter Your Password" class="form-control" id="password" placeholder="Password" value="<?php echo $row['password']; ?>">
											</div>
										  </div>  
										<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="index.php">
									Home
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="index.php">ECARS</a>
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script src="js/jquery.validate.min.js"></script>

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

</html>
