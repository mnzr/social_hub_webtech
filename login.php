<?php
    ob_start();
    session_start();
    $title = "Login";
    include 'inc/header.php';
    include 'inc/connection.php';


    $msg = '';

    if (isset($_POST['login'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT id FROM users WHERE email = '$email' and password = '$password'";

        try {
            $result = $mysqlconn->query($sql);
            $row = $result->fetch_assoc();
            // $active = $row['active'];
            //var_dump($row);

              // If result matched $myusername and $mypassword, table row must be 1 row

            if($row['id']) {
                 // session_register("$username");
                 //$_SESSION['login_user'] = $username;
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['email'] = $_POST['email'];
                //echo "Logged in";
                header('Location: '.'feed.php');
                 //header("location: welcome.php");
              }else {
                  $msg = 'Wrong email or password';
              }
        } catch (Exception $e) {
            echo "Something went wrong";
        }
    }

    if ($_SESSION['valid'] == true) {
        header('Location: '.'feed.php');
    } else {
?>
<div class = "container">

         <form class = "form-signin" role = "form"
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
            ?>" method = "post">
        <h2 class="form-signin-heading">Please sign in</h2>


        <?php if (!($msg == "")) { ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          Enter a valid email address
            <p><?php echo "$msg";?></p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['signup'])){ ?>
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
          <span class="sr-only">Success:</span>
			You can log in now!
        </div>
        <?php } ?>


        <label for="inputEmail" class="sr-only">Email</label>
        <input type="enail" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
      </form>
</div> <!-- /container -->

<?php } ?>



<?php include 'inc/footer.php'; ?>
