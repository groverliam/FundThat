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

	<!-- Header section -->
	<?php include 'header.php';?>
	<!-- Header section end -->


<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Data Table Primary</h4>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>Req ID</th>
							<th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Assigner</th>
                            <th>Parent Req ID</th>
                            <th>Summary</th>
							<th>Assignee</th>
                            <th>Version</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						include("../includes/reqd_connection.php");
						
						$display = 1000;
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
						$start_from = ($page-1) * $display;
						$q = "SELECT * FROM requirements ORDER BY requirement_id ASC LIMIT ". $start_from.", ". $display;
						
						$r = $conn->query($q) or die($conn->error);
							while (($row = $r->fetch_assoc()) !== null){
								
								echo "<tr>";
									echo "<td>".$row['requirement_id']."</td>";
									echo "<td>".$row['requirement_type']."</td>";
									echo "<td>".$row['requirement_sdate']."</td>";
									echo "<td>".$row['requirement_edate']."</td>";
									echo "<td>".$row['requirement_assigner']."</td>";
									echo "<td>".$row['requirement_parent']."</td>";
									echo "<td>".$row['requirement_summary']."</td>";
									echo "<td>".$row['requirement_assignee']."</td>";
									echo "<td>".$row['requirement_version']."</td>";
									echo "<td><a onClick=\"javascript: return confirm('Do you really want to edit this item?');\" 
											   href='edit_req.php?requirement_id_TBD=".$row['requirement_id']."'>Edit</a></td>";
									echo "<td><a onClick=\"javascript: return confirm('Do you really want to remove this item?');\" 
											   href='delete_req.php?requirement_id_TBD=".$row['requirement_id']."'>Delete</a></td>";
								echo "</tr>";
							}
						
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

	<!-- Footer section -->
	<?php include 'footer.php';?>



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>