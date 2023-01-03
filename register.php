<?php
 require_once "assets\includes\session.php";
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
    <link rel="shortcut icon" href="assets\img\pngwing.com.png">

</head>
<body>
<section>
    <?php
    include_once "assets/includes/nav.php";
    ?>
</section>

<section>
    <div class ="container my-4" >
            <?php
            echo errorMsg();
            successMsg();
                ?>
        <form action="assets\config\register_Config.php" method="post" class="card mx-auto shadow p-2" style="max-width:600px;">
             <h3 class="text-center">Register as Patient</h3>
                <input type="text" name ="fname" class ="form-control mb-3 " placeholder="First Name">
                <input type="text" name ="sname" class ="form-control mb-3 " placeholder="Surname Name">
                <input type="text" name ="email" class ="form-control mb-3 " placeholder="Email">
                <input type="text" name ="dob" onfocus ="this.type='date'" class ="form-control mb-3 " placeholder="Date of birth"> 
                <input type="tel" name ="phone" class ="form-control mb-3 "  placeholder="Phone">
                 <div class = "col-12 d-flex gap-5">
                    <input type="password" name ="pass" class ="form-control mb-3 " placeholder="Password">
                    <input type="password" name ="compass" class ="form-control mb-3 " placeholder="Confirm Password">
                </div>
                <select class ="form-control mb-3 " name="gender">
                <option>Male</option>
                <option>Female</option>
                </select>
                <input type="submit" name = "register" Value = "Create Account" class="btn btn-dark mb-3"> 
                <p>
                    Already have an account? <a href="login" class="text-decoration-none">Login</a>
                </p>
        </form>
    </div>
</section>



<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>