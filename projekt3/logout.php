<?php session_start();
   if($_SESSION['logged']!=true){
      header('Location: login.php?action=not_logged');
      exit;
   }
   $_SESSION['logged'] = false;
   header('Location: login.php?action=logged_out');
?>
