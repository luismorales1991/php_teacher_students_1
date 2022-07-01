<?php
    if (!isset($_POST["submit"])) {
        header("Location: ../my-profile.php?panel=2&error=Error 500");
    }
    
    session_start();
    
    include_once "../../includes/db.inc.php";

    if (empty($_SESSION["access-token"])) {
        $error = "Error 400";
    }

    if (!empty($error)) {
        header("Location: ../my-profile.php?error=" . $error);
    } else {
        $stmt = $conn->prepare("call delete_my_user(?)");
    
        $stmt->bind_param("s", $_SESSION["access-token"]);
    
        if ($stmt->execute()) {
            header("Location: ./logout.php");
        } else {
            header("Location: ../my-profile.php?error=Error 500");
        }
    }
?>