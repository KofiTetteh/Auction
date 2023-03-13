<?php
session_start();
include("../connection.php");
$ownerid = $_SESSION['ownerid'];
  if(isset($_POST['search'])){
    $search = $_POST['searchname'];

  $query = "select * from property where ownerid = '$ownerid' and location = '$search'";
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
      <div class="search1">
        <form class="" action="search.php" method="post">
          <h4>Search for Assets</h4>
          <input type="search" name="searchname" placeholder="Enter city">
          <input type="submit" name="search" value="Search">
          <button type="button" name="button"> <a href="addproperty.php">Add Property <i class="fa fa-plus"> </i></a></button>
          <button type="button" name="button"> <a href="soldproperty.php">Sold Property <i class="fa fa-money-bill"> </i></a></button>
        </form>
      </div>
      <h5>Search Results</h5>
      <div class="clear"></div>
      <?php
        while($row = mysqli_fetch_array ($result)){
      ?>
      <div class="auction">
        <div class="picture">
          <img src="../images/<?php echo $row['image1']; ?>" alt=""/>
        </div>
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
          <button type="button" name="button"><i class="fas fa-eye"></i> <a href="view.php?pid=<?php echo $row['propertyid']; ?>">View Asset</a> </button>
          <?php
          include("../connection.php");
          $datequery = "select DATEDIFF(NOW(),dateuploaded) as date,propertyid from property ";
          $dateresult = mysqli_query($conn,$datequery);
          $daterow = mysqli_fetch_array($dateresult);
          $date = $daterow['date'];
          $propertyid = $daterow['propertyid'];
          if($date > 3){

          }else{
            echo '<button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="deletepet.php?pid='.$propertyid.'"> Remove Property </a></button>';
            echo '<button type="button" name="button"><i class="fas fa-edit"></i> <a href="editproperty.php?pid='.$propertyid.'">Edit Property</a></button>';
          }
           ?>
        </div>
        <div class="clear">
          <br>
        </div>
      <?php } }?>
      </div>

  </body>
</html>
