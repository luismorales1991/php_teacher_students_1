<?php
if (!isset($_POST["submit"])) {
    header("Location: ../signup.php");
}

include_once "../includes/db.inc.php";

$user = str_replace(" ", "", htmlentities($_POST["username"]));
$pwd = str_replace(" ", "", htmlentities($_POST["pwd"]));
$c_pwd = str_replace(" ", "", htmlentities($_POST["c-pwd"]));
$role = htmlentities($_POST["role"]);
$gender = htmlentities($_POST["gender"]);
$email = str_replace(" ", "", htmlentities($_POST["email"]));
$phone = str_replace(" ", "", htmlentities($_POST["phone"]));

$verify = true;
$verify_2 = true;
$error_name = "";
$error_name_2 = "";

if (
    empty($user) || (empty($pwd)) || (empty($c_pwd))
    || (empty($role)) || (empty($gender)) || (empty($email))
    || (empty($phone))
) {
    $error_name = "You must fill all the boxes";
    $verify = false;
}

if (
    !preg_match("/^[a-zA-Z0-9]*$/", $role) ||
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

if (strlen($pwd) < 4 || strlen($pwd) > 30) {
    $error_name = "The username must contain 4 to 30 characters";
    $verify = false;
}

if ($pwd !== $c_pwd) {
    header("Location: ../signup.php?error=Passwords don't match");
    $verify = false;
}

if ($role !== "student") {
    if ($role !== "teacher") {
        $error_name = "An error occurred while uploading the information";
        $verify = false;
    }
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
    header("Location: ../signup.php?error=$error_name");
} else if ($verify === true) {

    $stmt = $conn->prepare("call check_duplicated_username(?)");

    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $verify_2 = false;
        $error_name_2 = "The username already exists";
    }

    $stmt = $conn->prepare("call check_duplicated_email(?)");

    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $verify_2 = false;
        $error_name_2 = "The email is already used";
    }

    $stmt->close();

    if ($verify_2 == false) {
        header("Location: ../signup.php?error=$error_name_2");
    } else if ($verify_2 = true) {
        $stmt = $conn->prepare("call signup(?,?,?,?,?,?)");

        $stmt->bind_param("ssssss", $user, $pwd, $email, $phone, $role, $gender);

        if ($stmt->execute()) {
            $stmt->close();
            $stmt = $conn->prepare("call signin(?,?)");

            $stmt->bind_param("ss", $user, $pwd);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows < 1) {
                header("Location: ../index.php?error=Username or password incorrect");
            } else if ($result->num_rows == 1) {
                $id = "";
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                }
                session_start();
                $_SESSION["access-token"] = $id;
                header("Location: ../src/main-menu.php");
            }
            $stmt->close();
        } else {
            echo "500";
        }

        $stmt->close();
    }
}
