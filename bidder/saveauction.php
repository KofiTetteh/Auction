<?php
session_start();
include("../connection.php");

          if(isset($_GET['aid'])){
          $getid = $_GET['aid'];
          $bidderid = $_SESSION['bidderid'];

          $query = "insert into saved (auctionid,bidderid) values ('$getid','$bidderid')";
          $result = mysqli_query($conn,$query);

          if($result){
            echo "<script>alert('Asset saved successfully'); window.location = 'save.php'</script>";
          }else{
            echo "<script>alert('Asset fail to save'); window.location = 'home.php'</script>";
          }
        }
?>
