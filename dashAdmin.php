<?php
	session_start();
	if(!isset($_SESSION["adminID"]))
		header("location:index.php");
	$con=mysqli_connect("localhost","root","","ecar");
	if(!$con)
		die("error");
	$q="select * from customer";
	$q_run=mysqli_query($con,$q);
	$rows=mysqli_num_rows($q_run);
	$q2="select * from car";
	$q2_run=mysqli_query($con,$q2);
	$rows2=mysqli_num_rows($q2_run);
	$q3="select * from bill";
	$q3_run=mysqli_query($con,$q3);
	$rows3=mysqli_num_rows($q3_run);
	$q4="select * from booking";
	$q4_run=mysqli_query($con,$q4);
	$rows4=mysqli_num_rows($q4_run);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ADMIN|ECARS</title>

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
	                    <a href="dashAdmin.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="customers.php">
	                        <i class="material-icons">Customers</i>
	                        <p>Customers</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="cars.php">
	                        <i class="material-icons">Cars</i>
	                        <p>Cars</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="bookings.php">
	                        <i class="material-icons">Bookings</i>
	                        <p>Bookings</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="payments.php">
	                        <i class="material-icons">Payments</i>
	                        <p>Payments</p>
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
						<a class="navbar-brand" href="dashAdmin.php">ADMIN</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="dashAdmin.php">
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
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="fa fa-user"></i>
								</div>
								<div class="card-content">
									<p class="category">Users</p>
									<h3 class="title"><?php echo $rows; ?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="fa fa-car"></i>
								</div>
								<div class="card-content">
									<p class="category">Cars</p>
									<h3 class="title"><?php echo $rows2; ?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="fa fa-address-book"></i>
								</div>
								<div class="card-content">
									<p class="category">Bookings</p>
									<h3 class="title"><?php echo $rows3; ?></h3>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="fa fa-money"></i>
								</div>
								<div class="card-content">
									<p class="category">Bill Generated</p>
									<h3 class="title"><?php echo $rows4; ?></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card" style="background:#00bcd4;">
					<canvas id="myChart" style="height:100% !important;"></canvas>
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var user="<?php echo $rows; ?>";
			var car="<?php echo $rows2; ?>";
			var bookings="<?php echo $rows3; ?>";
			var bill="<?php echo $rows4; ?>";
			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'bar',

				// The data for our dataset
				data: {
					labels: ['USERS','CARS', 'BOOKINGS','BILL'],
					datasets: [{
						label: 'E-CAR',
						backgroundColor: 'rgba(255,255,255,0.5)',
						borderColor: '#fff',
						data: [user,car,bookings,bill],
					}]
					
				},
				maintainAspectRatio: false,
				// Configuration options go here
				options: {
					legend: {
							// This more specific font property overrides the global property
						labels: {	
							fontColor: 'white'
						}
					
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true,
								fontColor: 'white',
                                stepSize: 1,
                                max: 10
							},
							gridLines: {
								tickMarkLength: 5, 
								color:'rgba(255,255,255,0.2)',
								borderDash:[2]
							},
						}],
					  xAxes: [{
							ticks: {
								fontColor: 'white'
							},
							gridLines: {
								tickMarkLength: 5, 
								color:'rgba(255,255,255,0.4)'
							},
						}],
					}
				}
			});
		</script>

	

</html>
