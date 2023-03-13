
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
        <div class="form-div-signup">
          <form class="" action="update.php" method="post" enctype="multipart/form-data">
            <?php
            include("../connection.php");

                      if(isset($_GET['uid'])){
                      $getid = $_GET['uid'];

                      $query = "select * from users where username ='$getid'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                     ?>
            <h3>Update User Details</h3>
              <p>Username<br>
                <input type="text" name="usernameid" value="<?php echo $row['username']; ?>" hidden>
              <input type="text" name="username" value="<?php echo $row['username']; ?>" required></p>
              <p>Job<br>
                <input type="text" name="job" value="<?php echo $row['job']; ?>" required></p>
                <p> <br> <br> </p>
                <p> <br> <br> </p>

              <p>Password<br>
              <input type="password" name="password" minlength="8" required></p>
              <p>Confirm Password<br>
                <input type="password" name="cpassword" minlength="8" required></p>
                <p> <br> <br> </p>
                <p> <br> <br> </p>

              <p> <br> <br> </p>
              <p> <input type="submit" name="updateuser" value="Upadate Info"> </p>
            <?php } ?>
          </form>
        </div>
  </body>
</html>
