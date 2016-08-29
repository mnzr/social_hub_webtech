<?php
    if(!isset($_SESSION)) {
          session_start();
    }
    $title = "Logout";
    include 'inc/header.php';
 ?>


<?php
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['valid']);

   echo '<div class="well well-lg">You have cleaned session</div>
';
   header('Refresh: 2; URL = index.php');
