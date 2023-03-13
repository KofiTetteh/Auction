<?php


include("../connection.php");
  if(isset($_POST['signup'])) {
    $username = $_POST['username'];
    $job = $_POST['job'];
    $password = $_POST['password'];
$cpassword = $_POST['cpassword'];

   //password code lines//
   $password = $cpassword;

   if($_POST['password'] != $_POST['cpassword']){
     echo "<script>alert('Password do not match'); window.location = 'addusers.php'</script>";
   }else{
     $password = base64_encode($password);
  $query = "insert into users (username,password,job) values ('$username','$password','$job')";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script>alert('User added successfully'); window.location = 'users.php'</script>";
  }else{
    echo "<script>alert('User failed to add. Please try again'); window.location = 'addusers.php'</script>";
  }
}
}
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
      <div class="clear"></div>
        <div class="form-div-signup">
          <form class="" action="addusers.php" method="post" enctype="multipart/form-data">
            <h3>Add Users</h3>
              <p>Username<br>
              <input type="text" name="username" placeholder="Enter Username " required></p>
              <p>Job<br>
                <input type="text" name="job" placeholder="Enter Job" required></p>
                <p>Password<br>
                <input type="password" name="password" placeholder="Enter password" minlength="8" required></p>
                            <p>Confirm Password<br>
              <input type="password" name="cpassword" placeholder="Enter confirm password" minlength="8" required></p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <input type="submit" name="signup" value="Add Owner"> </p>
          </form>
        </div>
  </body>
</html>
