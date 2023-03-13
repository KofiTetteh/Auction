<?php
include("../connection.php");
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }
  $num_per_page = 10;
  $start_from = ($page-1)*10;


  $query = "select * from property p, auction a where verification <> 'Verified' and p.propertyid <> a.propertyid limit $start_from,$num_per_page";
  $result = mysqli_query($conn, $query);
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
      <div class="search">
        <form class="" action="search.php" method="post">
          <h4>Search for Assets</h4>
          <input type="search" name="searchname" placeholder="Enter city">
          <input type="submit" name="search" value="Search">
        </form>
      </div>
      <h5>Add Auction</h5>
      <div class="clear"></div>
      <?php
        while($row = mysqli_fetch_array ($result)){
      ?>
      <div class="auction" style="height: 230px;">
        <div class="picture">
          <img src="../images/<?php echo $row['image1']; ?>" alt=""/>
        </div>
        <div class="description" >
          <table>
            <thead>
              <th>Decription</th>
              <th>Location</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Start Bid</th>
              <th>Sold Status</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <form class="" action="addauction.php" method="post">
                  <td> <input type="date" name="startdate"required>
                    <input type="text" name="propertyid" value="<?php echo $row['propertyid'] ?>" required hidden> </td>
                  <td> <input type="date" name="enddate"required> </td>
                  <td> <input type="number" name="startprice"required> </td>
                  <td> <select class="" name="soldstatus" style="padding: 10px;">
                    <option>Select Sold State</option>
                    <option>Sold</option>
                    <option>Unsold</option>
                  </select> </td>
              </tr>
            </tbody>
          </table>
          <br>
          <button type="submit" name="addauction"><i class="fas fa-save"></i> Add Auction</button>
        </form>
                </div>
        <div class="clear">
          <br>
        </div>
      <?php } ?>
      </div>
      <div class="pagemation">
              <div class="page">
                <?php
                  $pr_query = "select * from property limit $start_from,$num_per_page";
                  $pr_result = mysqli_query($conn, $pr_query);
                  $total_record = mysqli_num_rows($pr_result);

                  $total_pages = ceil($total_record/$num_per_page);

                  if($page>1){
                    echo "<a href='property.php?page=".($page-1)."''><button><i class='fas fa-chevron-left'></i> Previous</button></a>";
                  }

                  for($i=1;$i<$total_pages;$i++){
                    echo "<a href='property.php?page=".$i."''><button>$i</button></a>";
                  }

                  if($i>$page){
                    echo "<a href='property.php?page=".($page+1)."''><button>Next <i class='fas fa-chevron-right'></i></button></a>";
                  }
                 ?>
              </div>
            </div>

  </body>
</html>
<?php
include('../connection.php');

if(isset($_POST['addauction'])){
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];
  $startprice = $_POST['startprice'];
  $propertyid = $_POST['propertyid'];
  $username = $_SESSION['username'];
  $soldstatus = $_POST['soldstatus'];

  echo $query = "insert into auction (startdate,enddate,startprice,propertyid,username,soldstatus) values
  ('$startdate','$enddate','$startprice','$propertyid','$username','$soldstatus')";

  $result = mysqli_query($conn,$query);

  if($result){
    echo "<script>alert('Property added to auction'); window.location = 'auction.php'</script>";
  }else{
    echo "<script>alert('Property fail to add to auction'); window.location = 'addauction.php'</script>";
  }
}

 ?>
