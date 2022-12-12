<?php
 require "dbconnect.php";
 include_once "../includes/session.php";

if (!isset($_POST['login'])) {
    header("Location:../../index");
}
else {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM patient WHERE email = ?";
        $stmt = mysqli_stmt_init($dbconnect);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $numRow =  mysqli_num_rows($result);  
        echo   $numRow;
        if($numRow < 1){
            header("Location:../../login"); 
            $_SESSION['errorMsg'] = "invaild Email!";
        }
        else {
            
                $row = mysqli_fetch_assoc($result);
                var_dump(  $row );
                $returnpassword = ( $row['pass']);
                if (!password_verify($password, $returnpassword)) {
                    header("Location:../../login"); 
                    $_SESSION['errorMsg'] = "password incorrect!";  
                }
                else {
                    $_SESSION['fullName'] = $row['Fname'];
                    $_SESSION['patient'] = $row['id'];
                    if ($row['user_role'] === 'patient') {
                        header("Location:../../users/dashboard");
                    }
                    else {
                        header("Location:../../Admin/dashboard");
                    }
                }
         }
}
