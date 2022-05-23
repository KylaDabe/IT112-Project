<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $oldpass = clean($_POST['oldpass']);
    $newpass = clean($_POST['newpass']);
    $confirmpass = clean($_POST['confirmpass']);

    $query = "SELECT password FROM users WHERE password = '$oldpass'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      if($newpass == $confirmpass) {

        $query = "UPDATE users SET password = '$newpass' WHERE id='".$_SESSION['userid']."'";

        if($result = mysqli_query($con, $query)) {

          $_SESSION['prompt'] = "Password updated.";
          $_SESSION['password'] = $newpass;
          header("location:profile.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "The new passwords you entered doesn't match.";;

      }

    } else {

      $_SESSION['errprompt'] = "You've entered a wrong old password.";

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Change Password - Student Information System</title>

	<link  href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/236beb38f3.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    
</head>
<body>

  <?php include 'profile.nav.php'; ?>
<div class="hearder-box">
  <section  class="header" >
  <div class="main">
    
    <Section>
      <div class="card-header"><h4>Change Password</h4></div>
            <div class="card-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3 username">
                  <label class="small mb-1" for="oldpass"
                    >Old password 
                  </label
                  >
                 <input type="password" class="form-control" name="oldpass"  placeholder="Old Password" required>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-4">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="newpass"
                      >New Password</label
                    >
                    <input type="password" class="form-control" name="newpass"  placeholder="New Password" required>
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="confirmpass"
                      >Confirm Password</label
                    >
                    <input type="password" class="form-control" name="confirmpass"  placeholder="Confirm Password" required>
                </div>
                 </div>
                   <div class="form-footer">
                    <a href="profile.php">Go back</a>
                    <input class="btn btn-primary edit" type="submit" name="update" value="Update Password">
                  </div>
              </form>
    </Section>
    <?php
    if(isset($_SESSION['username'], $_SESSION['password'])) {

    $qry = mysqli_query($con,"SELECT * FROM users where id = {$_SESSION['userid']} ");
    $data = mysqli_fetch_array($qry);
    extract($data);
?>
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
    <?php }?>
  </div>
  </section>
    </section>
    </div>
    <script type="text/javascript"></script>
</body>

</html>
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

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>