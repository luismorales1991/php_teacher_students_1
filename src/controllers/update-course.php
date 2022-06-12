<?php
if (!isset($_POST["submit"])) {
    header("Location: ../my-profile.php?panel=2");
}

session_start();

include_once "../../includes/db.inc.php";

$id = $_POST["id"];
$title = $_POST["course"];
$image = $_POST["banner"];
$limit = $_POST["occupancy"];
$n_limit = intval($limit);
$description = $_POST["description"];

$error = "";

if (empty($title) || empty($limit) || empty($description)) {
    $error = "You must fill all the boxes";
}

if (strlen($title) > 60) {
    $error = "The title is too long";
}

if (!is_numeric($limit)) {
    $error = "The limit must be a number";
} else if (intval($limit) > 30) {
    $error = "The limit is out of the range";
}

if (empty($image)) {
    $error = "You must select a banner";
}

if (!empty($error)) {
    header("Location: ../my-profile.php?panel=2&error=" . $error);
} else {
    $stmt = $conn->prepare("call edit_course(?,?,?,?,?)");

    $stmt->bind_param("sssis", $id, $title, $description, $n_limit, $image);

    if($stmt->execute()) {
        header("Location: ../my-profile.php?panel=2&message=success");
    };

    $stmt->close();

    
}
