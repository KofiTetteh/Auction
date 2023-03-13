<?php
session_start();
include("../connection.php");
$ownerid = $_SESSION['ownerid'];
  if(isset($_POST['search'])){
    $search = $_POST['searchname'];

  $query = "select * from owner where firstname = '$search' or lastname = '$search' or ownerid = '$search'";
  $result = mysqli_query($conn, $query);
  ?>
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
      <div class="search2">
        <form class="" action="search.php" method="post">
          <h4>Search for Assets</h4>
          <input type="search" name="searchname" placeholder="Enter city">
          <input type="submit" name="search" value="Search">
          <button type="button" name="button"> <a href="sellers.php">Add Owner <i class="fa fa-plus"> </i></a></button>
        </form>
      </div>
      <div class="clear"></div>
      <?php
        while($row = mysqli_fetch_array ($result)){
      ?>
      <div class="auction">
        <div class="description">
          <table>
            <thead>
              <th>Full Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone Number</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['firstname']; ?> &nbsp; <?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['phonenumber']; ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="delete.php?oid=<?php echo $row['ownerid']; ?>"> Remove Property </a></button>
          <button type="button" name="button"><i class="fas fa-edit"></i> <a href="editsellers.php?oid=<?php echo $row['ownerid']; ?>">Edit Property</a></button>
                </div>
        <div class="clear">
          <br>
        </div>
      <?php } ?>
      </div>
        <div class="clear">
          <br>
        </div>
      <?php } ?>
      </div>

  </body>
</html>
