<?php
session_start();
include("../connection.php");

  if(isset($_POST['updatedetails'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];

    $bidderid= $_SESSION['bidderid'];

    $query = "update bidder set firstname = '$firstname', lastname = '$lastname', address = '$address', phonenumber = '$phonenumber'
    where bidderid = '$bidderid'";
    $result = mysqli_query($conn,$query);

    if($result){
      echo "<script>alert('You update account details successfully'); window.location = 'account.php'</script>";
    }else{
      echo "<script>alert('Your update failed'); window.location = 'account.php'</script>";
    }
  }
?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include("../connection.php");

  if(isset($_POST['updateemail'])) {
    $nemail = $_POST['nemail'];
    $cemail = $_POST['cemail'];

    $bidderid= $_SESSION['bidderid'];
    $firstname= $_SESSION['firstname'];
    $email= $_SESSION['email'];

    $nemail = $cemail;

    if($nemail != $cemail){
      echo "<script>alert('Email do not match'); window.location = 'account.php'</script>";
    }else{

    $query = "update owner set email = '$nemail' where bidderid = '$bidderid'";
    $result = mysqli_query($conn,$query);

    if($result){
      require '../PHPMailer/src/Exception.php';
      require '../PHPMailer/src/PHPMailer.php';
      require '../PHPMailer/src/SMTP.php';
      // Load Composer's autoloader
      //require 'vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = 0;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'naaauctionltd@gmail.com';                     // SMTP username
          $mail->Password   = 'niiamarh0101';                               // SMTP password
          $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 465;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('naaauctionltd@gmail.com', 'NAA Auction Limited');
          $mail->addAddress($email, $firstname);     // Add a recipient


          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'NAA Auction Limited';
          $mail->Body    = '<h1>Your Email Changed</h1>
                            <p>Your email was change to '.$nemail.'</p>';


          $mail->send();

      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      echo "<script>alert('You update account details successfully'); window.location = 'account.php'</script>";
    }else{
      echo "<script>alert('Your update failed'); window.location = 'account.php'</script>";
    }
  }
}
?>


<?php
include("../connection.php");

if(isset($_POST['updatepassword'])) {
  $password = $_POST['password'];
  $npassword = $_POST['npassword'];
  $cpassword = $_POST['cpassword'];

  $bidderid= $_SESSION['bidderid'];

  $npassword  = $cpassword;

  $password = base64_encode($password);
  if($_POST['password']){
    $passquery = "select password from owner where bidderid = '$bidderid'";
    $passresult = mysqli_query($conn,$passquery);

    if(mysqli_num_rows($passresult) != 1){
      echo "<script>alert('Your current password is incorrect'); window.location = 'account.php'</script>";
    }else {
      if ($npassword != $cpassword) {
        echo "<script>alert('Your password do not match'); window.location = 'account.php'</script>";
      }else{
        $query = "update owner set password = '$npassword' where ownerid = '$ownerid'";
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
