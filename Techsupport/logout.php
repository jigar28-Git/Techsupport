<?php
include 'include/config.inc.php';
   session_start();

   session_unset();
   
      
   if(session_destroy()) {
      header("Location: {$hostname}/Template/login.php");
   }
?>