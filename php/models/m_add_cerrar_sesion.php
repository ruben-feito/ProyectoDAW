<?php
   session_start();
   session_unset();
   
   if(session_destroy()) {
      header("Location: .././controllers/c_add_login.php");
   }
?>