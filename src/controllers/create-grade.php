<?php
if (!isset($_POST["submit"]) && !isset($_POST["submit-2"])) {
    header("Location: ../main-menu.php?e=2");
}

session_start();

$id = $_POST["id"];
$unit = $_POST["unit"];
$grade = $_POST["grade"];

$error = "";
$is_range = false;

include_once "../../includes/db.inc.php";


if (isset($_POST["submit"]) && isset($_POST["submit-2"])) {
    $error = "Error 400";
}

if (empty($unit) || empty($id) || !is_numeric($unit)) {
    $error = "Error 400. Try again";
}

if (isset($_POST["submit"])) {
    if ($grade === "") {
        $error = "You have to set a value";
    } elseif (!is_numeric($grade) || str_contains($grade, ".") || str_contains($grade, ",")) {
        $error = "The data is not a integer";
    } elseif ($grade < 0 || $grade > 100) {
        $error = "Number has to be between 0 and 100";
    }
}

for ($i = 0; $i <= 4; $i++) {
    if ($i == $unit) {
        $is_range = true;
    }
}

if ($is_range == false) {
    $error = "Error 400. Try again";
}

if (!empty($error)) {
    header("Location: ../main-menu.php?error=" . $error);
} else {
    if (isset($_POST["submit"])) {
        $stmt = $conn->prepare("call add_grade(?,?,?)");
        $stmt->bind_param("sii", $id, $unit, $grade);
    } elseif (isset($_POST["submit-2"])) {
        $stmt = $conn->prepare("call add_grade(?,?,541702)");
        $stmt->bind_param("si", $id, $unit);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }

    header("Location: ../main-menu.php");
}

$stmt->close();
$conn->close();