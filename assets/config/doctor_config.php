<?php
 require "dbconnect.php";
 include_once "../includes/session.php";
date_default_timezone_set("Africa/Lagos");

if (!isset($_POST['register'])) {
   header("Location:../../Admin/dashboard");
}
else {
    $d_id = 'EH'.rand(100,999);
    $FName = $_POST['fname'];
    $Email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $specialize = $_POST['specialization'];
    $gender = $_POST['gender'];
    $date = date('Y-m-d');
    $password = $_POST['pass'];
    $Compassword = $_POST['compass'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

      if (strlen($password) < 10) {
         header("Location:../../Admin/dashboard");
         $_SESSION['errorMsg'] = "password must be greater 10";
      }
      else {
         $sql = "INSERT INTO doctors (d_id, full_name, specialization , pass, email, gender,dob, phone, date_created) VALUES (?,?,?,?,?,?,?,?,?)";
         $stmt = mysqli_stmt_init($dbconnect);
         mysqli_stmt_prepare($stmt,$sql);
         mysqli_stmt_bind_param($stmt,'sssssssss', $d_id,$FName ,$specialize , $hash, $Email, $gender, $dob, $phone, $date);
         $execute = mysqli_execute($stmt);
      }
      if (!$execute) {
         $_SESSION['errorMsg'] = "Opps! Something went wrong";
         header("Location:../../Admin/dashboard");
      }
      else {
          $_SESSION['errorMsg'] = "Registration sucessful!";
          header("Location:../../Admin/dashboard");
          
         }
 }




  