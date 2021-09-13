<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:login.php");
  exit;
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/calendar.css" />
  <link rel="stylesheet" type="text/css" href="./css/evo-calendar.css" />
  <link rel="stylesheet" type="text/css" href="./css/evo-calendar.orange-coral.css" />
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <title>My Calendar</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top my-nav">
    <div class="container-fluid ps-5">
      <a class="navbar-brand" href="#">MyCalendar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto pr-5 align-items-baseline">
          <li class="nav-item">
            <a class="nav-link active text-uppercase" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Add Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-uppercase" aria-current="page" href="#tblList">View all Events</a>
          </li>
          <li class="nav-item">
            <h5 class="nav-link active">Welcome, <span class="ps-1 fs-3"><?php echo $_SESSION['username'] ?></span></h5>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-flex " aria-current="page" href="./logout.php"> <button class="btn btn-warning">Logout</button> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-hero-container">
    <div class="my-container">
      <h4 class="text-center text-success my-3">Hey, <span class="fs-2 text-info"><?php echo $_SESSION['username'] ?></span> Write Your Every Moment On Me
      </h4>

      <div id="calendar"></div>
      <div class="text-center">

        <h3 class="text-center my-3">Your All Events</h3>
        <hr>
        <table id="tblList" class="GeneratedTable">
          <thead>
            <tr>
              <td>S.no</td>
              <td>Event name</td>
              <td>Event date</td>
              <td>Event description</td>
              <td>Event type</td>
              <td>Event color</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody id="eventList">
            <div id="msg" class="text-center"></div>
          </tbody>
        </table>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel"> <i class="fab fa-meetup" aria-hidden="true"></i>
              Add a New Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form onsubmit="event.preventDefault();Add()">
              <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" class="form-control shadow-none" id="name" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Event Date</label>
                <input type="date" class="form-control shadow-none" id="date" required>
              </div>

              <div class="mb-3">
                <label for="Description" class="form-label">Event Description</label>
                <textarea class="form-control shadow-none" id="description" cols="30" rows="5" style="resize: none;" required></textarea>
              </div>

              <div class="mb-3">
                <label for="Type" class="form-label">Event Type</label>
                <input type="text" class="form-control shadow-none" id="type" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                <label for="Color" class="form-label">Event indication Color</label>
                <input type="color" class="form-control shadow-none form-control-color" id="color" required>
              </div>
              <input type="submit" class="btn btn-success shadow-none" value="Add" id="submit-update" style="width: 100%;" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./js/jquery.min.js"></script>
  <script src="./js/evo-calendar.js"></script>
  <script src="./js/index.js"></script>
  <script src="./js/all.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>

</html>