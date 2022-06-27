<?php
session_start();
if (!isset($_POST["submit"]) || !isset($_SESSION["access-token"])) {
    header("Location: ../my-profile.php?error=Error 403");
}

include_once "../../includes/db.inc.php";

$q_username = "";
$q_email = "";

$user = str_replace(" ", "", $_POST["username"]);
$gender = $_POST["gender"];
$email = str_replace(" ", "", $_POST["email"]);
$phone = str_replace(" ", "", $_POST["phone"]);

$verify = true;
$error_name = "";

if (empty($user) || empty($gender) || empty($gender) || empty($email)) {
    $empty_name = "Empty rows";
    $verify = false;
}

$stmt = $conn->prepare("call get_user(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $q_username = $row["username"];
    $q_email = $row["email"];
}

$stmt->close();

if ($q_username != $user) {
    $stmt = $conn->prepare("call check_duplicated_username(?)");

    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $verify = false;
        $error_name = "The username is already used";
    }
}

if ($q_email != $email) {
    $stmt = $conn->prepare("call check_duplicated_email(?)");

    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        $verify = false;
        $error_name = "The email is already used";
    }
}

if (
    !preg_match("/^[a-zA-Z0-9]*$/", $user) ||
    !preg_match("/^[a-zA-Z0-9]*$/", $gender) ||
    !preg_match("/^[0-9]*$/", $phone)
) {
    $error_name = "Invalid characters";
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
    $stmt = $conn->prepare("call edit_user(?,?,?,?,?)");

    $stmt->bind_param("sssss", $_SESSION["access-token"], $user, $email, $phone, $gender);

    if ($stmt->execute()) {
        header("Location: ../my-profile.php?message=success");
    }

    $stmt->close();
}
$conn->close();
