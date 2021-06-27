<?php
   session_start();
   
   unset($_SESSION['email']);
    session_destroy();
   header('Refresh:0; URL = login.php');
?>
