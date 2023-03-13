<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/maincss.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script defer src="css/all.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>NAA Auction Limited</title>
  </head>
  <body>
      <?php include('includes/header.php'); ?>
      <div class="clear"></div>
      <h5>My Account Information</h5>
      <?php
      include("../connection.php");
      $username = $_SESSION['username'];

      $query = "select * from users where username = '$username'";
      $result = mysqli_query($conn,$query);
      while ($row = mysqli_fetch_array($result)) {

       ?>
      <div class="account">
        <div class="box1">
          <h4>Genenral Information</h4>
          <form class="" action="update.php" method="post">
            <p>Username<br> <input type="text" name="username" value="<?php echo $row['username']; ?>"> </p>
            <p> <input type="submit" name="updatedetails" value="Update Info"> </p>
          </form>
        </div>
        <div class="box1">
          <h4>Password</h4>
          <form class="" action="update.php" method="post">
            <p>Current Password<br> <input type="password" minlength="8"  name="password" required> </p>
            <p>New Password<br> <input type="password" minlength="8"  name="npassword" required> </p>
            <p>Confirm New Password<br> <input type="password" minlength="8"  name="cpassword" required> </p>
            <p> <input type="submit" name="updatepassword" value="Update Info"> </p>
          </form>
        </div>
      </div>
    <?php } ?>
  </body>
</html>
