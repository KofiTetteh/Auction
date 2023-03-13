<?php
session_start();
include("../connection.php");

$ownerid = $_SESSION['ownerid'];

  if(isset($_POST['addproperty'])) {
    $description = $_POST['description'];
    $location = $_POST['location'];
    $ownerid = $_POST['ownerid'];
    $buildingstatus = $_POST['buildingstatus'];

    $documents = $_FILES['documents']['name'];
    $picture1 = $_FILES['image1']['name'];
    $picture2 = $_FILES['image2']['name'];



    $move1 = move_uploaded_file($_FILES["image1"]["tmp_name"], "../images/" . $_FILES["image1"]["name"]);
    $move2 = move_uploaded_file($_FILES["image2"]["tmp_name"], "../images/" . $_FILES["image2"]["name"]);
    $move3 = move_uploaded_file($_FILES["documents"]["tmp_name"], "../documents/" . $_FILES["documents"]["name"]);


  $query = "insert into property (description,location,documents,documentsname,image1,image1name,image2,image2name,buildingstatus,dateuploaded,verification,ownerid) values
            ('$description','$location','$documents','$documents','$picture1','$picture1','$picture2','$picture2','$buildingstatus',NOW(),'Pending','$ownerid')";
          echo $query;
  $result = mysqli_query($conn,$query);

  if($result){
    echo "<script>alert('You added a property successfully'); window.location = 'property.php'</script>";
  }else{
    echo "<script>alert('Your property upload failed'); window.location = 'addproperty.php'</script>";

  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/include.css">
    <link rel="stylesheet" href="css/maincss.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <script defer src="css/all.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>NAA Auction Limited</title>
  </head>
  <body>
      <?php include('includes/header.php'); ?>
      <div class="clear"></div><br>
        <div class="form-div-signup">
          <form class="" action="addproperty.php" method="post" enctype="multipart/form-data">
            <h3>Add Property</h3>
              <p>Description<br>
              <textarea name="description" rows="3" cols="28" placeholder="Enter property description"required></textarea> </p>
              <p>Owner ID<br>
                <input type="text" name="ownerid" placeholder="Enter owner ID" required></p>
                <p>Location<br>
                  <input type="text" name="location" placeholder="Enter location " required></p>
              <p>Property Documents<br>
              <input type="file" name="documents" required></p>
              <p>Property Picture <br>
                <input type="file" name="image1"  required></p>
                <p>Property Status<br>
                    <select class="" name="buildingstatus" required>
                      <option selected>Select Building Status</option>
                      <option>New</option>
                      <option>Old</option>
                      <option>Renovated</option>
                    </select></p>
              <p>Property Picture 2<br>
                <input type="file" name="image2"  required></p>
                <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <br> <br> </p>
              <p> <input type="submit" name="addproperty" value="Add Property"> </p>
          </form>
        </div>
  </body>
</html>
