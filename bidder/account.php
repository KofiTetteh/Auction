<?php session_start(); ?>
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
      $bidderid = $_SESSION['bidderid'];

      $query = "select * from bidder where bidderid = '$bidderid'";
      $result = mysqli_query($conn,$query);
      while ($row = mysqli_fetch_array($result)) {

       ?>
      <div class="account">
        <div class="box1">
          <h4>Genenral Information</h4>
          <form class="" action="update.php" method="post">
            <i>Bidder ID:<b> <?php echo $row['bidderid']; ?></i>
            <p>First Name<br> <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"> </p>
            <p>Last Name<br> <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"> </p>
            <p>Phone Number<br> <input type="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']; ?>"> </p>
            <p>Address<br> <input type="address" name="address" value="<?php echo $row['address']; ?>"> </p>
            <p> <input type="submit" name="updatedetails" value="Update Info"> </p>
          </form>
        </div>
        <div class="box1">
          <h4>Email</h4>
          <form class="" action="update.php" method="post">
            <p><b>Current Email: &nbsp;</b><?php echo $row['email']; ?>   </p>
            <p>New Email Address <br> <input type="email" name="nemail" required> </p>
            <p>Confirm Email Address <br> <input type="email" name="cemail" required> </p>
            <p><input type="submit" name="updateemail" value="Update Info"> </p>
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
