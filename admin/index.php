<?php
session_start();
include("../connection.php");
 if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $password = base64_encode($password);

   $query = "select *from users where username = '$username' and password = '$password'";
   $result = mysqli_query($conn, $query);

   if($row = mysqli_fetch_array($result)){
     $_SESSION['username'] = $row['username'];

     $username = $_SESSION['username'];

     echo "<script>alert('Hello $username, you have log in successfully'); window.location = 'property.php'</script>";
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
        <div class="form-div">
          <form class="" action="index.php" method="post" enctype="multipart/form-data">
            <h3>Login</h3>
            <p>Username<br>
              <input type="text" name="username" placeholder="Enter username" required></p>
              <p>Password<br>
              <input type="password" name="password" placeholder="Enter password" required></p>
              <p> <input type="submit" name="login" value="Login"> </p>
          </form>
        </div>
  </body>
</html>
