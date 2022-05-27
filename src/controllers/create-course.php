<?php
if (!isset($_POST["submit"])) {
    header("Location: ../create-course.php");
}

session_start();

include_once "../../includes/db.inc.php";

$title = $_POST["title"];
$limit = $_POST["limit"];
$description = $_POST["description"];
$image = $_POST["image"];
$teacher = $_SESSION["access-token"];
$n_limit = intval($limit);

$error = "";

if (empty($title) || empty($limit) || empty($description)) {
    $error = "You must fill all the boxes";
    # header("Location: ../create-course.php?error");
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
    header("Location: ../create-course.php?error=" . $error);
}

$stmt = $conn->prepare("call get_course_from_name(?)");

$stmt->bind_param("s", $title);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $error = "The title is already taken";
}

$stmt->close();

if (!empty($error)) {
    header("Location: ../create-course.php?error=" . $error);
} else {
    $stmt = $conn->prepare("call add_course(?,?,?,?,?)");

    $stmt->bind_param("ssiss", $title, $description, $n_limit, $image, $teacher);

    $stmt->execute();

    $stmt->close();

    header("Location: ../main-menu.php");
}
