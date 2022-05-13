<?php
$host = "localhost";
$user = "root";
$pwd = "admin";
$db = "php_t_s";

$conn = mysqli_connect($host, $user, $pwd, $db);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>