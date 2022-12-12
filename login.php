<?php
 include_once "assets\includes\session.php";
 require "assets\config\dbconnect.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets\css\bootstrap5.min.css">
    <link rel="stylesheet" href="assets\lib\fontawsome\css\all.css">
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
    <section>
   <?php
    include_once "assets/includes/nav.php";
   ?>
    </section>
    <section>
    <div class ="container my-4" >
        <div class ="d-flex align-items-center gap-5 py-4"  >
            <button class="btn btn-outline-dark" id = "Patient">Login as Patient</button>
            <button class="btn btn-outline-dark" id= "Doctor">Login as Doctor</button>
        </div>
        <?php
        echo errorMsg() ?>
        <form action="assets\config\login_Config.php" method="post" id="LogP" class="card mx-auto shadow p-2" style="max-width:600px;">
                <h3 class="text-center">Login as Patient</h3>
                <input type="text" name ="email" class ="form-control mb-3 " placeholder="Email*">
                <input type="text" name ="pass" class ="form-control mb-3 " placeholder="Password">
                <input type="submit" class = "btn btn-outline-dark" name = "login" value = "Login">
                <p>
                Don't have an account? <a href="register" class="text-decoration-none">Create an Account?</a>
                </p>
        </form>
        <form action="assets\config\doctor_login.php" method="post" id="LogD" class="card mx-auto shadow p-2 d-none" style="max-width:600px;">
                <h3 class="text-center">Login as Doctor</h3>
                <input type="text" name ="email" class ="form-control mb-3 " placeholder="Email*">
                <input type="text" name ="pass" class ="form-control mb-3 " placeholder="Password">
                <input type="submit" class = "btn btn-outline-dark mb-3" name = "login_doctor" value = "Login">
        </form>
    </div>
    </section>
    <section>
        <?php
         include_once "assets\includes/footer.php"
        ?>
    </section>
    <script src="assets\js\bootstrap.bundle.min.js"></script>
    <script src="assets\js\main.js"></script>
</body>

</html>

