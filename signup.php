<?php
    session_start();
    $title = "Sign Up";
    include 'inc/header.php';
    include 'inc/connection.php';


    $msg = '';

    if (isset($_POST['signup'])) {
        $email      = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (first_name, last_name, email, password, organization_id) VALUES ('$first_name', '$last_name', '$email', '$password', 1 )";

        try {
            if($mysqlconn->query($sql) === true) {
                echo "<script type=\"text/javascript\">
                alert('Your account has been created! Please log in with the email and password you used to sign up.');
                </script>";
                header('Location: '.'login.php?signup=true');
            } else {
              $msg = "Error: " . $sql . "<br>" . $mysqlconn->error;;
            }
        } catch (Exception $e) {
            echo "Something went wrong";
        }
        $mysqlconn->close();
    }

    if ($_SESSION['valid'] == true) {
        header('Location: '.'feed.php');
    } else {
?>
<div class = "container">
<script>
function validate() {
    var first_name = document.forms["register"]["first_name"].value;
    var last_name = document.forms["register"]["last_name"].value;
    var email = document.forms["register"]["email"].value;
    var password = document.forms["register"]["password"].value;
    var confirm_password = document.forms["register"]["confirm_password"].value;

}
</script>
<form class = "form-signin" role = "form" name = "register"
        action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
        method = "post" onSubmit = "return validate();">

        <h2 class="form-signin-heading">Enter your details</h2>


        <?php if (!($msg == "")) { ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
            <p><?php echo "$msg";?></p>
        </div>
        <?php } ?>




        <label for="first_name" class="sr-only">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required autofocus>

        <label for="last_name" class="sr-only">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required autofocus>


        <label for="email" class="sr-only">Email</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <label for="confirm_password" class="sr-only">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>

        <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign up</button>
    </form>
</div> <!-- /container -->
<?php } ?>


<?php include 'inc/footer.php'; ?>
