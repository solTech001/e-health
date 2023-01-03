<?php
require "dbconnect.php";
include_once "../includes/session.php";

if (isset($_POST['update'])) {
    header("Location:logout"); 
} 
else {

        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $specialization = $_POST["specialization"];

  var_dump($specialization);

    $sql= "UPDATE doctors SET specialization = ?, email = ? , phone = ? WHERE id = '$user'";
    $stmt = mysqli_stmt_init($dbconnect);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"sss",$specialization,$email,$phone);
    $execute = mysqli_stmt_execute($stmt);
    // if (!$execute) {
    //     $_SESSION['error_msg'] = "Opps! Something went wrong";
    //     header("Location: ../../Admin/doctorprofile");
    // }else{
    //     // $_SESSION['fullName'] = $fullName;
    //     $_SESSION['success_msg'] = "Update Successful!";
    //     header("Location: ../../Admin/dashboard");
    // }

}
