<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="veiwport" content="width=device-width, initial-scale=1">
		<title>College of Computing and Informaion Sciences</title>
		<link  href="style.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/236beb38f3.js" crossorigin="anonymous"></script>
	</head>

			
	<body>
			<nav>
				<a href="index.php"><img src="logo.png"><p>CCIS</p></a>
					<div class="nav-links" id="navLinks">
						<i class="fas fa-times" onclick="hideMenu()"></i>
						<ul>
							<li><a class="abc" href="home.php">Home</a></li>
							<li><a class="abc" href="studentinfo.php">Student info</a></li>
							<li><a class="abc" href="profile.php">Profile</a></li>
							<li><a class="abc" href="logout.php">Log out</a></li>
						</ul>

					</div>
					<i class="fas fa-bars" onclick="showMenu()"></i>
			</nav>

		
		<div class="hearder-box">
		<section  class="header" >
			<div class="text-box">
				<h1>College of Computing and <br>Information Sciences</h1>
				<p>-Your best option to Success-</p>
				<a href="" class="hero-btn">Visit Us To know More.</a>
			</div>
        </div>
		</section>
	<!----------- Courses -------------->
	<div>
		<section class="course">
			<h1>Program We Offer</h1>

			<div class="row">
				<div class="course-col">
					<h3>Information Technology</h3>
					<p>The one of the primary educational objective of the program is produce graduates who can enter into and advance in the professions of IT, management information systems, and IT business infrastructure, as well as continue their education and obtain advanced degrees in these and related fields.</p>
				</div>
				<div class="course-col">
					<h3>Information Systems</h3>
					<p>The program prepares students to become IT professionals with primary competencies in the areas of business process analysis and reengineering, change management, systems integration, systems implementation, system evaluation/quality assurance, and software maintenance.</p>
				</div>
				<div class="course-col">
					<h3>Computer Science</h3>
					<p>A study of computers and computing, including their theoretical and algorithmic foundations, hardware and software, and their uses for processing information. The discipline of computer science includes the study of algorithms and data structures, computer and network design, modeling data and information processes, and artificial intelligence</p>
				</div>
			</div>

		</section>	
</div>
<?php
	require 'footer.php';
?>
<?php
	require 'script.php';
?>