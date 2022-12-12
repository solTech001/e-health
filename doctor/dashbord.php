<?php

 require_once "..\assets\includes\session.php";
 require "..\assets\config\dbconnect.php";
 //current doctor
 isLogIn();
$pet = $_SESSION['doctor'];
 $sql = "SELECT * FROM doctors WHERE id = '$pet'";
 $query = mysqli_query($dbconnect, $sql);
$userData = mysqli_fetch_assoc($query);
//var_dump($userData);
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

    <?php
    require_once "..\assets\includes\dash_nav.php"
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

    <div class="table-responsive shadow mt-5">
      <h4 class = "text-center">Appointment Book</h4>
    <table class="table">
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
      $sql = "SELECT * FROM appointment Where specialist = '$pat'";
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
      <!-- <td> <a href="..\assets\config\delete_control.php?del=<?php echo $userData['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete <?php echo strtoupper($userData['Sname']); ?> account?')"><i class="fa fa-trash"></i>
        </a></td>  -->
      
    </tr>
    </tbody>
 <?php
       }
 ?>
</table>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

