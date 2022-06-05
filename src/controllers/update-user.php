<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_SESSION["access-token"])) {
    header("Location: ../my-profile.php?error=Error 403");
}

include_once "../../includes/db.inc.php";

$user = str_replace(" ", "", $_POST["username"]);
$gender = $_POST["gender"];
$email = str_replace(" ", "", $_POST["email"]);
$phone = str_replace(" ", "", $_POST["phone"]);

$verify = true;
$verify_2 = true;
$error_name = "";
$error_name_2 = "";

if(empty($user) || empty($gender) || empty($gender) || empty($email)) {
    $empty_name = "Empty rows";
    $verify = false;
}

if (strlen($user) < 4 || strlen($user) > 16) {
    $error_name = "The username must contain 4 to 16 characters";
    $verify = false;
}

if ($gender !== "male") {
    if ($gender !== "female") {
        if ($gender !== "other") {
            $error_name = "An error occurred while uploading the information";
            $verify = false;
        }
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_name = "The email is invalid";
    $verify = false;
}

if (strlen($email) > 30) {
    $error_name = "The email address is too long";
    $verify = false;
}

if (strlen($phone) !== 10) {
    $error_name = "The phone number is invalid";
    $verify = false;
}

if ($verify === false) {
    header("Location: ../my-profile.php?error=$error_name");
} else if ($verify === true) {
    if ($verify_2 == false) {
        header("Location: ../my-profile.php?error=$error_name_2");
    } else if ($verify_2 = true) {
        $stmt = $conn->prepare("call edit_user(?,?,?,?,?)");

        $stmt->bind_param("sssss",$_SESSION["access-token"] ,$user, $email, $phone, $gender);

        if ($stmt->execute()) {
            header("Location: ../my-profile.php?message=success");
        }

        $stmt->close();
    }
}
$conn->close();