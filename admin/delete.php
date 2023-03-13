
<?php
session_start();
include("../connection.php");


 if(isset($_GET['pid'])){

$query= "delete from property where propertyid = '".$_GET['pid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Property deleted successfully'); window.location='property.php'</script>";
}else{
  echo "<script>alert('Property failed to delete'); window.location='property.php'</script>";
}
 }
?>



<?php

include("../connection.php");


 if(isset($_GET['pid'])){

$query= "delete from owner where ownerid = '".$_GET['oid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Owner deleted successfully'); window.location='owners.php'</script>";
}else{
  echo "<script>alert('Owner failed to delete'); window.location='owners.php'</script>";
}
 }
?>

<?php

include("../connection.php");


 if(isset($_GET['bid'])){

$query= "delete from bidder where bidderid = '".$_GET['bid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Bidder deleted successfully'); window.location='bidders.php'</script>";
}else{
  echo "<script>alert('Bidder failed to delete'); window.location='bidders.php'</script>";
}
 }
?>

<?php

include("../connection.php");


 if(isset($_GET['uid'])){

$query= "delete from users where username = '".$_GET['uid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Bidder deleted successfully'); window.location='users.php'</script>";
}else{
  echo "<script>alert('Bidder failed to delete'); window.location='users.php'</script>";
}
 }
?>


<?php

include("../connection.php");


 if(isset($_GET['aid'])){

$query= "delete from auction where auctionid = '".$_GET['aid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Auction deleted successfully'); window.location='auction.php'</script>";
}else{
  echo "<script>alert('Auction failed to delete'); window.location='auction.php'</script>";
}
 }
?>


<?php

include("../connection.php");


 if(isset($_GET['bbid'])){

$query= "delete from bid where bidid = '".$_GET['bbid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Bid deleted successfully'); window.location='bids.php'</script>";
}else{
  echo "<script>alert('Bid failed to delete'); window.location='bids.php'</script>";
}
 }
?>
