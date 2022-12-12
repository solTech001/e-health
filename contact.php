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
    <title>e-health</title>
    <!--link-->
    <link rel="stylesheet" href="assets\css\bootstrap5.min.css">
    <link rel="stylesheet" href="assets\lib\fontawsome\css\all.css">
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
<section>
    <?php
    include_once "assets/includes/nav.php"
    ?>
</section>
   
<section>
<div class="mt-5  text-center">
    <div class="card p-3 shadow mx-auto" style = "max-width:600px;">
    <h4>Contact Us</h4>
        <form action="assets\config\contact.Cofig.php" method="post">
            <input type="text" name ="fname" class ="form-control mb-3 " placeholder="Full Name">
            <input type="text" name ="Email" class ="form-control mb-3 " placeholder="email">
            <textarea class="form-control mb-3" name = "message"placeholder="Message..." id="editor" ></textarea>
            <input type="submit" name="contact" value="submit" class = "btn btn-outline-dark">
        </form>
    </div>
    </div>
</section>


<script src="assets\lib\ckeditor5\src\ckeditor.js"></script>
<script>
   ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

</script>
</body>
</html>