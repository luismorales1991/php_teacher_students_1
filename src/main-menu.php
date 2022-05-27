<?php
session_start();

$active_vertical = 1;

include("../includes/db.inc.php");

if (!isset($_SESSION["access-token"])) {
    header("Location: ../index.php");
}

$stmt = $conn->prepare("call get_user(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();

$username = "";
$role = "";

while ($row = $result->fetch_assoc()) {
    $username = $row["username"];
    $role = $row["role"];
}

$stmt->close();

$html_title = "Main Menu";

include("./layout/header.php");

include("./layout/modals.php");
?>

<div class="row-vertical">
    <div class="vertical-main-menu">
        <?php
        include("./layout/navbar-phone.php");
        ?>
        <?php
        include("./layout/vertical-menu.php");
        ?>
    </div>
    <div class="right-main-menu-div a-dk">
        <?php if ($role == "student") {
            include("./layout/my-grades.php");
        } else if ($role == "teacher") {
            include("./layout/my-students.php");
        } else {
            echo "Error";
        } ?>
    </div>
</div>


<?php
include("./layout/footer.php");
?>