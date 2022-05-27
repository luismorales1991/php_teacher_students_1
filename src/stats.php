<?php
session_start();

include("../includes/db.inc.php");

$active_vertical = 3;
$html_title = "Stadistics";

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

$conn->close();

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
        <?php
        include("./layout/stats.php");
        ?>

    </div>
</div>


<?php
include("./layout/footer.php");
?>