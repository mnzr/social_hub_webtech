<?php
    if(!isset($_SESSION)) {
          session_start();
    }

    // If session is not valid, simply redirect to index page
    if (!isset($_SESSION['valid'])) {
      // Send to feed
      header('Location: '.'index.php');
      echo "Set";
    }



    // In case session is valid, render the full page
    $title = "Home";
    include 'inc/header.php';

    echo "THis is Home";
