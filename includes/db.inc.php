<?php
$host = getenv("YOUR_HOST");
$user = getenv("YOUR_USER");
$pwd = getenv("YOUR_PASSWORD");
$db = getenv("YOUR_DATABASE");

$conn = mysqli_connect($host, $user, $pwd, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>