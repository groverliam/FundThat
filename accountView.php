<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fund That!</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cryptocurrency Landing Page Template">
	<meta name="keywords" content="cryptocurrency, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
<section class="hero-section">
	<!-- Header section -->
	<?php include 'header.php';?>
	<!-- Header section end -->

<div class="main-content-inner">
    <div class="row">
        <!-- Primary table start -->
		<div class="col-12 mt-5">
		    <div class="card">
		        <div class="card-body">

		            <h4 class="header-title">Data Table Primary</h4>
		            <div class="data-tables datatable-primary">
		                <table id="dataTable2" class="text-center">
		                    <thead class="text-capitalize">
								<col width="200">
								<!--<col width="100">-->
								<col width="200">
								<col width="200">
								<col width="200">
		                        <tr>
		                            <th>Type</th>
									<th>Amount</th>
		                            <th>Transaction Date</th>
		                            <th>Account Number</th>
		                        </tr>
		                    </thead>
		                    <tbody>
							<?php
								include("../../sqlfiles/bank_db_connection.php");
								
								$display = 100;
								if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
								$start_from = ($page-1) * $display;
								$q = "SELECT * FROM Transactions ORDER BY Account_Number ASC LIMIT ". $start_from.", ". $display;
								
								$r = $conn->query($q) or die($conn->error);
									while (($row = $r->fetch_assoc()) !== null){
										
										echo "<tr>";
											echo "<td>".$row['Type']."</td>";
											echo "<td>".$row['Amount']."</td>";
											echo "<td>".$row['effective_date_time']."</td>";
											echo "<td>".$row['Account_Number']."</td>";
											//echo "<td><a onClick=\"javascript: return confirm('Do you really want to dispute this item?');\" 
											//		   href='dispute.php?trans_TBD=".$row['Account_Number '].$row['effective_date_time']."'>Edit</a></td>";
										echo "</tr>";
									}
								
							?>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>
		</div>
        <!-- Primary table end -->
    </div>
</div>
</section>

	<!-- Footer section -->
	<?php include 'footer.php';?>



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>