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

	<title>PAYMENTS|ECARS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">

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
	                <li class="active">
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
									<h4 class="title">Payments History</h4>
								</div>
								<div style="padding:20px;">
									<?php
										//Radhe
										$customerID=$_SESSION["customerID"];
										$con=mysqli_connect("localhost","root","","ecar");
										if(!$con)
											die("Error");
										$q="select * from payment where customerID='$customerID'";
										$q_run=mysqli_query($con,$q);
										$rows=mysqli_num_rows($q_run);
										if($rows > 0){
									?>
										<table id="customersList" class="table table-striped table-bordered bg-white" style="width:100%">
										
											<thead>
												<tr>
													<th>PAYMENT ID</th>
													<th>CAR</th>
													<th>TOTAL AMOUNT(Rs.)</th>
													<th>STATUS</th>
												</tr>
											</thead>
											<tbody>
											<?php
												while($row=mysqli_fetch_assoc($q_run)){
													$bookID=$row["bookID"];
													$q3="select * from booking where id='$bookID'";
													$q3_run=mysqli_query($con,$q3);
													$row3=mysqli_fetch_assoc($q3_run);
													$carID=$row3["carID"];
													$q2="select * from car where id='$carID'";
													$q2_run=mysqli_query($con,$q2);
													$row2=mysqli_fetch_assoc($q2_run);
													
													
											?>
												<tr>
													<td><?php echo $row["id"]; ?></td>
													<td><?php echo $row2["name"]; ?></td>													
													<td><?php echo $row["totalAmt"]; ?></td>
													<td><?php echo $row["status"]; ?></td>
												</tr>	
											<?php
												}
											?>	
											</tbody>
											
										</table>
									<?php
										}else{
											echo "<b>No records to display</b>";
										}
									?>	
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

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

	
	<script>
		jQuery(document).ready(function() {
			jQuery('#customersList').DataTable({
				scrollX:true,
				fixedColumns:   true,
			});
		} );
	</script>

</html>
