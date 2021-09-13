<?php
$username = "root";
$password = "";
$servername = "localhost";
$database = "users1234";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
  echo "Connection failed " .die("error" .mysqli_connect_error());
}

?>