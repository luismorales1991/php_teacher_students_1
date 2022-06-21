<?php
include_once "../../includes/db.inc.php";

if (!isset($_SESSION["access-token"])) {
}

$stmt = $conn->prepare("call get_num_assigned_courses()");

$stmt->execute();
$result = $stmt->get_result();

$r = [];

$count = 0;

while ($row = $result->fetch_assoc()) {
    $r[$count] = $row;
    $count++;
}

echo json_encode($r);

$stmt->close();
$conn->close();