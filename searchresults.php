<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Search Result - Student Information System</title>
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
								<form class="navbar-form" action="searchresults.php">
										<input  class="search-box" type="text" name="searchbox" id="searchbox" placeholder="Search.....">
										<input class="search-button" type="submit" name="search" id="search-btn" value="Search" class="btn btn-defualt">
								<from>
							</li>
              <li><a class="abc" href="home.php">Home</a></li>
							<li><a class="abc" href="studentinfo.php">Student info</a></li>
							<li><a class="abc" href="profile.php">Profile</a></li>
							<li><a class="abc" href="logout.php">Log out</a></li>
						</ul>

					</div>
					<i class="fas fa-bars" onclick="showMenu()"></i>
			</nav> 
<?php
      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

        $query = "SELECT studentno, firstname, lastname, course, yrlevel,email, DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname 
        FROM users WHERE CONCAT(firstname, ' ', lastname) = '$s' OR firstname = '$s' OR lastname = '$s' OR studentno = '$s' ORDER BY date_joined DESC LIMIT 5";
    ?>

      <center><strong class='title'>Search results for '<?php echo $s; ?>'.</strong></center>
    
    <?php

        if($result = mysqli_query($con, $query)) {

          if(mysqli_num_rows($result) == 0) {
            echo "<p>No results matches to your query.</p>";
            echo "</div>";


          } else {
            echo "</div>";
            echo "<div class='hearder-box'>";
            echo "<section  class='header' >";
            echo "<div class='main'>";
            while($row = mysqli_fetch_assoc($result)) {

          ?>

     <Section>
      <div class="card-header"><h4>Account Details</h4></div>
            <div class="card-body">
              <form>
                <div class="mb-3 username">
                  <label class="small mb-1" for="inputUsername"
                    >Username 
                  </label
                  >
                 <p class="p-user"><?php echo ucwords($row['fullname']); ?></p>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-2">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName"
                      >First name</label
                    >
                    <p class="p-user"><?php echo ucwords($row['firstname']); ?></p>
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputLastName"
                      >Last name</label
                    >
                    <p class="p-user"><?php echo ucwords($row['lastname']); ?></p>
                  </div>
                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (organization name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputOrgName"
                      >Student ID</label
                    >
                    <p class="p-user"><?php echo ucwords($row['studentno']); ?></p>
                  </div>
                  <!-- Form Group (Email adress)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputEmailAddress"
                    >Email address</label
                  >
                  <p class="p-user"><?php echo ucwords($row['email']); ?></p>
                  </div>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (phone number)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone"
                      >Course</label
                    >
                    <p class="p-user"><?php echo ucwords($row['course']); ?></p>
                  </div>
                  <!-- Form Group (birthday)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputBirthday"
                      >Year Level</label
                    >
                   <p class="p-user"><?php echo ucwords($row['yrlevel']); ?></p>
                  </div>
                </div>
              </form>
    </Section>
    <aside class="left">
      <div class="card-header"><h4>Profile Picture</h4></div>
            <div class="card-body text-center">
              <!-- Profile picture image-->
             <div class="container-img">
              <img
                class="img-account-profile rounded-circle mb-2"
                src="http://bootdey.com/img/Content/avatar/avatar1.png"
                alt=""
              />
              </div>
              <div class="name-id">
              <span class="name">
                <?php echo $row ['firstname'];
                echo " ";
                echo ucwords($row['lastname']);?>
            </span><br>
              <span class="IDno">
                <?php echo $row ['studentno'];
                ?>
            </span>
      </div>
            </div>
          </div>
    </div>
    </aside>
  </div>
  </section>

          <?php

            }

            echo "</div>";
            echo "</section>";
            echo "</div>";

          }

        } else {
          die("Error with the query");
        }

      }
    

    ?>
	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
<?php
	require 'script.php';
?>
<?php
	require 'footer.php';
?>

<?php 

  } else {
    header("location:index.php");
    exit;
  }

  mysqli_close($con);

?>