<?php
  if(isset($_GET["out"])){
    // unset($_SESSION['name']);
    session_start();
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy(); 
    header('Location: ../index.php'); 
   }

?>