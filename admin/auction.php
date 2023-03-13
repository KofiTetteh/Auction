<?php
include("../connection.php");
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $num_per_page = 10;
  $start_from = ($page-1)*10;


  $query = "select * from property p, auction a where a.propertyid = p.propertyid limit $start_from,$num_per_page";
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
          <button type="button" name="button"> <a href="addauction.php">Add Auction <i class="fa fa-plus"> </i></a></button>
        </form>
      </div>
      <h5>Auctions</h5>
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
              <th>Start Bid</th>
              <th>Start Date</th>
              <th>End Date</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['buildingstatus']; ?></td>
                <td><?php echo $row['startprice']; ?></td>
                <td><?php echo $row['startdate']; ?></td>
                <td><?php echo $row['enddate']; ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="delete.php?aid=<?php echo $row['auctionid']; ?>"> Remove Auction </a></button>
          <button type="button" name="button"><i class="fas fa-edit"></i> <a href="editauction.php?aid=<?php echo $row['auctionid']; ?>">Edit Auction</a></button>
                </div>
        <div class="clear">
          <br>
        </div>
      <?php } ?>
      </div>
      <div class="pagemation">
              <div class="page">
                <?php
                  $pr_query = "select * from property limit $start_from,$num_per_page";
                  $pr_result = mysqli_query($conn, $pr_query);
                  $total_record = mysqli_num_rows($pr_result);

                  $total_pages = ceil($total_record/$num_per_page);

                  if($page>1){
                    echo "<a href='property.php?page=".($page-1)."''><button><i class='fas fa-chevron-left'></i> Previous</button></a>";
                  }

                  for($i=1;$i<$total_pages;$i++){
                    echo "<a href='property.php?page=".$i."''><button>$i</button></a>";
                  }

                  if($i>$page){
                    echo "<a href='property.php?page=".($page+1)."''><button>Next <i class='fas fa-chevron-right'></i></button></a>";
                  }
                 ?>
              </div>
            </div>

  </body>
</html>
