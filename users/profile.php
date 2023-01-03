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
    <link rel="shortcut icon" href="..\assets\img\pngwing.com.png">
</head>
<body>

<form action="..\assets\config\profile_update.php" method="post" class="card mx-auto mt-5 shadow p-2" style="max-width:600px;">
                <h2 class = "text-center bg-primary p-2 text-light"><?php echo $userdata["Fname"]." ".$userdata["Sname"];?></h2>
                <input type="text" value ="<?php echo $userdata["Fname"]." ".$userdata["Sname"];?>" class ="form-control mb-3 " placeholder="Full Name" disabled = "true" required>
                <input type="text"  name = "email" value ="<?php echo $userdata["Email"];?>" class ="form-control mb-3 " placeholder="Email"  required>
                <input type="text" value ="<?php echo $userdata["dob"];?>" onfocus ="this.type='date'" class ="form-control mb-3 " placeholder="Date of birth" disabled = "true" required> 
                <input type="tel" name ="phone" value ="<?php echo $userdata["phone"];?>" class ="form-control mb-3 "  placeholder="Phone" required>
              
                <select selected class ="form-control mb-3 " name="gender" value ="<?php echo $userdata["gender"]; ?>" disabled = "true" required>
                <!-- <option >____</option> -->
                <option>Male</option>
                <option>Female</option>
                </select>

      <input type="submit" name = "Update" Value = "Update" class="btn btn-dark mb-3"> 
      </form>
        </div>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>