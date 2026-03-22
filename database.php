<?php
$host   = "your_db_host";
$user   = "your_db_username";
$pass   = "your_db_password";
$dbname = "your_db_name";

$conne = mysqli_connect($host, $user, $pass, $dbname);

if (!$conne) {
    die("<h3>Connection failed: " . mysqli_connect_error() . "</h3>");
}

?>
