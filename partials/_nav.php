
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true ){
  $loggedin = true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-light my-nav">
<div class="container-fluid">
  <a class="navbar-brand" href="./index.php"> MyCalendar </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">';
   if(!$loggedin){
    echo' <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./login.php">Login</a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./index.php">Signup</a>
  </li>';

   }
   if($loggedin){
    echo'<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./logout.php">Logout</a>
  </li>';
   }
echo'
 </ul>
</div>
</div>
</nav>';

?>