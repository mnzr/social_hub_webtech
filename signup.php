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
    require_once("vendor/danielmewes/php-rql/rdb/rdb.php");
    include 'inc/header.php';

    // Get all organizations
    $conn = r\connect('localhost');
    $result = r\table("orgs")->run($conn)->toArray();

    // Success message
    $message = isset($_GET["message"]) ? $_GET["message"] : "";
?>

    <style type="text/css">

        .form-signup {
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
        .form-signup .form-signup-heading,
        .form-signup .checkbox {
          margin-bottom: 10px;
        }
        .form-signup .checkbox {
          font-weight: normal;
        }
        .form-signup .form-control {
          position: relative;
          height: auto;
          -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
                  box-sizing: border-box;
          padding: 10px;
          font-size: 16px;
        }
        .form-signup .form-control:focus {
          z-index: 2;
        }

        .form-signup input[type="email"],
        .form-signup input[type="password"],
        .form-signup input[type="text"] {
          margin-bottom: 10px;
        }

        /*
        .form-signup input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signup input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }

        .form-signup input[name="inputContact"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signup input[name="inputLocation"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
        */
    </style>

    <div class="container">
        <?php // In case a POST request ?>
        <form class="form-signup" action ="inc/signup_helper.php" method="post">
            <h2 class="form-signup-heading">Enter information</h2>
            <?php if ($message != "") { ?>
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                <span class="sr-only">Success:</span>
                <?php echo "$message";?>
            </div>
            <?php } ?>
            <label for="inputName" class="sr-only">Full name</label>
            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Full name" required autofocus>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

            <label for="inputConfirmPassword" class="sr-only">Password</label>
            <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" class="form-control" placeholder="Confirm password" required>


            <label for="inputContact" class="sr-only">Contact number</label>
            <input type="text"     id="inputContact" name="inputContact" class="form-control" placeholder="Contact number" required>

            <label for="inputAddress" class="sr-only">Address</label>
            <input type="text"     id="inputAddress" name="inputAddress" class="form-control" placeholder="Address" required>

            <div class="form-group">
            <label for="inputOrg" class="sr-only">Select organization</label>
            <select class="form-control" id="inputOrg" name="inputOrg">
                <option value="" placeholder="Select organization">Select organization</option>
                <?php
                foreach ($result as $key => $value) {
                    echo "<option value='". $value['id'] . "'>"
                        . $value['name']
                        ."</option>";
                } ?>
            </select>
            </div>

            <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        </form>

    </div> <!-- /container -->
<?php include 'inc/footer.php'; ?>
