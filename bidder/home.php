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


  $query = "select * from property p,auction a where verification = 'Verified' and a.propertyid = p.propertyid and soldstatus = 'Unsold' limit $start_from,$num_per_page";
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
      <h5>Auctions</h5>
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
              <th style="width:150px;">Decription</th>
              <th style="width:120px;">Start Date</th>
              <th style="width:120px;">End Date</th>
              <th style="width:120px;">Location</th>
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
          <button type="button" name="button"><i class="fas fa-eye"></i> <a href="view.php?aid=<?php echo $row['auctionid']; ?>">View Asset</a> </button>
          <?php
          include("../connection.php");
          $bidderid = $_SESSION['bidderid'];
          $datequery = "select * from property p, auction a, saved s, bidder b where p.propertyid = a.propertyid and s.auctionid = a.auctionid and
          s.bidderid = s.bidderid and b.bidderid = '$bidderid' ";
          $dateresult = mysqli_query($conn,$datequery);
          $daterow = mysqli_fetch_array($dateresult);
          $auctionid = $daterow['auctionid'];
          if($auctionid){
            echo '<button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="delete.php?aid='.$auctionid.'"> Remove Assest </a></button>';
          }else{
            $sql = "select * from auction a, property p where verification = 'Verified'";
            $r = mysqli_query($conn,$sql);
            $r = mysqli_fetch_array($r);
            $auctionidr = $r['auctionid'];
            if($auctionidr){
            echo '<button type="button" name="button"><i class="fas fa-save"></i> <a href="saveauction.php?aid='.$auctionidr.'">Save Asset</a></button>';
          }else{

          }
          }
           ?>
          <button type="button" name="button"><i class="fas fa-money-bill"></i> <a href="addbid.php?aid=<?php echo $row['auctionid']; ?>">Bid Asset</a></button>
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
