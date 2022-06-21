<?php
include_once "../../includes/db.inc.php";
date_default_timezone_set("America/Guatemala");

$stmt = $conn->prepare("call get_num_assignments_per_date()");

$stmt->execute();
$result = $stmt->get_result();

$r = [];

for ($i=0; $i < 7; $i++) { 
    $r[$i]["name"] = date("M-d",strtotime("-".$i." Days"));
    $r[$i]["num"] = 0;
}

function checkDateHasData($arr, $date) {
    foreach ($arr as $i => $x) {
        if(date("M-d",strtotime($date)) == $x["name"]) return $i;
    }
    return;
}

$returndates = function($x) {
    return $x["name"];
};


$count = 0;
while ($row = $result->fetch_assoc()) {
    if(!is_null(checkDateHasData($r,$row["date"]))) $r[checkDateHasData($r,$row["date"])]["num"] = $row["num"];
    $count++;
}

echo json_encode(array_reverse($r));
$conn->close();