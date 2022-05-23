<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  if(isset($_SESSION['username'], $_SESSION['password'])) {
   if(isset($_SESSION['userid'])){
     $query=mysqli_query($con,"select * from `users` WHERE id='".$_SESSION['userid']."'");
		 $row=mysqli_fetch_array($query)
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile - Student Information System</title>
  <link  href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/236beb38f3.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
  <?php 
    include 'profile.nav.php'; 
  ?>
<div class="hearder-box">
  <section  class="header" >
  <div class="main">
    <Section>
      <div class="card-header"><h4>Account Details</h4>
      <?php
     if(isset($_SESSION['prompt'])) {
          showPrompt();
        }
        ?>
    </div>
            <div class="card-body">
              <form>
                <div class="mb-3 username">
                  <label class="small mb-1" for="inputUsername"
                    >Username 
                  </label
                  >
                 <p class="p-user"><?php echo ucwords($row['username']); ?></p>
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
                <!-- Save changes button-->
                <button class="btn btn-primary" type="sumbit">
                 <a href="editprofile.php"> Edit Profile</a>
                </button>
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
            <div class="change">
              <center>
                 <button class="btn btn-danger">
                 <a href="changepassword.php"> Change Password</a>
                </button>
              </center>
            </div>
          </div>
    </div>
    </aside>
  </div>
  </section>
 </section>
      </div>
  <?php } ?>
    <script type="text/javascript"></script>
    
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

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>