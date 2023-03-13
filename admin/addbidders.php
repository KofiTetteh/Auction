<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include("../connection.php");
  if(isset($_POST['signup'])) {
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $email = $_POST['email'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $address = $_POST['address'];
   $phonenumber = $_POST['phonenumber'];

   //password code lines//
   $password = $cpassword;
   $password = base64_encode($password);
   if($_POST['password'] != $_POST['cpassword']){
     echo "<script>alert('Password do not match'); window.location = 'bidders.php'</script>";
   }else{
  $query = "insert into bidder (firstname,lastname,email,phonenumber,password,address) values
            ('$firstname','$lastname','$email','$phonenumber','$password','$address')";
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
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

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
    echo "<script>alert('Bidder registered successfully, $firstname Please check email to verify credentials'); window.location = 'bidders.php'</script>";
  }else{
    echo "<script>alert('Bidder registration failed. Please try again'); window.location = 'bidders.php'</script>";
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
          <form class="" action="sellers.php" method="post" enctype="multipart/form-data">
            <h3>Add Bidder</h3>
              <p>First Name<br>
              <input type="text" name="firstname" placeholder="Enter First Name " required></p>
              <p>Last Name<br>
                <input type="text" name="lastname" placeholder="Enter Last Name " required></p>
              <p>Email<br>
              <input type="email" name="email" placeholder="Enter email " required></p>
              <p>Address<br>
                <input type="text" name="address" placeholder="Enter Address" required></p>
                <p>Password<br>
                <input type="password" name="password" placeholder="Enter password" minlength="8" required></p>
              <p>Phone Number<br>
                  <input type="phonenumber" name="phonenumber" placeholder="Enter Phone Number" minlength="10" required></p>
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
