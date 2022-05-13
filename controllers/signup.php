<?php
    if(!isset($_POST["submit"])) {
        header("Location: ../signup.php");
    }

    include_once "../includes/db.inc.php";

    $user = htmlentities($_POST["username"]);
    $pwd = htmlentities($_POST["pwd"]);
    $c_pwd = htmlentities($_POST["c-pwd"]);
    $role = htmlentities($_POST["role"]);
    $gender = htmlentities($_POST["gender"]);
    $email = htmlentities($_POST["email"]);
    $phone = str_replace(" ", "", htmlentities($_POST["phone"]));

    if(empty($user) || (empty($pwd)) || (empty($c_pwd)) 
    || (empty($role)) || (empty($gender)) || (empty($email)) 
    || (empty($phone))) {
        header("Location: ../signup.php?error=You must fill all the boxes");
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/", $role) || 
    !preg_match("/^[a-zA-Z0-9]*$/", $gender) ||
    !preg_match("/^[0-9]*$/", $phone)) {
        header("Location: ../signup.php?error=Invalid characters");
    }

    if(strlen($user) < 4 || strlen($user) > 16) {
        header("Location: ../signup.php?error=The username must contain 4 to 30 characters");
    }

    if(strlen($pwd) < 4 || strlen($pwd) > 30) {
        header("Location: ../signup.php?error=The password must contain 4 to 30 characters");
    }

    if($pwd !== $c_pwd) {
        header("Location: ../signup.php?error=Passwords don't match");
    }

    if ($role !== "student") {
        if($role !== "teacher") {
            header("Location: ../signup.php?error=An error occurred while uploading the information");
        }
    }

    if ($gender !== "male") {
        if($gender !== "female") {
            if($gender !== "other") {
                header("Location: ../signup.php?error=An error occurred while uploading the information");
            }
        }
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=The email is invalid");
    }

    if(strlen($email) > 30) {
        header("Location: ../signup.php?error=The email address is too long");
    }

    if(strlen($phone) !== 10) {
        header("Location: ../signup.php?error=The phone number is invalid");
    }

    $stmt = $conn->prepare("call check_duplicated_username(?)");

    $stmt->bind_param("s",$user);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        header("Location: ../signup.php?error=The username already exists");
    }

    $stmt->close();

    $stmt = $conn->prepare("call check_duplicated_email(?)");

    $stmt->bind_param("s",$email);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        header("Location: ../signup.php?error=The email is already used");
    }

    $stmt->close();

    $stmt = $conn->prepare("call signup(?,?,?,?,?,?)");

    $stmt->bind_param("ssssss",$user,$pwd,$email,$phone,$role,$gender);

    if($stmt->execute()) {
        header("Location: ../signup.php?error=User Registered");
    }

    $stmt->close();
?>