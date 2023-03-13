<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/include.css">
    <link rel="stylesheet" href="css/maincss.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script defer src="css/all.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>NAA Auction Limited</title>
  </head>
  <body>
      <?php include('includes/header.php'); ?>
      <div class="clear"></div><br>
        <div class="form-div-signup">
          <form class="" action="update.php" method="post" enctype="multipart/form-data">
            <h3>Edit Property</h3>
            <?php
            include("../connection.php");

                      if(isset($_GET['pid'])){
                      $getid = $_GET['pid'];

                      $query = "select * from property where propertyid ='$getid'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                     ?>
              <p>Description<br>
              <textarea name="description" rows="6" cols="28" required><?php echo $row['description']; ?></textarea> </p>
              <p>Location<br>
                <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
              <input type="text" name="propertyid" value="<?php echo $row['propertyid']; ?>" hidden> </p>
              <p>Property Documents<br>
              <input type="file" name="documents" required></p>
              <p>Property Status<br>
                  <select class="" name="buildingstatus" required>
                    <option selected><?php echo $row['buildingstatus']; ?></option>
                    <option>New</option>
                    <option>Old</option>
                    <option>Renovated</option>
                  </select>
              <p>Property Picture <br>
                <input type="file" name="image1" required></p>
              <p>Property Picture 2<br>
                <input type="file" name="image2" required></p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <input type="submit" name="updateproperty" value="Update Property"> </p>
          </form>
        <?php } ?>
        </div>
  </body>
</html>
