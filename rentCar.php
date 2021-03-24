<?php
	session_start();
	if(!isset($_SESSION["customerID"]))
		header("location:index.php");
	if(!isset($_GET['id']))
		header("location:carsUser.php");
	$id=$_GET["id"];
	$_SESSION["carID"]=$id;
	$customerID=$_SESSION["customerID"];
	$con=mysqli_connect("localhost","root","","ecar");
	if(!$con)
		die("error");
	$q="select * from car where id='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>RENT CAR|ECARS</title>

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
	                <li>
	                    <a href="main.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li class="active">
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
						<div class="card">
							<div class="card-header">
								 CAR DETAILS
							</div>
							<div class="card-body">
								<div class="col-md-12">
									<img class="col-md-6" src="img/cars/<?php echo $row['pic']; ?>" style="height:400px;width:500px;border-right:1px solid grey;">
									<div class="col-md-6">
										<h3 style="margin-top:15px;"> <b>CAR DESCRIPTION</b> </h3><br>
										<p><b>Car Name</b></p>
										<p style="font-size:18px;"><?php echo strtoupper($row['name']); ?></p><br>
										<p><b>Total Capacity</b></p>
										<p style="font-size:18px;"><?php echo $row['seats']; ?> Seater Car</p><br>
										<p><b>Rate Per Hour</b>&nbsp;&nbsp;&nbsp;&nbsp; <b>Rate Per Day</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Rate Per Day</b></p>
										<p style="font-size:18px;"><i class="fa fa-rupee"></i><?php echo $row['rate']; ?>/Hour&nbsp;&nbsp;&nbsp;&nbsp;
										<i class="fa fa-rupee"></i><?php echo $row['rate']*8; ?>/Day	&nbsp;&nbsp;&nbsp;&nbsp;					
										<i class="fa fa-rupee"></i><?php echo $row['rate']*40; ?>/Week</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="hourBook" style="display:none;">
						<form id="validateIt" method="post" action="rentCarParse.php" style="margin-left:20%;margin-right:20%;background:white;padding:20px;">
							<div class="form-group">
								<label for="dob">Booking Date</label>
								<input type="date" name="dob" id="dateField" class="form-control" data-rule-required="true" data-msg-required="Please Enter Booking Date">
							</div>
							<div class="form-group">
								<label for="hours">Hours</label>
								<input type="number" class="form-control" name="hours" placeholder="Enter Booking Hours" data-rule-required="true" data-msg-required="Please Enter Booking Hours">
							</div>
							<button type="submit" name="hourSubmit" class="btn btn-success">Book</button>
						</form><br><br>
					</div>
					<div id="dayBook" style="display:none;">
						<form id="validateIt2" method="post" action="rentCarParse.php" style="margin-left:20%;margin-right:20%;background:white;padding:20px;">
							<div class="form-group">
								<label for="fromDay">From(Date)</label>
								<input type="date" name="fromDay" id="dateField2" class="form-control" data-rule-required="true" data-msg-required="Please Enter Starting Date">
							</div>
							<div class="form-group">
								<label for="toDay">To(Date)</label>
								<input type="date" name="toDay" id="dateField3" class="form-control" data-rule-required="true" data-msg-required="Please Enter Ending Date">
							</div>
							<button type="submit" name="daySubmit" class="btn btn-success">Book</button>
						</form><br><br>
					</div>
					<div id="weekBook" style="display:none;">
						<form id="validateIt3" method="post" action="rentCarParse.php" style="margin-left:20%;margin-right:20%;background:white;padding:20px;">
							<div class="form-group">
								<label for="fromWeek">From(Date)</label>
								<input type="date" name="fromWeek" id="dateField4" class="form-control" data-rule-required="true" data-msg-required="Please Enter Starting Date">
							</div>
							<div class="form-group">
								<label for="toWeek">To(Date)</label>
								<input type="date" name="toWeek" id="dateField5" class="form-control" data-rule-required="true" data-msg-required="Please Enter Ending Date">
							</div>
							<button type="submit" name="weekSubmit" class="btn btn-success">Book</button>
						</form><br><br>
					</div>
					<div class="row">
					<center>
						<button id="btn1" class="btn btn-success">Book For Few Hours</button>
						<button id="btn2" class="btn btn-info">Book For Few Days</button>
						<button id="btn3" class="btn btn-primary">Book For Few Weeks</button>
					</center>
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
		$(document).ready(function(){
			$('#btn1').click(function(){
				$('#hourBook').css('display','block');
				$('#dayBook').css('display','none');
				$('#weekBook').css('display','none');
			});
			$('#btn2').click(function(){
				$('#hourBook').css('display','none');
				$('#dayBook').css('display','block');
				$('#weekBook').css('display','none');
			});
			$('#btn3').click(function(){
				$('#hourBook').css('display','none');
				$('#dayBook').css('display','none');
				$('#weekBook').css('display','block');
			});
		});
	</script>
   <script>
		var today = new Date();
		var today11 = new Date(today.getTime() + (60*60*24*1000));
		var today12 = new Date(today.getTime() + (60*60*24*7*1000));
		var dd = today.getDate();
		var mm = today.getMonth()+1; 
		var yyyy = today.getFullYear();
		 if(dd<10){
				dd='0'+dd
			} 
			if(mm<10){
				mm='0'+mm
			} 

		today = yyyy+'-'+mm+'-'+dd;
		var dd11 = today11.getDate();
		var mm11 = today11.getMonth()+1; 
		var yyyy11 = today11.getFullYear();
		 if(dd11<10){
				dd11='0'+dd11
			} 
			if(mm11<10){
				mm11='0'+mm11
			} 

		today11 = yyyy11+'-'+mm11+'-'+dd11;
		var dd12 = today12.getDate();
		var mm12 = today12.getMonth()+1; 
		var yyyy12 = today12.getFullYear();
		 if(dd12<10){
				dd12='0'+dd12
			} 
			if(mm12<10){
				mm12='0'+mm12
			} 

		today12 = yyyy12+'-'+mm12+'-'+dd12;
		
		document.getElementById("dateField").setAttribute("min", today);
		document.getElementById("dateField").setAttribute("value", today);
		document.getElementById("dateField2").setAttribute("min", today);
		document.getElementById("dateField2").setAttribute("value", today);
		document.getElementById("dateField3").setAttribute("min", today11);
		document.getElementById("dateField3").setAttribute("value", today11);
		document.getElementById("dateField4").setAttribute("min", today);
		document.getElementById("dateField4").setAttribute("value", today);
		document.getElementById("dateField5").setAttribute("min", today12);
		document.getElementById("dateField5").setAttribute("value", today12);
   </script>
   <script>
		$('#dateField2').on('change', function() {
		   var dt2=new Date(this.value);
		   var dt7 = new Date(dt2.getTime() + (60*60*24*1000));
		   var dd1 = dt7.getDate();
		   var mm1 = dt7.getMonth()+1; 
		   var yyyy1 = dt7.getFullYear();
			 if(dd1<10){
				dd1='0'+dd1
			 } 
			 if(mm1<10){
				mm1='0'+mm1
			 }  
		   newDate = yyyy1+'-'+mm1+'-'+dd1;
		   document.getElementById("dateField3").setAttribute("min", newDate);
		   document.getElementById("dateField3").setAttribute("value", newDate);
		});
   </script>
   <script>
		$('#dateField4').on('change', function() {
		   var dt4=new Date(this.value);
		   var dt6 = new Date(dt4.getTime() + (60*60*24*7*1000));
		   var dd2 = dt6.getDate();
		   var mm2 = dt6.getMonth()+1; 
		   var yyyy2 = dt4.getFullYear();
			 if(dd2<10){
				dd2='0'+dd2
			 } 
			 if(mm2<10){
				mm2='0'+mm2
			 }  
		   newDate2 = yyyy2+'-'+mm2+'-'+dd2;
		   document.getElementById("dateField5").setAttribute("min", newDate2);
		   document.getElementById("dateField5").setAttribute("value", newDate2);
		});
   </script>
   <script>
		$('#validateIt').validate();
  </script>
  <script>
		$('#validateIt2').validate();
  </script>
  <script>
		$('#validateIt3').validate();
  </script>
		

</html>
