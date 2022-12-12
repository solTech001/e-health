<?php
include_once "..\assets\includes\session.php";
require "..\assets\config\dbconnect.php";
// current user
$user =  $_SESSION['patient'];
isLogIn();
// var_dump($user);
$sql = "SELECT * FROM patient WHERE id = '$user' ";
$query = mysqli_query($dbconnect, $sql);
$userdata = mysqli_fetch_assoc($query);
// var_dump($userdata);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="..\assets\css\bootstrap5.min.css">
    <link rel="stylesheet" href="..\assets\lib\fontawsome\css\all.css">
    <link rel="stylesheet" href="..\assets\css\style.css">
</head>
<body>
  <section>
    <?php 
    include_once "..\assets\includes\dash_nav.php";
     //var_dump($userdata);
    ?>
  </section>
  <section>
    <h4 class ="text-center">Welcome <?php echo $userdata['Fname']." ".$userdata['Sname'];?>!</h4>
   <div class="container-fluid row text-center">
      <div class="col-sm-4">
          <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dashbaord
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Book Appointment</a></li>
          <li><a class="dropdown-item" href="#">Appointment History</a></li>
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
        </ul>
  </div>
      </div>
      <div class="col-sm-4 pt-4">
        <i class="fas fa-book d-block fs-3"></i>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-dark mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Book Appointment
          </button>
       <!-- <button class="btn btn-outline-dark mt-2">Book Appointment</button> -->
      </div>
      <div class="col-sm-4 pt-4">
      <i class="fa fa-puzzle-piece d-block fs-3"></i>
       <button class="btn btn-outline-dark mt-2">Appointment History</button>
      </div>
   </div>

  </section>

<section>
<!-- Modal -->

  <form action="..\assets\config\appointment_config.php" method="post">
  <?php //var_dump($userdata);?>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Book an Appointment</h1>
    
        <label class="form-label">Patient Number</label>
      <input type="text" value=" <?php echo $userdata['patient_id'];?>" name="patNum" class="form-control mb-3" readonly="true" required>
      <label class="form-label">Doctors</label>
      <select class ="form-control mb-3 " name="specialization">
                <option>Pediatrics</option>
                <option>Oncology</option>
                <option>Family medicine</option>
                <option>Neurology</option>
        </select> 
        <label class="form-label">Consultancy Fee:</label>
        <input type="text" Value ="1000"name = "fee" class ="form-control mb-3 " readonly>
        <label class="form-label">Date:</label>
        <input type="date" name ="date" class ="form-control mb-3 ">
        <label class="form-label">Time:</label>
        <input type="time" name ="time" class ="form-control mb-3 ">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name= "Appointment" class="btn btn-primary">Book Appointment</button>
      </div>
    </div>
  </div>
</div>
  </form>
</section>


<!-- table -->

<div class="table-responsive shadow">
<h4 class="text-center pt-5">
  Appointment History
  </h4>
<table class="table table-hover">
 
  <thead>
    <tr>
      <th scope="col">Pid</th>
      <th scope="col">specialist</th>
      <th scope="col">fee</th>
      <th scope="col">date</th>
      <th scope="col">time</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $preUser = $userdata['patient_id'];
      $sql = "SELECT * FROM appointment";
      $query = mysqli_query($dbconnect, $sql);
      $row = mysqli_fetch_assoc($query);
      while ($row = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
      <th scope="row"><?php echo $row["Pid"]; ?></th>
      <td><?php echo $row["specialist"]; ?></td>
      <td><?php echo $row["fee"]; ?></td>
      <td><?php echo $row["date_created"]; ?></td>
      <td><?php echo $row["time_created"]; ?></td>
    </tr>
    <?php 
      }
    ?>
  </tbody>
</table>
</div>









  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

