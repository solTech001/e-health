 <?php

 session_start();
function errorMsg(){
    if (isset($_SESSION['errorMsg'])) {
        $output =  "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
       <strong>";
         $output.=htmlentities($_SESSION['errorMsg']);
         $output.="<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
         </div>";
         $_SESSION['errorMsg'] = null;
         return $output;
      }
}
function successMsg(){
    if (isset($_SESSION['successMsg'])) {
        $output =  "<div class=\"alert alert-dark alert-dismissible fade show\" role=\"alert\">
       <strong>";
         $output.=htmlentities($_SESSION['successMsg']);
         $output.="<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
         </div>";
         $_SESSION['successMsg'] = null;
         return $output;
      }
}

function isLogIn(){
  if (!isset($_SESSION['patient'])) {
    header("Location: ../login");
 }
}
