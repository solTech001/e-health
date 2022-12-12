<?php
require "dbconnect.php";
include_once "../includes/session.php";

if (isset($_POST['updatePicture'])) {

    $user =  $_SESSION['patient'];
    $file = $_FILES["file"];
    
    $fileName = $file["name"];
    $fileTmp_name = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];
      var_dump($fileSize);


    $allowed = array("jpg","jpeg","png","gif");
    $ext = explode('.',$fileName);
    $ext = end($ext);
    $ext = strtolower($ext);
  

    if (!in_array($ext,$allowed )) {
        $_SESSION['error_msg'] = "Invalid File Format valid(jpg, jpeg, png, gif)";
        header("Location: ../../users/profile");
    }
    else {
        if ($fileError != 0) {
            $_SESSION['error_msg'] = "File is corrupted";
            header("Location: ../../users/profile");
        }
        else {
            if($fileSize > 3000000){
                $_SESSION['error_msg'] = "File to large max: 3mb";
                header("Location: ../../users/profile");
        }
    }
    else {
        $NewfileName = "mypicture".$user".".$ext;
        $location
        if(file_exists())
    }
}
}