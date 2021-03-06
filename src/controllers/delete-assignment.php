<?php 
    if (!isset($_POST["submit"])) {
        header("Location: ../inbox.php?Error 500");
    }
    
    session_start();
    
    include_once "../../includes/db.inc.php";

    if($_GET["type"] == 2) {
        if (empty($_SESSION["access-token"]) || empty($_POST["id"])) {
            $error = "Error 400";
        }
    
        if (!empty($error)) {
            header("Location: ../search.php?error=" . $error);
        } else {
            $stmt = $conn->prepare("call delete_assignment_2(?,?)");
        
            $stmt->bind_param("ss", $_SESSION["access-token"], $_POST["id"]);
        
            if ($stmt->execute()) {
                header("Location: ../search.php");
            } else {
                header("Location: ../search.php?error=Error 500");
            }
        }
    } else {
        if (empty($_SESSION["access-token"]) || empty($_POST["id"])) {
            $error = "Error 400";
        }
    
        if (!empty($error)) {
            header("Location: ../main-menu.php?error=" . $error);
        } else {
            $stmt = $conn->prepare("call delete_assignment(?)");
        
            $stmt->bind_param("s", $_POST["id"]);
        
            if ($stmt->execute()) {
                header("Location: ../main-menu.php");
            } else {
                header("Location: ../main-menu.php?error=Error 500");
            }
        }
    };
?>