<?php
    ob_start();
    session_start();
    $_SESSION['valid'] = false;
    $title = "Social Hub";
    include 'inc/header.php';

    if ($_SESSION['valid'] == false) {
      header('Location: '.'login.php');

    } else {
      header('Location: '.'feed.php');
    }
?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Welcome to Social Hub!</h1>
        <p></p>
        <!--
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
        -->
      </div>
<p><?php echo $_SESSION['valid']; ?></p>

<?php include 'inc/footer.php'; ?>
