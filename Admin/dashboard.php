<?php
require_once "..\assets\includes\session.php";
require "..\assets\config\dbconnect.php";
isLogIn();
$pd = $_SESSION['patient'];
$sql = "SELECT * FROM patient WHERE id = '$pd'";
$query = mysqli_query($dbconnect, $sql);
$userData = mysqli_fetch_assoc($query);
// var_dump($userData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets\css\bootstrap5.min.css">
    <link rel="stylesheet" href="../assets\lib\fontawsome\css\all.css">
    <link rel="stylesheet" href="../assets\css\style.css">
    <link rel="shortcut icon" href="../assets\img\pngwing.com.png">

</head>
<body>
<section>
    <?php
    include_once "..\assets\includes\dash_nav.php";
    ?>
<section>
    <?php  
        $sql = "SELECT * FROM patient  WHERE user_role = 'patient' ORDER BY 'id' DESC";
        $query = mysqli_query($dbconnect,$sql); 
    ?>
      <?php
         $sql = "SELECT * FROM doctors";
         $queryD = mysqli_query($dbconnect, $sql);
         ?>
    <div>
        <div class="d-flex justify-content-end gap-5">
          <div class="card p-5 shadow">
            <h1>
              Total Doctors</h1>
              <h2 class = "text-center fs-1"><?php echo mysqli_num_rows($queryD)?></h2>
          </div>
          <div class="card p-5 shadow">
            <h1>
              Total Patient</h1>
              <h2 class = "text-center fs-1"><?php echo mysqli_num_rows($query)?></h2>
          </div>
        </div>
        </div>
          
    </div>


<button class = "btn btn-outline-dark" id = "viewPat">View Patient Record</button>
<button class = "btn btn-outline-dark" id = "viewPat">Appointment History</button>
<button class = "btn btn-outline-dark" id = "viewDoc">Doctor Record</button>

   <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Doctor
</button>


<div class ="container my-4" >
       
<table class=" table viewD table-hover d-none ">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <th scope="col">specialization</th>
      <th scope="col">phone</th>
    </tr>
  </thead>
  <!-- doctor record -->
    <?php 
    while ($userDat = mysqli_fetch_assoc($queryD)) { 
        // var_dump($userDat);
        ?>    
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $userDat['d_id']; ?></th>
      <td><?php echo $userDat['full_name']; ?></td>
      <td><?php echo $userDat['email']; ?></td>
      <td><?php echo $userDat['specialization']; ?></td>
      <td><?php echo $userDat['phone']; ?></td>
      <td>
       <a href="..\assets\config\docdel_control.php?del=<?php echo $userDat['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete <?php echo strtoupper($userDat['full_name']); ?> account?')"><i class="fa fa-trash"></i></a>
    </td>
      <td>
       <a href="doctorprofile.php?update=<?php echo $userDat['id'];?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to update <?php echo strtoupper($userDat['full_name']); ?> account?')"><i class=" fa fa-edit"></i></a>
    </td>
    </tr>
    </tbody>
 <?php
 }
 ?>
</table>
</div>
<div class ="container my-4 shadow" >

 <table class="table table-hover viewP d-none">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">email</th>
      <!-- <th scope="col">Handle</th> -->
    </tr>
  </thead>
  <!-- patient record -->
    <?php 
    while ($userData = mysqli_fetch_assoc($query)) { 
        // var_dump($userData);
        ?>    
    
  <tbody>
    <tr>
      <th scope="row"><?php echo $userData['patient_id']; ?></th>
      <td><?php echo $userData['Fname']; ?></td>
      <td><?php echo $userData['Sname']; ?></td>
      <td><?php echo $userData['Email']; ?></td>
      <td>
        <a href="..\assets\config\delete_control.php?del=<?php echo $userData['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete <?php echo strtoupper($userData['Sname']); ?> account?')"><i class="fa fa-trash"></i>
        </a>
    </td>
    </tr>
    </tbody>
 <?php
 }
 ?>
</table>
    
</div>
    
</section>

<section>
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <form action="..\assets\config\doctor_config.php" method="post" class="card mx-auto shadow p-2" style="max-width:600px;">
             <h3 class="text-center">Register Doctor</h3>
                <input type="text" name ="fname" class ="form-control mb-3 " placeholder="Full Name">
                <input type="text" name ="email" class ="form-control mb-3 " placeholder="Email">
                <input type="text" name ="dob" onfocus ="this.type='date'" class ="form-control mb-3 " placeholder="Date of birth"> 
                <input type="tel" name ="phone" class ="form-control mb-3 "  placeholder="Phone">
                <select class ="form-control mb-3 " name="specialization">
                <option>Pediatrics</option>
                <option>Oncology</option>
                <option>Family medicine</option>
                <option>Neurology</option>
                </select>
                 <div class = "col-12 d-flex gap-5">
                    <input type="password" name ="pass" class ="form-control mb-3 " placeholder="Password">
                    <!-- <input type="password" name ="compass" class ="form-control mb-3 " placeholder="Confirm Password"> -->
                </div>
                <select class ="form-control mb-3 " name="gender">
                <option>Male</option>
                <option>Female</option>
                </select>
      </div>
      <div class="modal-footer shadow">
      <input type="submit" name = "register" Value = "Add Doctor" class="btn btn-dark mb-3"> 
      </div>
      </form>
    </div>
  </div>
</div>
</section>
<script src="..\assets\js\bootstrap.bundle.min.js"></script>
<script src="..\assets\js\main.js"></script>

  <section>
    <!-- appointment history -->

  </section>

</body>
</html>

<script>
  const Table = document.querySelector("#viewPat");
  const table = document.querySelector(".viewP");
  const viewDoc = document.querySelector("#viewDoc");
  const viewD = document.querySelector(".viewD");

   Table.addEventListener(
    'click',()=>{
        table.classList.remove('d-none') 
        viewD.classList.add('d-none')
    }
)
viewDoc.addEventListener(
    'click',()=>{
      table.classList.add('d-none') 
        viewD.classList.remove('d-none')
    }
)
</script>
