<?php
if (!isset($_POST["submit"])) {
    header("Location: ../inbox.php?error=Error 500");
}

session_start();

include_once "../../includes/db.inc.php";

if (empty($_POST["course"]) || empty($_POST["student"])) {
    $error = "Error 400";
}

if (!empty($error)) {
    header("Location: ../create-course.php?error=" . $error);
} else {
    $stmt = $conn->prepare("call delete_inbox_by_data(?,?)");

    $stmt->bind_param("ss", $_POST["student"], $_POST["course"]);

    if ($stmt->execute()) {
        $stmt->close();
        $stmt = $conn->prepare("call add_assignment(?,?)");

        $stmt->bind_param("ss", $_POST["course"], $_POST["student"]);

        if ($stmt->execute()) {
            header("Location: ../inbox.php?success=User Assigned");
        } else {
            header("Location: ../inbox.php?error=Error 500");
        }
    } else {
        header("Location: ../inbox.php?error=Error 500");
    }
}
