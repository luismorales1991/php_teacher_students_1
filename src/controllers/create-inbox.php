<?php
include_once "../../includes/db.inc.php";
session_start();

$error = "";
$check_limit = [];


if (!isset($_SESSION["access-token"])) {
    $error = "Error 403";
}

$stmt = $conn->prepare("call check_reached_limit(?)");

$stmt->bind_param("s", $_POST["id"]);

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $check_limit[0]["limit"] = $row["limit"];
    $check_limit[0]["occupancy"] = $row["occupancy"];
}

if($check_limit[0]["limit"] == $check_limit[0]["occupancy"]) {
    $error = "There is no more space";
}

if($check_limit[0]["limit"] < $check_limit[0]["occupancy"]) {
    $error = "Error 500. CONTACT THE DEVELOPER";
}

$stmt->close();

$stmt = $conn->prepare("call get_user(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();

$username = "";
$role = "";

while ($row = $result->fetch_assoc()) {
    $username = $row["username"];
    $role = $row["role"];
}

$stmt->close();

$stmt = $conn->prepare("call check_duplicated_assignment(?,?)");

$stmt->bind_param("ss", $_SESSION["access-token"], $_POST["id"]);

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if($result->num_rows > 0) {
    $error = "Error 500";
}

if ($role != "student") {
    $error = "Error 403";
}

if (empty($_POST["id"]) || empty($_POST["request"])) {
    $error = "Error 400";
}

if (!empty($error)) {
    header("Location: ../search.php?error=" . $error);
} else {
    $stmt = $conn->prepare("call check_duplicated_inbox(?,?)");

    $stmt->bind_param("ss", $_SESSION["access-token"], $_POST["id"]);

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($_POST["request"] === "true") {
        if ($result->num_rows == 1) {
            header("Location: ../search.php?error=1-400");
        } else if ($result->num_rows == 0) {
            $stmt = $conn->prepare("call add_inbox(?,?)");

            $stmt->bind_param("ss", $_SESSION["access-token"], $_POST["id"]);

            if ($stmt->execute()) {
                header("Location: ../search.php");
            }
        } else {
            header("Location: ../search.php?error=2-500");
        }
    } else if ($_POST["request"] === "false") {
        if ($result->num_rows == 0) {
            header("Location: ../search.php?error=3-500");
        } else if ($result->num_rows == 1) {
            $stmt = $conn->prepare("call delete_inbox_by_data(?,?)");

            $stmt->bind_param("ss", $_SESSION["access-token"], $_POST["id"]);

            if ($stmt->execute()) {
                header("Location: ../search.php");
            }
        } else {
            header("Location: ../search.php?error=4-400");
        }
    } else {
        header("Location: ../search.php?error=Error 5-500");
    }
}
