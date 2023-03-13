
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
session_start();
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
