<?php
include("../connection.php");
session_start();

if (isset($_POST['updateverify'])) {
  $propertyid = $_POST['propertyid'];
  $verification = $_POST['verification'];

  $query = "update property set verification = '$verification' where propertyid = '$propertyid'";
  $result = mysqli_query($conn,$query);

  if($result){
    echo "<script>alert('Verification updated successfully'); window.location = 'property.php'</script>";
  }else{
    echo "<script>alert('Verification updated update failed'); window.location = 'property.php'</script>";
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
