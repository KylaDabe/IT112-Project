<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $uname = clean($_POST['username']);
    $email = clean($_POST['email']); 
    $pword = clean($_POST['password']); 
    $studno = clean($_POST['studentno']); 
    $fname = clean($_POST['firstname']); 
    $lname = clean($_POST['lastname']); 
    $course = clean($_POST['course']); 
    $yrlevel = clean($_POST['yrlevel']);

    $query = "UPDATE users SET firstname = '$fname', lastname = '$lname', course = '$course', yrlevel = '$yrlevel'
    WHERE id='".$_SESSION['userid']."'";

    if($result = mysqli_query($con, $query)) {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:profile.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password'])) {

    $qry = mysqli_query($con,"SELECT * FROM users where id = {$_SESSION['userid']} ");
    $data = mysqli_fetch_array($qry);
    extract($data);

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Profile - Student Information System</title>
  
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

<?php 
    include 'profile.nav.php'; 
  ?>
  <div class="hearder-box">
  <section  class="header" >
  <div class="main">
    
    <Section>
      <div class="error">
      <?php
     if(isset($_SESSION['prompt'])) {
          showPrompt();
        }
        ?>
        </div>
      <div class="card-header"><h4>Account Details</h4></div>
            <div class="card-body">
              <form action="editprofile.php" method="POST">
                <div class="mb-3 username">
                  <label class="small mb-1" for="username"
                    >Username 
                  </label
                  >
                 <input type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="Username" required>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-2">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="firstname"
                      >First name</label
                    >
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>" placeholder="Enter Firstname" required>
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="lastname"
                      >Last name</label
                    >
                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>" placeholder="Enter Lastname" required>
                  </div>
                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (organization name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputOrgName"
                      >Student ID</label
                    >
                    <?php 
                    $query = "SELECT studentno FROM users WHERE id = '".$_SESSION['userid']."'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_row($result);

                    echo "<p class='p-user'>".$row[0]."</p>";
                   ?>
                  </div>
                  <!-- Form Group (Email adress)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="email"
                    >Email address</label
                  >
                  <input type="text" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Enter your Email address" required>
                  </div>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (phone number)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="course"
                      >Course</label
                    >
                 <select class="form-control" name="course">
                    <option value="BSIS" <?php echo $course == 'BSIS' ? "selected": ""; ?>>BSIS</option>
                    <option value="BSIT" <?php echo $course == 'BSIT' ? "selected": ""; ?>>BSIT</option>
                    <option value="BSCS" <?php echo $course == 'BSCS' ? "selected": ""; ?>>BSCS</option>
                 </select>
                  </div>
                  <!-- Form Group (birthday)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="yrlevel"
                      >Year Level</label
                    >
                 <select class="form-control" name="yrlevel">
                    <option <?php echo $yrlevel == '1st year' ? "selected": ""; ?>>1st year</option>
                    <option <?php echo $yrlevel == '2nd year' ? "selected": ""; ?>>2nd year</option>
                    <option <?php echo $yrlevel == '3rd year' ? "selected": ""; ?>>3rd year</option>
                    <option <?php echo $yrlevel == '4th year' ? "selected": ""; ?>>4th year</option>
                 </select>
                  </div>
                </div><br>
                <!-- Save changes button-->
                <div class="form-footer">
                  <a href="profile.php">Go back</a>
                  <input class="btn btn-primary edit" type="submit" name="update" value="Update Profile">
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
                <?php echo $firstname;
                echo " ";
                echo  $lastname ;?>
            </span><br>
              <span class="IDno">
                <?php echo $studentno;
                ?>
            </span>
        </div>
            </div>
            <div>
            </div>
          </div>
    </div>
    </aside>
  </div>
  </section>
      </section>
      </div>
    <script type="text/javascript"></script>
<?php
	require 'script.php';
?>
<?php
	require 'footer.php';
?>
<?php
  } else {
    header("location:profile.php");
  }

  mysqli_close($con);

?>