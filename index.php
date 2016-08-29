<?php
    if(!isset($_SESSION)) {
          session_start();
    }

    // If session is valid, simply redirect to feed page
    if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
      // Send to feed
      header('Location: '.'home.php');
      echo "Set";
    }



    // In case session is not valid, render the full page
    // $_SESSION['valid'] = false;
    $title = "Social Hub";
    include 'inc/header.php';
    /*
    if (isset($_SESSION['valid'])) {
      // header('Location: '.'login.php');
      // Send to feed
      // header('Location: '.'login.php');
      echo "Set";

    } else {
      // header('Location: '.'feed.php');
      // echo "Set";
      */
?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Welcome to Social Hub!</h2>
        <p>Social Hub is a network of social networks- intended for social wellfare organizations. </p>
        <p>
          <a class="btn btn-md btn-info" href="signup.php" role="button">Join a network &raquo;</a>
          or
          <a class="btn btn-md btn-success" href="login.php" role="button">Login &raquo;</a>
        </p>
      </div>
<?php // } ?>
<?php include 'inc/footer.php'; ?>
