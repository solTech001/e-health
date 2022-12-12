<?php
 require "dbconnect.php";
 include_once "../includes/session.php";
date_default_timezone_set("Africa/Lagos");

if (!isset($_POST['register'])) {
   header("Location:../../register");
}
else {
    $pid = 'EH'.rand(100000,999999);
    $FName = $_POST['fname'];
    $SName= $_POST['sname'];
    $Email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $con_password = $_POST['compass'];
    $gender = $_POST['gender'];
    $date = date('Y-m-d');
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $role = 'patient';
 }
if (strlen($pass) < 10) {
    header("Location:../../register");
    $_SESSION['errorMsg'] = "password must be greater 10";
}
elseif ($pass != $con_password ) {
    header("Location:../../register");
    $_SESSION['errorMsg'] = "password not match!";
}
else{
    $sql = "INSERT INTO patient (patient_id, Sname, Fname , Email, dob, phone, pass, gender,user_role, date_created) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,'ssssssssss', $pid,$SName ,$FName , $Email, $dob, $phone, $hash, $gender, $role, $date);
    $execute = mysqli_execute($stmt);
    if (!$execute) {
       $_SESSION['errorMsg'] = "Opps! Something went wrong";
       header("Location:../../register.php");
    }
    else {
        $_SESSION['errorMsg'] = "Registration sucessful!";
        header("Location:../../login"); 
    }
}

