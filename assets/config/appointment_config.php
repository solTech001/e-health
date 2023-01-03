<?php
require "dbconnect.php";
include_once "../includes/session.php";
date_default_timezone_set("Africa/Lagos");
if (isset($_POST['Appointment'])) {
    $specialist = $_POST['specialization'];
    $patient = $_POST['patNum'];
    $date = $_POST['date'];
    $time_created = $_POST['time'];
    $constantant = $_POST['fee'];
    $status = "0";

    $sql = "INSERT INTO appointment (Pid,specialist, fee, date_created, time_created,d_status) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,'ssssss', $patient, $specialist,$date,$constantant,$time_created,$status);
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

elseif (isset($_GET['ver'])) {
    $id = $_GET["ver"];
    // var_dump($id);

    $sql = "UPDATE appointment SET d_status = '1' WHERE id = '$id'";
    $query = mysqli_query($dbconnect, $sql);
    if (!$query) {
        $_SESSION['error_msg'] = "Something went wrong!";
        header("Location: ../../users/dashboard");
    }else{
        $_SESSION['success_msg'] = "Cancel";
        header("Location: ../../users/dashboard");
    }
}
elseif (isset($_GET['Can'])) {
    $id = $_GET["Can"];
    // var_dump($id);

    $sql = "UPDATE appointment SET d_status = '2' WHERE id = '$id'";
    $query = mysqli_query($dbconnect, $sql);
    if (!$query) {
        $_SESSION['error_msg'] = "Something went wrong!";
        header("Location: ../../doctor/dashboard");
    }else{
        $_SESSION['success_msg'] = "Cancel";
        header("Location: ../../doctor/dashboard");
    }
}
