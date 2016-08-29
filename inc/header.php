<?php
    if(!isset($_SESSION)) {
          session_start();
    }
    $website_name = "Social Hub";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script type='text/javascript'  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
              <span class="glyphicon glyphicon-leaf"> </span>
              <?php echo $website_name; ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">Home</a></li>-->
              <?php if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) { ?>
                <li class="navbar-text"><span>Signed in as
                  <a href="profile.php" class="navbar-link">
                                        <?php echo $_SESSION['name']; ?>
               </a></span></li>
              <?php } else { ?>
                <li class="navbar-text">Social network for organizations</li>
            <?php } ?>
            <?php /* ?>
              <script type="text/javascript">
                var validity = "<?php echo $_SESSION['valid']; ?>";
                var li = '<li><a href="login.php">Login</a></li><li><a href="signup.php">Sign Up</a></li>';
                if(validity == 1) {
                  li = '<li><a href="logout.php">Logout</a></li><li><a href="create_organization.php">Create Org</a></li>';
                }
                  document.write(li);
              </script>
            <?php */ ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-user fa-4x"></span>
                <span class="caret"></span></a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <?php if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) { ?>
                  <li><a href="logout.php">Log out</a></li>
                  <?php } else { ?>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="signup.php">Sign up</a></li>
                  <?php }?>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Administrative</li>
                  <li><a href="admin/index.php">Admin login</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

