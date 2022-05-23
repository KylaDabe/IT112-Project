<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['login'])) {

    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pword'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];

      header("location:home.php");
      exit;

    } else {

      $_SESSION['errprompt'] = "Wrong username or password.";

    }

  }

  if(!isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login - Student Information System</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link  href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/236beb38f3.js" crossorigin="anonymous"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<nav class="tae">
	    <a href="main.php"><img src="logo.png">
      <p class="ccis">CCIS</p>
	</a>
		    <div class="nav-links" id="navLinks">
			    <i class="fas fa-times" onclick="hideMenu()"></i>
			    <ul>
				    <li><a class="cta" href="index.php">Log In</a></li>
			    </ul>
		    </div>
			    <i class="fas fa-bars" onclick="showMenu()"></i>
        </nav>
<body>
 <center> <div class="hearder-box-box">
<section  class="header" >
    <div class="login-form box-center">
      <?php 

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

        if(isset($_SESSION['errprompt'])) {
          showError();
        }

      ?>
      <form action="index.php" method="POST">
        <div class="form-group">
          <label for="username" class="sr-only">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
          <label for="password" class="sr-only">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <a href="register.php">Need an account?</a>
        <input class="btn btn-primary" type="submit" name="login" value="Log In">

      </form>
  </div>
</section>
</div></center>

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
<?php
	require 'script.php';
?>
<?php
	require 'footer.php';
?>
<style>
      .box-center{
      border-radius: 5px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
      .form-control{
        font-size: 14px;
      }
    .tae{
      padding-bottom: 6px;
    }
    .ccis  {
      text-decoration: none;
      color: rgb(252, 252, 252);
      font-size: 38px;   
      padding: 24px 10px 0 0;
      margin-left: auto;
      text-shadow: 1px 1px 2px #000000;
      float: right;
    }
    .hearder-box-box{
      width: 98%;
      padding-top: 1%;
      padding-bottom: 1% ;
    }
</style>
</html>

<?php

  } else {
    header("location:profile.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt']);

  mysqli_close($con);

?>