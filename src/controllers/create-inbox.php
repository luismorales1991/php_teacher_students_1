<?php
include_once "../../includes/db.inc.php";
session_start();

$error = "";

if (!isset($_SESSION["access-token"])) {
    $error = "Error 403";
}

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

if ($role != "student") {
    $error = "Error 403";
}

if (empty($_POST["id"])) {
    $error = "Error 400";
}

if (empty($_POST["request"])) {
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
                header("Location: ../search.php?error=99");
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
                header("Location: ../search.php?error=98");
            }
        } else {
            header("Location: ../search.php?error=4-400");
        }
    } else {
        header("Location: ../search.php?error=Error 5-500");
    }
}