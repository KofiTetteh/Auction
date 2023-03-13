
<?php
session_start();
include("../connection.php");


 if(isset($_GET['aid'])){
  $bidderid = $_SESSION['bidderid'];


$query= "delete from saved where bidderid = '$bidderid' and auctionid = '".$_GET['aid']."' ";
$result= mysqli_query ($conn,$query);
if($result){
	echo "<script>alert('Save Asset deleted successfully'); window.location='save.php'</script>";
}else{
  echo "<script>alert('Save Asset failed to delete'); window.location='save.php'</script>";
}
 }
?>
