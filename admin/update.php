<?php
include("../connection.php");
session_start();

  if(isset($_POST['updateproperty'])) {
    $description = $_POST['description'];
    $location = $_POST['location'];
    $buildingstatus = $_POST['buildingstatus'];
    $propertyid = $_POST['propertyid'];
    $verification = $_POST['verification'];

    $documents = $_FILES['documents']['name'];
    $picture1 = $_FILES['image1']['name'];
    $picture2 = $_FILES['image2']['name'];



    $move1 = move_uploaded_file($_FILES["image1"]["tmp_name"], "../images/" . $_FILES["image1"]["name"]);
    $move2 = move_uploaded_file($_FILES["image2"]["tmp_name"], "../images/" . $_FILES["image2"]["name"]);
    $move3 = move_uploaded_file($_FILES["documents"]["tmp_name"], "../documents/" . $_FILES["documents"]["name"]);


  $query = "update property set description = '$description' ,location = '$location' ,documents = '$documents',documentsname = '$documents'
            ,image1 = '$picture1',image1name = '$picture1',image2 = '$picture2',image2name = '$picture2',buildingstatus = '$buildingstatus'
            , verification = '$verification',dateuploaded = NOW() where propertyid = '$propertyid'";

  $result = mysqli_query($conn,$query);

  if($result){
    echo "<script>alert('You update property details successfully'); window.location = 'property.php'</script>";
  }else{
    echo "<script>alert('Your update failed'); window.location = 'editproperty.php?pid='.$propertyid.'</script>";
  }
}
?>

<?php
include("../connection.php");

  if(isset($_POST['updateowner'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $ownerid=  $_POST['ownerid'];

    $query = "update owner set firstname = '$firstname', lastname = '$lastname', address = '$address', phonenumber = '$phonenumber'
    where ownerid = '$ownerid'";
    $result = mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Owner details update account details successfully'); window.location = 'owners.php'</script>";
    }else{
      echo "<script>alert('Owner details  update failed'); window.location = 'owners.php'</script>";
    }
  }
?>

<?php
include("../connection.php");

  if(isset($_POST['updatebidder'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $bidderid=  $_POST['bidderid'];

    $query = "update bidder set firstname = '$firstname', lastname = '$lastname', address = '$address', phonenumber = '$phonenumber'
    where bidderid = '$bidderid'";
    $result = mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('Bidder details update account details successfully'); window.location = 'bidders.php'</script>";
    }else{
      echo "<script>alert('Bidder details  update failed'); window.location = 'bidders.php'</script>";
    }
  }
?>

<?php
include("../connection.php");

if(isset($_POST['updatepassword'])) {
  $password = $_POST['password'];
  $npassword = $_POST['npassword'];
  $cpassword = $_POST['cpassword'];

  $username= $_SESSION['username'];

  $npassword  = $cpassword;

  $password = base64_encode($password);
  if($_POST['password']){
    $passquery = "select password from users where username = '$username'";
    $passresult = mysqli_query($conn,$passquery);

    if(mysqli_num_rows($passresult) != 1){
      echo "<script>alert('Your current password is incorrect'); window.location = 'account.php'</script>";
    }else {
      if ($npassword != $cpassword) {
        echo "<script>alert('Your password do not match'); window.location = 'account.php'</script>";
      }else{
        $npassword = base64_encode($npassword);
        $query = "update users set password = '$npassword' where username = '$username'";
        $result = mysqli_query($conn,$query);

        if($result){
          echo "<script>alert('You update your password successfully'); window.location = 'account.php'</script>";
        }else{
          echo "<script>alert('Your password update failed'); window.location = 'account.php'</script>";
        }
      }
    }
  }
}
?>

<?php
include("../connection.php");

  if(isset($_POST['updatedetails'])) {
    $upusername = $_POST['username'];

    $username= $_SESSION['username'];

    $query = "update users set username = '$upusername' where username = '$username'";
    $result = mysqli_query($conn,$query);

    if($result){
    $_SESSION['username'] = $upusername;
      echo "<script>alert('You update account details successfully'); window.location = 'account.php'</script>";
    }else{
      echo "<script>alert('Your update failed'); window.location = 'account.php'</script>";
    }
  }
?>

<?php
include("../connection.php");

  if(isset($_POST['updateuser'])) {
    $upusername = $_POST['username'];
    $job = $_POST['job'];
    $usernameid = $_POST['usernameid'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if ($password != $cpassword) {
      echo "<script>alert('Password do not match'); window.location = 'users.php'</script>";
    }else {
      $password = base64_encode($password);
      $query = "update users set username = '$upusername', job = '$job', password = '$password' where username = '$usernameid'";
      $result = mysqli_query($conn,$query);

      if($result){
        echo "<script>alert('User update account details successfully'); window.location = 'users.php'</script>";
      }else{
        echo "<script>alert('User update failed'); window.location = 'users.php'</script>";
      }
    }
  }
?>

<?php
include("../connection.php");

  if(isset($_POST['updateauction'])) {
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $startprice = $_POST['startprice'];
    $soldstatus = $_POST['soldstatus'];
    $auctionid = $_POST['auctionid'];


      $query = "update auction set startdate = '$startdate', enddate = '$enddate', startprice = '$startprice', soldstatus = '$soldstatus'  where auctionid = '$auctionid'";
      $result = mysqli_query($conn,$query);

      if($result){
        echo "<script>alert('Auction update account details successfully'); window.location = 'auction.php'</script>";
      }else{
        echo "<script>alert('Auction update failed'); window.location = 'auction.php'</script>";
      }
    }
?>
