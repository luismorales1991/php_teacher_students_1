<?php
$has_inbox = false;
if (isset($conn) && $role == "teacher") {
    $stmt = $conn->prepare("call get_inbox_from_teacher(?)");

    $stmt->bind_param("s", $_SESSION["access-token"]);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows>0) {
        $has_inbox = true;
    }
    $stmt->close();
}
?>
<div class="overlay disable" id="vertical-overlay"></div>
<div class="vertical-main-menu-f a-dk" id="vertical-main-menu">
    <div id="x-button-vertical-menu-div">
        <button id="x-button-vertical-menu" class="x-button-2" type="button"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <h2 class="logo logo-vertical">TeacherStudents</h2>
    <div class="options-vertical">
        <div class="dark-mode-btn-2">
            <input type="checkbox" id="dark-mode-2" />
            <div class="center-flex dark-mode-2-cont ov-au">
                <label class="f-left" for="dark-mode-2">
                    <div class="dark-mode-2-div a-dk">
                        <span class="dark-btn-2 a-dk"></span>
                    </div>
                </label>
                <span class="f-left text">Dark Mode</span>
            </div>
        </div>

        <div class="upper-options" style="margin-top: 20px">
            <?php if ($role == "student") { ?>
                <a class="vertical-options <?php if ($active_vertical == 1) echo "active"; ?> a-dk v-o-fa" href="main-menu.php"><i class="vertical-options-icon vertical-options-icon-fa fa-solid fa-table-list"></i> My Grades</a>
                <a class="vertical-options <?php if ($active_vertical == 2) echo "active"; ?> a-dk v-o-gg" href="search.php"><span class="vertical-options-icon vertical-options-icon-gg material-icons-outlined">search</span> Search</a>
                <a class="vertical-options <?php if ($active_vertical == 3) echo "active"; ?> a-dk v-o-fa" href="stats.php"><i class="vertical-options-icon vertical-options-icon-fa fa-solid fa-chart-pie"></i> Stats</a>
            <?php } else if ($role == "teacher") { ?>
                <a class="vertical-options <?php if ($active_vertical == 1) echo "active"; ?> a-dk v-o-fa" href="main-menu.php"><i class="vertical-options-icon vertical-options-icon-fa fa-solid fa-people-group"></i> My Students</a>
                <a class="vertical-options <?php if ($active_vertical == 4) echo "active"; ?> a-dk v-o-gg" href="inbox.php">
                    <div style="float: left; position:relative">
                        <span class="vertical-options-icon vertical-options-icon-gg material-icons-outlined">inbox</span>
                        <?php if ($active_vertical != 4 && $has_inbox === true) {?>
                            <div class="center-flex circle-notification-1 circle-notification"><?= $result->num_rows ?></div>
                        <?php } ?>
                    </div>
                    <span style="float: left; transform: translate(5px,9px)">
                        Inbox
                    </span>
                </a>
                <a class="vertical-options <?php if ($active_vertical == 3) echo "active"; ?> a-dk v-o-fa" href="stats.php"><i class="vertical-options-icon vertical-options-icon-fa fa-solid fa-chart-pie"></i> Stats</a>
            <?php } else { ?>
                error
            <?php } ?>
        </div>

        <hr id="hr-vertical">
        <div class="lower-options">
            <a class="vertical-options <?php if ($active_vertical == 5) echo "active"; ?> a-dk v-o-gg" href="my-profile.php"><span class="vertical-options-icon vertical-options-icon-gg material-icons-outlined">account_box</span> My Profile</a>
            <a style="cursor: pointer" class="vertical-options a-dk v-o-gg" id="info-button-1"><span class="vertical-options-icon vertical-options-icon-gg material-icons-outlined">info</span> About</a>
            <a class="vertical-options a-dk v-o-fa" href="./controllers/logout.php"><i style="transform: rotate(180deg)" class="vertical-options-icon vertical-options-icon-fa fa-solid fa-arrow-right-from-bracket"></i> Log out</a>
        </div>
    </div>

</div>