<?php
    if(!isset($_SESSION)) {
          session_start();
    }

    // If session is valid, simply redirect to feed page
    if (isset($_SESSION['valid'])) {
      // Send to feed
      header('Location: '.'home.php');
      echo "Set";

    }

    // In case session is not valid, render the full page
    // $_SESSION['valid'] = false;
    $title = "Log In";
    include 'inc/header.php';
    // Error message
    $message = isset($_POST["message"]) ? $_POST["message"] : "";
?>

    <style type="text/css">

        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
          margin-bottom: 10px;
        }
        .form-signin .checkbox {
          font-weight: normal;
        }
        .form-signin .form-control {
          position: relative;
          height: auto;
          -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
                  box-sizing: border-box;
          padding: 10px;
          font-size: 16px;
        }
        .form-signin .form-control:focus {
          z-index: 2;
        }
        .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }

    </style>

    <div class="container">
        <?php // In case a POST request ?>
        <form class="form-signin" action ="inc/login_helper.php" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <?php if ($message != "") { ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                <?php echo "$message";?>
            </div>
            <?php } ?>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> <!-- /container -->
<?php include 'inc/footer.php'; ?>
