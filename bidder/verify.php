<?php
session_start();
include("../connection.php");
 if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $password = base64_encode($password);

   $query = "select *from bidder where email = '$email' and password = '$password'";
   $result = mysqli_query($conn, $query);

   if($row = mysqli_fetch_array($result)){
     $_SESSION['firstname'] = $row['firstname'];
     $_SESSION['lastname'] = $row['lastname'];
     $_SESSION['email'] = $row['email'];
     $_SESSION['ownerid'] = $row['ownerid'];

     $sessionfirstname = $_SESSION['firstname'];

     echo "<script>alert('Hello $sessionfirstname, you have log in successfully'); window.location = 'home.php'</script>";
   }else{
     echo "<script>alert('Email and Password do not match'); window.location = 'index.php'</script>";
   }
 }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/include.css">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>NAA Auction Limited</title>
  </head>
  <body>
      <?php include('includes/headerindex.php'); ?>
      <div class="clear"></div>
      <div class="verify-message">
        <marquee>Check email for details to verify</marquee>
      </div>
        <div class="form-div">
          <form class="" action="verify.php" method="post" enctype="multipart/form-data">
            <h3>Login</h3>
            <p>Email<br>
              <input type="email" name="email" placeholder="Enter email " required></p>
              <p>Password<br>
              <input type="password" name="password" placeholder="Enter password" required></p>
              <p> <input type="submit" name="login" value="Login"> </p>
              <p><a href="signup.php">Create a new account</a>.</p>
              <p><a href="reset.php">Forgot your password? </a> </p>
          </form>
        </div>
  </body>
</html>
