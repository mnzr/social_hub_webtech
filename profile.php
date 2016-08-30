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
    $title = "Profile";
    include 'inc/header.php';
    require_once("vendor/danielmewes/php-rql/rdb/rdb.php");

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
    // print("<pre>".print_r($posts,true)."</pre>");


    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Profile for <?php echo $_SESSION['name']; ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center" class="thumbnail"> <img alt="User Pic" src="http://santetotal.com/wp-content/uploads/2014/05/default-user.png" style="height:200px; weight: 200px; margin-bottom: 100;">
                </div>
                <br>
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?php echo $email;?></td>
                            </tr>
                            <tr>
                                <td>Contact:</td>
                                <td><?php echo $contact;?></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><?php echo $address;?></td>
                            </tr>
                            <tr>
                                <td>Organization:</td>
                                <td><?php echo $org_name;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Post by <?php echo $_SESSION['name']; ?></div>
      <!--
      <div class="panel-body">
        <p>...</p>
      </div>
    -->
      <!-- List group -->
      <ul class="list-group">
      <?php $n= sizeof($posts);
        /*
        foreach ($posts as $post) {
            print("<pre>".print_r($post,true)."</pre>");
        }*/
      // print("<pre>".print_r($posts,true)."</pre>");
      // echo $name;
        $content = $posts['content'];
        $time = $posts['time'];
        echo "<li class='list-group-item'><b>"
            . $time . "</b> : "
            . $content;      /*
            for ($i=0; $i < $n; $i++) {
            // print("<pre>".print_r($posts[$i]['author'],true)."</pre>");
                // echo $posts[$i]['author'];
                if($posts[$i]['author'] == $name) {
                    $content = $posts[$i]['content'];
                    $time = $posts[$i]['time'];
                    echo "<li class='list-group-item'><b>"
                        . $time . "</b> : "
                        . $content;
                        }
        } */?>
      </ul>
    </div>
