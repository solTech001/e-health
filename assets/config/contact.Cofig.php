<?php
date_default_timezone_set("Africa/Lagos");
require "dbconnect.php";
include_once "../includes/session.php";

if (!isset($_POST['contact'])) {
    header("Location:../../index");
}
else {
    $fullname = $_POST['fname'];
    $email = $_POST['Email'];
    $message = $_POST['message'];
    $date_created = date("Y-m-d");

    $sql = "INSERT INTO contact (fullName,email, messages,date_created) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,'ssss', $fullname, $email,$message,$date_created);
    $execute = mysqli_execute($stmt);
    if (!$execute) {
        $_SESSION['errorMsg'] = "Opps! Something went wrong";
        header("Location:../../index");
     }
     else {
         $_SESSION['successMsg'] = "Thanks for contaction Us!";
         header("Location:../../index");
     }
}