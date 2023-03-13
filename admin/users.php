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


  $query = "select * from users where job <> 'Administrator' limit $start_from,$num_per_page";
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
      <div class="search2">
        <form class="" action="searchowner.php" method="post">
          <h4>Search for Users</h4>
          <input type="search" name="searchname" placeholder="Enter city">
          <input type="submit" name="search" value="Search">
          <button type="button" name="button"> <a href="addusers.php">Add User <i class="fa fa-plus"> </i></a></button>
        </form>
      </div>
      <h5>Users</h5>
      <div class="clear"></div>
      <?php
        while($row = mysqli_fetch_array ($result)){
      ?>
      <div class="auction">
        <div class="description">
          <table>
            <thead>
              <th>Username</th>
              <th>Job</th>
              <th>Password</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['job']; ?></td>
                <td><?php echo  base64_decode($row['password']); ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <button type="button" name="button" class="red"><i class="fas fa-trash"></i><a href="delete.php?uid=<?php echo $row['username']; ?>"> Remove User </a></button>
          <button type="button" name="button"><i class="fas fa-edit"></i> <a href="editusers.php?uid=<?php echo $row['username']; ?>">Edit User</a></button>
                </div>
        <div class="clear">
          <br>
        </div>
      <?php } ?>
      </div>
      <div class="pagemation">
              <div class="page">
                <?php
                  $pr_query = "select * from owner limit $start_from,$num_per_page";
                  $pr_result = mysqli_query($conn, $pr_query);
                  $total_record = mysqli_num_rows($pr_result);

                  $total_pages = ceil($total_record/$num_per_page);

                  if($page>1){
                    echo "<a href='owner.php?page=".($page-1)."''><button><i class='fas fa-chevron-left'></i> Previous</button></a>";
                  }

                  for($i=1;$i<$total_pages;$i++){
                    echo "<a href='owner.php?page=".$i."''><button>$i</button></a>";
                  }

                  if($i>$page){
                    echo "<a href='owner.php?page=".($page+1)."''><button>Next <i class='fas fa-chevron-right'></i></button></a>";
                  }
                 ?>
              </div>
            </div>

  </body>
</html>
