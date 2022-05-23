<?php
 session_start();
  require 'connect.php';
  require 'functions.php';
if(isset($_SESSION['username'], $_SESSION['password'])) {
	if(isset($_SESSION['username'], $_SESSION['password'])) {
		$start = clean($_POST['start']);
		$stop = clean($_POST['stop']);
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Student Information - Student Information System</title>

	<link  href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/236beb38f3.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
<nav>
				<a href="index.php"><img src="logo.png"><p>CCIS</p></a>
					<div class="nav-links" id="navLinks">
						<i class="fas fa-times" onclick="hideMenu()"></i>
						<ul>
							<li>
								<form action="searchresults.php" method="GET">
										<input  class="search-box" type="text" name="searchbox" id="searchbox" placeholder="Search.....">
										<input class="search-button" type="submit" name="search" id="search-btn" value="Search" class="btn btn-defualt">
								</form>
							</li>
							<li><a class="abc" href="home.php">Home</a></li>
							<li><a class="abc" href="">Student info</a></li>
							<li><a class="abc" href="profile.php">Profile</a></li>
							<li><a class="abc" href="logout.php">Log out</a></li>
						</ul>

					</div>
					<i class="fas fa-bars" onclick="showMenu()"></i>
			</nav>
	<!----------- Courses -------------->

<div class="hearder-box">
  <section  class="header " >
  <div class="stu">
	  <section class="info">
		 <div class="card-header">
			 <div class="optionsearch">
		
			 <form action="studentinfo.php" method="POST" >
				 <select name="start">
					<option value="BSIS"<?php if($start == 'BSIS'){echo 'selected';}?>>BSIS</option>
                  	<option value="BSIT"<?php if($start == 'BSIT'){echo 'selected';}?>>BSIT</option>
                  	<option value="BSCS"<?php if($start == 'BSCS'){echo 'selected';}?>>BSCS</option>
				</select>
				<select name="stop">
				   <option value="1st year"<?php if($stop == '1st year'){echo 'selected';}?>>1st year</option>
                  <option value="2nd year"<?php if($stop == '2nd year'){echo 'selected';}?>>2nd year</option>
                  <option value="3rd year"<?php if($stop == '3rd year'){echo 'selected';}?>>3rd year</option>
                  <option value="4th year"<?php if($stop == '4th year'){echo 'selected';}?>>4th year</option>
				</select>
				<input  type="submit"name="display" value="Display" onclick="display();">
				<input type="submit" name="displayall" value="Display All" onclick="displayall();">
		</form>
		<?php } ?>
		</div>
		 </div>
		 <div class="yw">
			 <table id="customers">
			<thead>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Email</th>
				<th>Course</th>
				<th>Year Level</th>
				<th>Date_Joined</th>
			</thead>
			<tbody>
			<?php
				include('connect.php');
			if(isset($_POST['displayall'])){
				$query=mysqli_query($con,"select studentno, firstname,lastname,email,course,yrlevel , DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname from `users`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo ucwords($row['studentno']); ?></td>
						<td><?php echo ucwords($row['fullname']); ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['course']; ?></td>
						<td><?php echo $row['yrlevel']; ?></td>
						<td><?php echo $row['date_joined']; ?></td>
					</tr>
					<?php
				}
			}
 
			?>
			<?php
			if(isset($_POST['display'])){
				$query=mysqli_query($con,"select studentno, firstname,lastname,email,course,yrlevel , DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname from `users` where course = '$start' and yrlevel = '$stop' ");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo ucwords($row['studentno']); ?></td>
						<td><?php echo ucwords($row['fullname']); ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['course']; ?></td>
						<td><?php echo $row['yrlevel']; ?></td>
						<td><?php echo $row['date_joined']; ?></td>
					</tr>
					<?php
				}
			}
 
			?>
			</tbody>
		</table>
			</div>
	  </section>

	</div>
    </section>
    </div>
    <script type="text/javascript"></script>
</body>


<style>
	.stu{
		padding-top:2%;
		margin-left: 16%;
	}
	.stu .info{
		width: 80%;
		height: 88vh;
		background-color:white;
	}
	.yw{
		width: 94%;
		padding-left:5%;
		padding-top:2%;
	}
	#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.optionsearch{
	padding-left: 4%;
}

		
	</style>
</html>
<?php 
  }
?>
<?php
	require 'script.php';
?>
<?php
	require 'footer.php';
?>