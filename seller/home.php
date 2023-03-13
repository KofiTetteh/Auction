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

  $ownerid = $_SESSION['ownerid'];

  $query = "select * from property p,auction a,owner o where o.ownerid = '$ownerid' and
   verification = 'Verified' and a.propertyid = p.propertyid and o.ownerid = p.ownerid limit $start_from,$num_per_page";
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
      <div class="search">
        <form class="" action="search.php" method="post">
          <h4>Search for Assets</h4>
          <input type="search" name="searchname" placeholder="Enter city">
          <input type="submit" name="search" value="Search">
        </form>
      </div>
      <h5>My Auctions</h5>
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
            echo '<button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="delete.php?pid='.$propertyid.'"> Remove Property </a></button>';
            echo '<button type="button" name="button"><i class="fas fa-edit"></i> <a href="editproperty.php?pid='.$propertyid.'">Edit Property</a></button>';
          }
           ?>
      </div>
      <?php } ?>
      <div class="pagemation">
        <div class="page">
          <?php
            $pr_query = "select * from property p,auction a,owner o where o.ownerid = '$ownerid' and
             verification = 'Verified' and a.propertyid = p.propertyid and o.ownerid = p.ownerid ";
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
