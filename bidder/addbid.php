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
      session_start();
      include("../connection.php");

                if(isset($_GET['aid'])){
                $getid = $_GET['aid'];

                $query = "select * from property p, auction a where a.auctionid ='$getid' and a.propertyid = p.propertyid";
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
                <form class="" action="addbid.php" method="post">
                  <td> <input type="number" min="<?php echo $row['startprice']; ?>" name="amount" placeholder="Enter bid amount" required>
                    <input type="number" name="auctionid" value="<?php echo $row['auctionid'] ?>" hidden>
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
          <button type="submit" name="bid"><i class="fas fa-save"></i> Bid Asset</a></button>
          </form>
        </div>
      </div>
      <?php } ?>
  </body>
</html>
<?php
include("../connection.php");
if(isset($_POST['bid'])){
  $amount = $_POST['amount'];
  $auctionid = $_POST['auctionid'];
  $bidderid = $_SESSION['bidderid'];

$query = "insert into bid(amount,auctionid,bidderid) values ('$amount','$auctionid','$bidderid')";
$result = mysqli_query($conn,$query);

if($result){
  echo "<script>alert('Bid placed successfully'); window.location = 'biddings.php'</script>";
}else{
  echo "<script>alert('Bid failed to place'); window.location = 'biddings.php'</script>";

}
}
 ?>
