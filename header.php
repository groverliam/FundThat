<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
	<meta name="description" content="Cryptocurrency Landing Page Template">
	<meta name="keywords" content="cryptocurrency, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<link rel="stylesheet" type="text/css" href="css/login_style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="js/login_effect.js"></script>
	</head>
	   
	
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
<header class="header-section clearfix">
	<!--center>
	 <input type="button" id="show_login" value="Show Login">
	 <div id = "loginform">
	  <form method = "post" action = "">
	   <p>Join TalkersCode And get Quick Access To Our Tutorials,Questions,Web Tricks And Many More</p>
	   <input type = "image" id = "close_login" src = "images/close.png">
	   <input type = "text" id = "login" placeholder = "Email Id" name = "uid">
	   <input type = "password" id = "password" name = "upass" placeholder = "***">
	   <input type = "submit" id = "dologin" value = "Login">
	  </form>
	 </div>
	</center-->
		<div class="container-fluid">
			<a href="index.php" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<div class="responsive-bar"><i class="fa fa-bars"></i></div>
			<a href="" class="user"><i class="fa fa-user"></i></a>
			<!--a href="" class="site-btn">Sign Up Free</a-->
			<nav class="main-menu">
				<ul class="menu-list">
					<?php 
					   if (isset($_SESSION['Email'])){
					   ?>
					   	<li><a href="index.php?email=$Email">Home</a></li>
					   <?php
					}else{
						?>
							<li><a href="index.php">Home</a></li>
						
					<?php
				}
				?>
					<li><a href="accountView.php?email=$Email">My Account</a></li>
					<li><a href="blog.php?email=$Email">News</a></li>
					<li><a href="about.php?email=$Email">About</a></li>
					<li><a href="contact.php?email=$Email">Contact</a></li>
					<?php 
					   if (isset($_SESSION['Email'])){
					   ?>
					   	<li><a href="Logout.php" >Logout</a></li>
					   <?php
					}else{
						?>
							<li><a href="Login.php">Login</a></li>
						
					<?php
				}
				?>
				</ul>
			</nav>
		</div>
	</header>

</html>