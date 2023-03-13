<?php
session_start();
include("../connection.php");

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $num_per_page = 10;
  $start_from = ($page-1)*10;
  $bidderid= $_SESSION['bidderid'];

  $query = "select * from property p,auction a,bid b where p.verification = 'Verified' and a.propertyid = p.propertyid and a.soldstatus = 'Sold' and
  b.bidderid = '$bidderid' limit $start_from,$num_per_page";
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
      <br>
      <h5>Acquired Assets</h5>
      <div class="clear"></div>
      <?php
        while($row = mysqli_fetch_array($result)){
      ?>
      <div class="auction">
        <div class="picture">
          <img src="../images/<?php echo $row['image1']; ?>" alt="">
        </div>
        <div class="description">
          <table>
            <thead>
              <th>Decription</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Location</th>
              <th>Open Bid</th>
              <th>Status</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['startdate']; ?></td>
                <td><?php echo $row['enddate']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td>¢ <?php echo $row['startprice']; ?></td>
                <td><?php echo $row['buildingstatus']; ?></td>
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

      </div>
    <?php } ?>
      <div class="pagemation">
        <div class="page">
          <?php
            $pr_query = "select * from property p,auction a where verification = 'Verified' and a.propertyid = p.propertyid and soldstatus = 'Unsold' ";
            $pr_result = mysqli_query($conn, $pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_pages = ceil($total_record/$num_per_page);

            if($page>1){
              echo "<a href='home.php?page=".($page-1)."''><button><i class='fas fa-chevron-left'></i> Previous</button></a>";
            }

            for($i=1;$i<$total_pages;$i++){
              echo "<a href='home.php?page=".$i."''><button>$i</button></a>";
            }

            if($i>$page){
              echo "<a href='home.php?page=".($page+1)."''><button>Next <i class='fas fa-chevron-right'></i></button></a>";
            }
           ?>
        </div>
      </div>
  </body>
</html>
