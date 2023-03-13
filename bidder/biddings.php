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

      <div class="clear"></div>
        <h5>My Biddings </h5>
        <?php

        include("../connection.php");
        $bidderid = $_SESSION['bidderid'];

                  $query = "select * from property p, auction a,bid b where a.auctionid = b.auctionid and a.propertyid = p.propertyid and b.bidderid = '$bidderid'";
                  $result = mysqli_query($conn,$query);


                 ?>
<?php  while($row = mysqli_fetch_array($result)){ ?>
      <div class="auction">
        <div class="description">
          <table>
            <thead>
              <th>Decription</th>
              <th>Location</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Open Bid</th>
              <th>Status</th>
              <th>Date Uploaded</th>
              <th>Bid Amount</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['startdate']; ?></td>
                <td><?php echo $row['enddate']; ?></td>
                <td>¢ <?php echo $row['startprice']; ?></td>
                <td><?php echo $row['buildingstatus']; ?></td>
                <td><?php echo $row['dateuploaded']; ?></td>
                <form class="" action="biddings.php" method="post">
                  <td> <input type="number" min="<?php echo $row['amount']; ?>" name="amount" value="<?php echo $row['amount']; ?>" required>
                    <input type="number" name="bidid" value="<?php echo $row['bidid'] ?>" hidden>
                   </td>
              </tr>
            </tbody>
          </table>
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
          <button type="submit" name="upbid"><i class="fas fa-save"></i> Bid Asset</a></button>
          </form>
        </div>
      </div>
      <?php } ?>
  </body>
</html>
<?php
include("../connection.php");
if(isset($_POST['upbid'])){
  $amount = $_POST['amount'];
  $bidid = $_POST['bidid'];


$query = "update bid set amount = '$amount' where bidid = $bidid";
$result = mysqli_query($conn,$query);

if($result){
  echo "<script>alert('Bid updated successfully'); window.location = 'biddings.php'</script>";
}else{
  echo "<script>alert('Bid update failed'); window.location = 'biddings.php'</script>";

}
}
 ?>
