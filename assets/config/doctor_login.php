<?php
require "dbconnect.php";
include_once "../includes/session.php";

 if (!isset($_POST['login_doctor'])) {
    header("Location:../../index");
 }
 else {
    $Email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM doctors WHERE email = ?";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"s",$Email);
    $execute = mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $numRow =  mysqli_num_rows($result);

   if($numRow < 1){
      header("Location:../../login"); 
      $_SESSION['errorMsg'] = "invaild Email!";
  }
  else {      
   $row = mysqli_fetch_assoc($result);
   $returnpassword = ($row['pass']);
      if (!password_verify($password, $returnpassword)) {
         header("Location:../../login"); 
         $_SESSION['errorMsg'] = "password incorrect!";  
      }
      else {
         $_SESSION['doctor'] = $row['id'];
         header("Location:../../doctor/dashbord");
      }
   }
 }