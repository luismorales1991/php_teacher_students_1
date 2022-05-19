<?php
if (!isset($_POST["submit"])) {
    header("Location: ../index.php");
}

include_once "../includes/db.inc.php";

$user = htmlentities($_POST["username"]);
$pwd = htmlentities($_POST["pwd"]);

echo $user;

$verify = true;
$error_name = "";

if (str_contains($user, " ")) {
    $error_name = "Don't use space";
    $verify = false;
}

if (
    empty($user) || (empty($pwd))
) {
    $error_name = "You must fill all the boxes";
    $verify = false;
}

if ($verify === false) {
    header("Location: ../index.php?error=$error_name");
} else if ($verify === true) {
    $stmt = $conn->prepare("call signin(?,?)");

    $stmt->bind_param("ss", $user, $pwd);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        header("Location: ../index.php?error=Username or password incorrect");
    } else if ($result->num_rows == 1) {
        $id = "";
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
        }
        session_start();
        $_SESSION["access-token"] = $id;
        header("Location: ../src/main-menu.php");
    }
    $stmt->close();

}
