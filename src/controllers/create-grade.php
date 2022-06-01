<?php
if (!isset($_POST["submit"])) {
    header("Location: ../main-menu.php");
}

session_start();

include_once "../../includes/db.inc.php";

$id = $_POST["id"];
$unit = $_POST["unit"];
$grade = $_POST["grade"];


$error = "";
$is_range = false;

if ((empty($grade) && strlen($grade) == 0) || empty($unit) || empty($id) || !is_numeric($unit) || !is_numeric($grade)) {
    $error = "Error 400. Try again";
}

for ($i = 0; $i <= 4; $i++) {
    if ($i == $unit) {
        $is_range = true;
    }
}

if ($is_range == false) {
    $error = "Error 400. Try again";
}

if (intval($grade) < 0 || intval($grade) > 100 || !is_int(intval($grade))) {
    $error = "Error 400. Try again";
}

if (!empty($error)) {
    header("Location: ../main-menu.php?error=" . $error);
} else {
    $stmt = $conn->prepare("call add_grade(?,?,?)");

    $stmt->bind_param("sii", $id, $unit, $grade);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row["error"] == 1) {
            header("Location: ../main-menu.php?error=Error 400. Try again");
        };
    }

    header("Location: ../main-menu.php");
}

$stmt->close();
$conn->close();
