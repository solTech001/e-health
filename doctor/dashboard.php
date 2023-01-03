<?php

 require_once "..\assets\includes\session.php";
 require "..\assets\config\dbconnect.php";
 //current doctor
 isLogIn();
$pet = $_SESSION['doctor'];
 $sql = "SELECT * FROM doctors WHERE id = '$pet'";
 $query = mysqli_query($dbconnect, $sql);
$userData = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="..\assets\css\bootstrap5.min.css">
    <link rel="stylesheet" href="..\assets\lib\fontawsome\css\all.css">
    <link rel="stylesheet" href="..\assets\css\style.css">
    <link rel="shortcut icon" href="..\..\assets\img\pngwing.com.png">

    <?php
    require_once "..\assets\includes\doctorDash.php"
    
    ?>
    <?php
    echo successMsg();
    ?>
   
    <!-- <div class = " container d-flex align-items-start justify-content-start pt-4">
               <div class="dropdown">
                <button class="btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dashbaord
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Appointment</a></li>
                </ul>
            </div>
    </div> -->

    

    <div class="container shadow">
    <div class="table-responsive mt-5">
      <h3 class = "text-center">Welcome to <?php echo $userData ['specialization'] ?> Desk </h3>
      <h5 class = "text-center">Appointment Book</h5>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">specialist</th>
      <th scope="col">date</th>
      <th scope="col">time</th>
    

    </tr>
  </thead>
  <tbody>
  <?php
      $pat = $userData ["specialization"];
      $sql = "SELECT * FROM appointment Where specialist = '$pat' ";
      $query = mysqli_query($dbconnect,$sql);
    //  $row = mysqli_fetch_assoc($query) ;
      //var_dump($row);
      while($row = mysqli_fetch_assoc($query)){
    ?>  
    <tr>
      <th scope="row"><?php echo $row['Pid']; ?></th>
      <td><?php echo $row['specialist']; ?></td>
      <!-- <td><?php echo $row['fee']; ?></td> -->
      <td><?php echo $row['date_created']; ?></td> 
      <td><?php echo $row['time_created']; ?></td> 
      <td>
        <?php 
        if ($row['d_status'] == '0') {
          echo "Active";
        }
        elseif ($row['d_status'] == '1') {
          echo "Canceled by patient";
        }
        else {
          echo "Canceled by Doctor";
        }; ?>
      </td> 
      <td> <a href="../assets\config\appointment_config.php?Can=<?php echo $row['id']; ?>" class="btn btn-danger <?php echo ($row['d_status'] > '0')?'d-none':''; ?> ">Cancel</a></a>
            </a></td>
      
    </tr>
    </tbody>
 <?php
       }
 ?>
</table>
    </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

