
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
            <h3>Edit Auction</h3>
            <?php
            include("../connection.php");

                      if(isset($_GET['aid'])){
                      $getid = $_GET['aid'];

                      $query = "select * from auction where auctionid ='$getid'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                     ?>
              <p>Start Date<br>
                <input type="date" name="startdate" value="<?php echo $row['startdate']; ?>" required>
              <input type="text" name="auctionid" value="<?php echo $row['auctionid']; ?>" hidden> </p>
              <p>End Date<br>
                <input type="date" name="enddate" value="<?php echo $row['enddate']; ?>" required></p>
                <p> <br> <br> </p><p> <br> <br> </p>
              <p>Sold Status<br>
                  <select class="" name="soldstatus" required>
                    <option selected><?php echo $row['soldstatus']; ?></option>
                    <option>Sold</option>
                    <option>Unsold</option>
                  </select>
              <p>Start Price<br>
                <input type="number" min="<?php echo $row['startprice']; ?>" name="startprice" value="<?php echo $row['startprice']; ?>" required></p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <br> <br> </p><p> <br> <br> </p>
              <p> <input type="submit" name="updateauction" value="Update Auction"> </p>
          </form>
        <?php } ?>
        </div>
  </body>
</html>
