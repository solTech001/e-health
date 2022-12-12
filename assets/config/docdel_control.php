<?php
require "dbconnect.php";
include_once "../includes/session.php";
if (!isset($_GET['del'])) {
    header("Location:logout"); 
}
else {
    $userID = $_GET['del'];
    $sql = "DELETE FROM doctors WHERE  id = '$userID'";
    $query = mysqli_query($dbconnect,$sql);
    header("Location:../../Admin/dashboard");
}
