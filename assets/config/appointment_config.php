<?php
require "dbconnect.php";
include_once "../includes/session.php";
date_default_timezone_set("Africa/Lagos");
if (!isset($_POST['Appointment'])) {
    header("Location:../../users/dashboard");
}
else {
    $specialist = $_POST['specialization'];
    $patient = $_POST['patNum'];
    $date = $_POST['date'];
    $time_created = $_POST['time'];
    $constantant = $_POST['fee'];

    $sql = "INSERT INTO appointment (Pid,specialist, fee, date_created, time_created) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,'sssss', $patient, $specialist,$date,$constantant,$time_created);
    $execute = mysqli_execute($stmt);
    if (!$execute) {
        $_SESSION['errorMsg'] = "Opps! Something went wrong";
        header("Location:../../users/dashboard");
     }
     else {
        header("Location:../../users/dashboard"); 
         $_SESSION['successMsg'] = "Appointment sucessful book!";
     }
}
