<?php
    session_start();
    $title = "Newsfeed";
    include 'inc/header.php';
    if (isset($_SESSION['valid']) && !empty($_SESSION['valid'])) {
        echo '<pre>' . var_dump($_SESSION) . '</pre>';
?>
    <div id='container'>
        <p>
            <ul>
                <li>
                content 1
                </li>
                <li>
                content 2
                </li>
            </ul>
                     Click here to clean <a href = "logout.php" tite = "Logout">Session.</a>

        </p>
        <p>
<?php
    } else echo "What the hell\n";
?>
             Click here to clean <a href = "logout.php" tite = "Logout">Session.</a>
        </p>
        </div>
