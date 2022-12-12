
</section>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid justify-content-between align-items-center">
        <div class = "d-flex align-items-center ">
        <a class="navbar-brand d-flex align-items-center gap-3" href="dashboard">
            <img src="..\assets\img\pngwing.com.png" alt="logo" height="60">
            <span class="fs-4">e-health</span>
            </a>
            <!-- <div>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fas fa-bars"></i>
            </button>
            </div> -->
        </div>
        
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="..\assets\config\login_Config.php">Logout</a></li>
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            </ul>
        </div>
      </div>

   
</nav>
<!-- <section>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-body">
        <ul>
          <li>
          <a href="dashboard">
            <i class="fa fa-columns"></i> Dashboard
          </a>
          </li>
          <?php if($userData['user_role'] != 'Admin'){ ?>
          <li>
           <a href="dashboard">
            <i class="fa fa-id-card"></i>Profile
          </a>
          </li>
         <?php }?>
          <li>
          <a href="dashboard">
            <i class="fa fa-columns"></i> Appointment
          </a>
          </li>
          <li>
          <a href="dashboard">
            <i class="fa fa-columns"></i> Setting
          </a>
          </li>
        </ul>
      </div>
    </div>
</section> -->

<!-- <style>
  .navbar{
    background-color:purple !important;
  }
</style> -->
