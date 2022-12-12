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
    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="assets\img\car1 (1).jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets\img\car2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets\img\car1 (1).jpg" class="d-block w-100" alt="...">

        <!-- <img src="assets\img\car3.jpg" class="d-block w-100" alt="..."> -->
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</section>


<section id = "card">
    <h3>Our department</h3>
    <!-- card -->
    <div class="container-fluid row text-center">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <div class="card" style="width: 16rem;">
      <img src="assets\img\card (2).jpg" class="card-img-top" alt="...">
        <h5 class="card-title">Pediatrics</h5>
        <p class="card-text">Pediatricians focus on treating children from birth to young adulthood.</p>
        <a href="#" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <div class="card" style="width: 16rem;">
      <img src="assets\img\card (4).jpg" class="card-img-top" alt="...">
        <h5 class="card-title">Oncology</h5>
        <p class="card-text">Oncologists treat cancer and its symptoms. a person may have several types of healthcare.....</p>
        <a href="#" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <div class="card" style="width: 16rem;">
      <img src="assets\img\card (2).jpg" class="card-img-top" alt="...">
        <h5 class="card-title">Family medicine</h5>
        <p class="card-text">Family practice physicians are also called family medicine doctors. They treat people of all ages.</p>
        <a href="#" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <div class="card" style="width: 16rem;">
      <img src="assets\img\card (1).jpg" class="card-img-top" alt="...">
        <h5 class="card-title">Neurology</h5>
        <p class="card-text">A neurologist treats conditions of the nerves, spine, and brain. People may see a neurologist.</p>
        <a href="#" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
  </div>
</div>

</section>
<section>


<section>
  <?php 
   include_once "assets/includes/footer.php"
   ?>
</section>

            

<script src="assets\js\bootstrap.bundle.min.js"></script>
</body>
</html>




<style>
    #card{
    padding-top: 15px;
    padding-bottom: 15px;
    text-align: center;
}
</style>