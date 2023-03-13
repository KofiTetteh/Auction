
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

                      if(isset($_GET['oid'])){
                      $getid = $_GET['oid'];

                      $query = "select * from owner where ownerid ='$getid'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                     ?>
            <h3>Update Onwer Details</h3>
              <p>First Name<br>
                <input type="text" name="ownerid" value="<?php echo $row['ownerid']; ?>" hidden>
              <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required></p>
              <p>Last Name<br>
                <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" required></p>
                <p> <br> <br> </p>
                <p> <br> <br> </p>

              <p>Email<br>
              <input type="email" name="email" value="<?php echo $row['email']; ?>" required></p>
              <p>Address<br>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" required></p>
                <p> <br> <br> </p>
                <p> <br> <br> </p>

              <p>Phone Number<br>
                  <input type="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']; ?>" minlength="10" required></p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <input type="submit" name="updateowner" value="Upadate Info"> </p>
            <?php } ?>
          </form>
        </div>
  </body>
</html>
