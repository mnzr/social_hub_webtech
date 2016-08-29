<?php
    if(!isset($_SESSION)) {
          session_start();
    }

    // If session is valid, simply redirect to feed page
    if (!isset($_SESSION['valid'])) {
      // Send to feed
      header('Location: '.'index.php');
      echo "Set";
    }



    // In case session is not valid, render the full page
    // $_SESSION['valid'] = false;
    $title = "Home";
    include 'inc/header.php';

    echo "THis is Home";
