<?php

$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include("./dbconn.php");
  $username = $_POST["username"];
  $password = $_POST["password"];

  // $sql = "Select * from users where username = '$username' AND password='$password'";
  $sql = "SELECT * FROM `users` WHERE USERNAME = '$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
          if ($num == 1) {
            while($row=mysqli_fetch_assoc($result)){
              if(password_verify($password, $row['password'])){
                 echo 'Password matched';
                 $login = true;  
                 session_start();
                 $_SESSION['loggedin'] = true;
                 $_SESSION['username'] = $username;
                 header("location:welcome.php");
              }
              else{
                $showError = "wrong password";
              }
            }
          } 
          else {
    $showError = "Invalid Credentials";
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
  if ($login) {
    echo '<div class="alert alert-success text-center">You are logged in</div>';
  }
  if ($showError) {
    echo '<div class="alert alert-warning text-center"> ' . $showError . '</div>';
  }

  ?>
  <div class="container" style="width:30%;margin-top:10%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <h1 class="text-center">Login Here</h1>
    <hr>
    <div class="form-group">
      <form action="login.php" autocomplete="off" method="post">
        <input type="text" placeholder="Enter your username" id="username" name="username" class="form-control mt-3 shadow-none" required />
        <input type="password" autocomplete="password" id="password" name="password" placeholder="Enter your password" class="form-control mt-3 shadow-none" required />
        <button type="submit" class="btn btn-success mt-3 shadow-none mb-4"> Login</button>
      </form>
    </div>
  </div>
  <script src="./js/bootstrap.min.js"></script>
</body>

</html>