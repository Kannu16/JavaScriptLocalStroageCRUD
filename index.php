<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("./dbconn.php");
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exists = false;

  //Checking whether this username exists
  $existSql = "SELECT * FROM `users` WHERE USERNAME = '$username'" ;
  $result = mysqli_query($conn , $existSql);
  $numExistsRows = mysqli_num_rows($result);

  if($numExistsRows>0){
    //$exists = true
    $showError = "username already exists";
  }
  else{
      // $exists = false;
      if (($password == $cpassword)) {
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users`(`username`, `password`, `date`) VALUES ('$username' , '$hash' , current_timestamp())";

          $result = mysqli_query($conn, $sql);

          if ($result) {
              $showAlert = true;
          }
      } else {
          $showError = "Password do not match";
      }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/calendar.css">
  <title>MyCalendar</title>
</head>

<body>
  <?php require("./partials/_nav.php") ?>
  <?php
  if($showAlert){
    echo '<div class="alert alert-success text-center">Your account is created Successfully</div>';
  }
  if($showError){
    echo '<div class="alert alert-warning text-center"> '.$showError.'</div>';
  }

  ?>
  <div class="container" style="width:30%;margin-top:10%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <h1 class="text-center">Signup here</h1>
    <hr>
    <div class="form-group">
      <form action="index.php" autocomplete="off" method="post">
        <input type="text" placeholder="Enter your username" id="username" name="username" class="form-control mt-3 shadow-none" required />
        <input type="password" autocomplete="password" id="password" name="password" placeholder="Enter your password" class="form-control mt-3 shadow-none" required />
        <input type="password" autocomplete="new password" id="cpassword" name="cpassword" placeholder="Enter your Confirm Password" class="form-control mt-3 shadow-none" require />
        <button type="submit" class="btn btn-success mt-3 shadow-none mb-4">Submit</button>
      </form>
    </div>
  </div>


  <script src="./js/bootstrap.min.js"></script>
</body>

</html>
