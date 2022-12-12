<?php
require "dbconnect.php";
include_once "../includes/session.php";

if (!isset($_POST['Update'])) {
    header("Location:logout"); 
}
else {
    $user =  $_SESSION['patient'];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    $sql= "UPDATE patient SET email = ? , phone = ? WHERE id = '$user' ";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$email,$phone);
    $execute = mysqli_stmt_execute($stmt);
    if (!$execute) {
        $_SESSION['error_msg'] = "Opps! Something went wrong";
        header("Location: ../../users/profile");
    }else{
        // $_SESSION['fullName'] = $fullName;
        $_SESSION['success_msg'] = "Update Successful!";
        header("Location: ../../users/profile");
    }
}