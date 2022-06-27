<?php
if (!isset($_POST["submit"])) {
    header("Location: ../my-profile.php?panel=2");
}

session_start();
include_once "../../includes/db.inc.php";

$error = "";

$id = $_POST["id"];
$title = $_POST["course"];
$image = $_POST["banner"];
$limit = $_POST["occupancy"];
$n_limit = intval($limit);
$description = $_POST["description"];

$q_name = "";
$c_lt = 0;
$c_oc = 0;

$stmt = $conn->prepare("call get_course_from_teacher(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while ($row = $result->fetch_assoc()) {
    $q_name = $row["name"];
}

if ($title != $q_name) {
    $stmt = $conn->prepare("call get_course_from_name(?)");

    $stmt->bind_param("s", $title);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "The title is already taken";
    }

    $stmt->close();
};

$stmt = $conn->prepare("call check_reached_limit(?)");

$stmt->bind_param("s", $id);

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while ($row = $result->fetch_assoc()) {
    $c_oc = $row["occupancy"];
    $c_lt = $row["limit"];
}

if($c_oc>$limit) {
    $error = "The Limit number is smaller than the Occupancy number";
}

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

    if ($stmt->execute()) {
        header("Location: ../my-profile.php?panel=2&message=success");
    };

    $stmt->close();
}
