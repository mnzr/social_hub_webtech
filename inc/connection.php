<?php
    require $_SERVER['DOCUMENT_ROOT']. '/inc/' . 'config.php';
    // Create connection

$mysqlconn = new mysqli($mysqlserver, $mysqluser, $mysqlpass, $mysqldb);

// Check connection
if ($mysqlconn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully\n";

// $conn->close();

 ?>
