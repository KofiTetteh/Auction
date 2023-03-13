<link rel="icon" href="../images/Real_Estate_Auction_-512.png">
  <nav class="headerindex">
     <div class="logo">
       <h2>NAA <i class="fa fa-home"></i> <br>Auction<br> Limited</h2>
     </div>
     <div class="headlink">
       <ul>
         <li><a href="property.php">Unverified Assets</a></li>
         <li><a href="verifyproperty.php">Verified Assets</a></li>
         <li><a href="account.php">My Account</a></li>
         <li><a href="logout.php">Log Out</a></li>
       </ul>
     </div>
   </nav>
   <?php


if(empty($_SESSION['username'])){
  echo "<script>alert('Please log in'); window.location = 'index.php'</script>";
}
 ?>
