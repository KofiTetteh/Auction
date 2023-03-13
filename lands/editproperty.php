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
      <?php

      include("../connection.php");

                if(isset($_GET['pid'])){
                $getid = $_GET['pid'];

                $query = "select * from property where propertyid ='$getid'";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_assoc($result);

               ?>
      <div class="sliderpage">
        <input type="radio" name="images" id="i1" checked>
        <input type="radio" name="images" id="i2">

        <div class="slide_img" id="one">
          <img src="../images/<?php echo $row['image1']; ?>" alt="">
          <label for="i1" class="prev"></label>
          <label for="i2" class="next"></label>
        </div>

        <div class="slide_img" id="two">
          <img src="../images/<?php echo $row['image2']; ?>" alt="">
          <label for="i2" class="prev"></label>
          <label for="i1" class="next"></label>
        </div>

        <div class="nav_dots">
          <label for="i1" class="dots" id="dot1"></label>
          <label for="i2" class="dots" id="dot2"></label>
        </div>
      </div>
      <div class="clear"></div>
      <div class="auction">
        <div class="description">
          <table>
            <thead>
              <th>Decription</th>
              <th>Location</th>
              <th>Status</th>
              <th>Verification</th>
              <th>Date Uploaded</th>
              <th>Document</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['buildingstatus']; ?></td>
                <form class="" action="update.php" method="post">
                <td><select class="" name="verification" style="padding: 10px; width: 150px; ">
                  <option select><?php echo $row['verification']; ?></option>
                  <option >Verified</option>
                  <option >Unverified</option>
                  <option >Cancelled</option>
                </select></td>
                <td><?php echo $row['dateuploaded']; ?></td>
                <td><a href="../documents/<?php echo $row['documents']; ?>"><?php echo $row['documents']; ?><i class="fa fa-download"></i> </a> </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <br>
              Property ID: <input type="text" name="propertyid" style="background: transparent;" value="<?php echo $row['propertyid']; ?>">
             <button type="submit" name="updateverify" style="cursor: pointer; "><i class="fas fa-edit"></i> Update Verification</button>
          </form>
        </div>
      </div>
      <?php } ?>
  </body>
</html>
