<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
include("../connection.php");
 if (isset($_POST['reset'])) {
   $email = $_POST['email'];
   $firstname = $_POST['firstname'];

   $query = "select *from owner where email = '$email' and firstname = '$firstname'";
   $result = mysqli_query($conn, $query);

   if($row = mysqli_fetch_array($result)){

     $_SESSION['firstname'] = $row['firstname'];
     $_SESSION['lastname'] = $row['lastname'];
     $_SESSION['email'] = $row['email'];
     $_SESSION['ownerid'] = $row['ownerid'];
     $_SESSION['password'] = $row['password'];

     $password =  $_SESSION['password'];

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
         $mail->Body    = '<h1>Your Credentials</h1>
         <p>Email : '.$email.'</p><p>Password : '.base64_decode($password).'<br>Click to verify and login http://localhost/auction/bidder/verify.php</p>';
         //$mail->AltBody = 'mmtesting my own mails';

         $mail->send();

     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }

     $sessionfirstname = $_SESSION['firstname'];

     echo "<script>alert('Hello $sessionfirstname, you have log in successfully'); window.location = 'index.php'</script>";
   }else{
     echo "<script>alert('Email and Password do not match'); window.location = 'reset.php'</script>";
   }
 }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/include.css">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>NAA Auction Limited</title>
  </head>
  <body>
      <?php include('includes/headerindex.php'); ?>
      <div class="clear"></div>
        <div class="form-div">
          <form class="" action="reset.php" method="post" enctype="multipart/form-data">
            <h3 id="reseth3">Reset Password</h3>
            <p>First Name<br>
            <input type="text" name="firstname" placeholder="Enter First Name" required></p>
            <p>Email<br>
              <input type="email" name="email" placeholder="Enter email " required></p>
              <p> <input type="submit" name="reset" value="Reset Password"> </p>
              <p><a href="signup.php">Create a new account</a>.</p>
              <p><a href="index.php">Already have an account</a> </p>
          </form>
        </div>
  </body>
</html>
