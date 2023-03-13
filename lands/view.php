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
              <th>Verfication</th>
              <th>Date Uploaded</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['buildingstatus']; ?></td>
                <td><?php echo $row['verification']; ?></td>
                <td><?php echo $row['dateuploaded']; ?></td>
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
            <button type="button" name="button"><i class="fas fa-edit"></i> <a href="editproperty.php?pid=<?php echo $row['propertyid']?>">Edit Property</a></button>
            <button type="button" name="button"><i class="fa fa-download"></i> <a href="../documents/<?php echo $row['documents']; ?>">Documents</a> </button>

        </div>
      </div>
      <?php } ?>
  </body>
</html>
