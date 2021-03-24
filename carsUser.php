<?php
	session_start();
	if(!isset($_SESSION["customerID"]))
		header("location:index.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CARS|ECARS</title>

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
					<?php
							$con=mysqli_connect("localhost","root","","ecar");
							if(!$con)
								die("error");
							$q="select * from car";
							$q_run=mysqli_query($con,$q);
							while($row=mysqli_fetch_assoc($q_run)){
								$color=array('blue','green','purple','orange','red');
								shuffle($color);
						?>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header card-chart" data-background-color="<?php echo $color[0]; ?>">
									<img src="img/cars/<?php echo $row['pic']; ?>" style="height:200px!important;width:300px!important;">
								</div>
								<div class="card-content">
									<h4 class="title"><?php echo $row['name']; ?></h4>
									<p class="category">
										<span class="text-success">
											<i class="fa fa-rupee"></i> <?php echo $row['rate']; ?> 
										</span>/Hour.&nbsp;&nbsp;
										<span class="text-info">
											<i class="fa fa-rupee"></i> <?php echo $row['rate']*8; ?> 
										</span>/Day.&nbsp;&nbsp;
										<span class="text-primary">
											<i class="fa fa-rupee"></i> <?php echo $row['rate']*40; ?> 
										</span>/Week.
									</p>
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="rentCar.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Rent Now</a>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
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

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
