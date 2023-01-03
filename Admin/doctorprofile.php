<?php
require_once "..\assets\includes\session.php";
require "..\assets\config\dbconnect.php";
$user = $_GET["update"];
$sql = "SELECT * FROM doctors WHERE id = '$user'";
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
    <link rel="stylesheet" href="../assets\css\bootstrap5.min.css">
    <link rel="shortcut icon" href="../assets\img\pngwing.com.png">
</head>
<body>
    

      <form action="..\assets\config\doctor_Update.php" method="post" class="card mx-auto mt-5 shadow p-2" style="max-width:600px;">
             <h3 class="text-center">Doctor Profile</h3>
                <input type="text" name ="fname" class ="form-control mb-3 " value = "<?php echo $userData["full_name"] ?>" placeholder="Full Name" readonly>
                <input type="text" name ="Doctor ID" class ="form-control mb-3" value = "<?php echo $userData["d_id"] ?>" placeholder="Doctor ID" readonly>
                <input type="text" name ="email" class ="form-control mb-3 "  value = "<?php echo $userData["email"] ?>" placeholder="Email">
                <input type="text" name ="dob" onfocus ="this.type='date'"  value = "<?php echo $userData["dob"] ?>" class ="form-control mb-3 " placeholder="Date of birth" readonly> 
                <input type="tel" name ="phone" class ="form-control mb-3 "  value = "<?php echo $userData["phone"] ?>"  placeholder="Phone">
                <select class ="form-control mb-3 "  value = "<?php echo $userData["specialization"] ?>" name="specialization">
                <option>Pediatrics</option>
                <option>Oncology</option>
                <option>Family medicine</option>
                <option>Neurology</option>
                </select>
                 <!-- <div class update= "col-12 d-flex gap-5">
                    <input type="password" name ="pass" class ="form-control mb-3 " placeholder="Password">
                    <input type="password" name ="compass" class ="form-control mb-3 " placeholder="Confirm Password">
                </div> -->
                <select class ="form-control mb-3 " value = "<?php echo $userData["gender"] ?>" name="gender" disabled>
                <option>Male</option>
                <option>Female</option>
                </select>
      </div>
      <input type="submit" name = "" Value = "update" class="btn btn-dark mb-3"> 
      </form>

<script src="..\assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>