<?php
session_start();

include("../includes/db.inc.php");

$active_vertical = 5;
$html_title = "My Profile";

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
    $email = $row["email"];
    $gender = $row["gender"];
    $phone = $row["phone"];
}

$stmt->close();

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
        include("./layout/my-profile.php");
        ?>

    </div>
</div>

<script src="../node_modules/cleave.js/dist/cleave.min.js"></script>
<script src="../node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
<script src="js/my-profile.js"></script>
<?php
include("./layout/footer.php");
$conn->close();
?>