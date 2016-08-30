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
    require_once("vendor/danielmewes/php-rql/rdb/rdb.php");
    // echo "THis is Home";

// Get user data
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $contact = $_SESSION['contact'];
    $org_id = $_SESSION['org_id'];
    $address = $_SESSION['address'];

    // Just to get the org name from id
    $conn = r\connect('localhost');
    $result = r\table("orgs")->get($org_id)->run($conn); //->toArray();
    // print("<pre>".print_r($result,true)."</pre>");
    // echo $_SESSION['org_id'];
    $org_name = $result['name'];

    # Get all posts of this user
    $result = r\table("orgs")->get($org_id)->run($conn); //->toArray();
    $posts = $result['posts'];
    //print("<pre>".print_r($posts,true)."</pre>");


    ?>

    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="What's happening?">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Update!</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

    <br><br>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">All recent posts in <?php echo $org_name ?></div>
      <!--
      <div class="panel-body">
        <p>...</p>
      </div>
    -->
      <!-- List group -->
      <ul class="list-group">
      <?php $n= sizeof($posts);
              $content = $posts['content'];
        $time = $posts['time'];
        echo "<li class='list-group-item'><b>"
            . $time . "</b> : "
            . $content;

      /*
            for ($i=0; $i < $n; $i++) {
            // print("<pre>".print_r($posts[$i]['author'],true)."</pre>");
                $content = $posts[$i]['content'];
                $time = $posts[$i]['time'];
                echo "<li class='list-group-item'><b>"
                    . $time . "</b> : "
                    . $content;
        }*/ ?>
      </ul>
    </div>


