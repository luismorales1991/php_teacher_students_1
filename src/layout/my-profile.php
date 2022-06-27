<?php
$stmt = $conn->prepare("call get_course_from_teacher(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result1 = $stmt->get_result();

$name = "";
$desc = "";
$lt = "";
$bn = "";
$oc = "";

while ($row = $result1->fetch_assoc()) {
    $id = $row["id"];
    $name = $row["name"];
    $desc = $row["description"];
    $lt = $row["limit"];
    $bn = $row["banner"];
    $oc = $row["occupancy"];
}

$stmt->close();

$images = [
    "https://g2z7g2s8.rocketcdn.me/wp-content/uploads/2020/09/hacer-Classroom-3-1024x732.jpg",
    "https://img.blogs.es/anexom/wp-content/uploads/2020/12/Google-Classroom-que-es.jpg",
    "https://eitrawmaterials.eu/wp-content/uploads/2019/05/Label-brochure-1.jpg",
    "https://cdn.ila-france.com/wp-content/uploads/2015/02/our-students.jpg",
    "https://www.thoughtco.com/thmb/hQC8gjfZ4Rd421J4i3UeRwr6eZY=/3865x2576/filters:fill(auto,1)/teenage-students-in-classroom--141090063-5a653ed40c1a8200366bdd66.jpg",
    "https://myviewboard.com/products/classroom/images/og.jpg",
    "https://www.teacheracademy.eu/wp-content/uploads/2020/02/english-classroom.jpg"
];
?>

<h2 class="title-right-div a-dk h2-title-1"><span class="icon-title-h2-1 material-icons-outlined">account_box</span> My Profile</h2>
<hr style="margin-top: 10px">

<div class="center-flex">
    <?php if (!isset($_GET["panel"]) || $_GET["panel"] != 2) { ?>

        <div style="margin-top: 20px" class="form-content-2 box-cont-1 cont-profile">
            <?php if ($role == "teacher") { ?>
                <div class="vertical-menu-2">
                    <a class="vertical-options-2 <?= (!isset($_GET["panel"]) || $_GET["panel"] != 2 ? "active" : "") ?>" href="?panel=1">My User</a>
                    <a class="vertical-options-2 a-dk to-white <?= (isset($_GET["panel"]) && $_GET["panel"] == 2 ? "active" : "") ?>" href="?panel=2">My Course</a>
                </div>
                <hr style="margin: 20px 0">
            <?php } ?>
            <div style="margin: 30px 0" class="tx-center">
                <div class="center-flex">
                    <div class="center-flex user-circle">
                        <i class="profile-logo fa-solid <?php if ($role == "teacher") echo "fa-chalkboard-user";
                                                        if ($role == "student") echo "fa-user-graduate"; ?>"></i>
                    </div>
                </div>
                <div style="margin-top: 15px">
                    <h3 class="a-dk to-white"><?php if ($role == "teacher") echo "Teacher";
                                                if ($role == "student") echo "Student"; ?></h3>
                </div>
            </div>

            <form class="form-element" action="./controllers/delete-user.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" name="submit" class="button reject-button"><i class="fa-solid fa-trash"></i> Delete User</button>
            </form>
            <form action="./controllers/update-user.php" method="post">
                <?php if (isset($_GET["error"])) { ?>
                    <div class="form-element">
                        <div style="font-size: 0.9rem" class="a-dk panel-error"><?= $_GET["error"] ?></div>
                    </div>
                <?php  } else if (isset($_GET["message"]) && $_GET["message"] === "success") { ?>
                    <div class="form-element">
                        <div style="font-size: 0.9rem" class="a-dk panel-success">User updated successfully!</div>
                    </div>
                <?php  } ?>
                <div style="margin-top: 20px">
                    <h5 class="a-dk to-white">Username:</h5>
                    <input class="a-dk w-100" required="required" type="text" name="username" placeholder="Username" value="<?= $username  ?>">
                </div>
                <div style="margin-top: 20px">
                    <h5 class="a-dk to-white">Email:</h5>
                    <input class="a-dk w-100" required="required" type="email" name="email" placeholder="example@domain.com" value="<?= $email  ?>">
                </div>
                <div style="margin-top: 20px">
                    <h5 class="a-dk to-white">Gender:</h5>
                    <select required="required" class="a-dk w-100" name="gender">
                        <option <?= $gender == "male" ? 'selected="selected"' : "" ?> value="male">Male</option>
                        <option <?= $gender == "female" ? 'selected="selected"' : "" ?> value="female">Female</option>
                        <option <?= $gender == "other" ? 'selected="selected"' : "" ?> value="other">Other</option>
                    </select>
                </div>
                <div style="margin-top: 20px">
                    <h5 class="a-dk to-white">Phone:</h5>
                    <input required="required" id="input-phone" class="a-dk w-100" type="text" name="phone" placeholder="+1(xxx)xxx-xxx" value="<?= $phone  ?>">
                </div>
                <div class="tx-center" style="margin-top: 20px">
                    <button type="submit" name="submit" class="button button-main">Save changes</button>
                </div>
            </form>
        </div>
    <?php } elseif ($_GET["panel"] == 2 && $role == "teacher") { ?>
        <div class="form-content-2 box-cont-1 p-40 cont-profile" style="margin-top: 20px">
            <div class="vertical-menu-2">
                <a class="vertical-options-2 a-dk to-white <?= (!isset($_GET["panel"]) || $_GET["panel"] != 2 ? "active" : "") ?>" href="?panel=1">My User</a>
                <a class="vertical-options-2 <?= (isset($_GET["panel"]) && $_GET["panel"] == 2 ? "active" : "") ?>" href="?panel=2">My Course</a>
            </div>
            <hr style="margin: 20px 0">
            <?php if ($result1->num_rows > 0) { ?>
                <div>
                    <img class="w-100 banner-1" src="<?= $bn ?>">
                </div>
                <form class="form-element" action="./controllers/delete-course.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" name="submit" class="button reject-button"><i class="fa-solid fa-trash"></i> Delete Course</button>
                </form>
                <form method="post" action="./controllers/update-course.php">
                    <?php if (isset($_GET["error"])) { ?>
                        <div class="form-element">
                            <div style="font-size: 0.9rem" class="a-dk panel-error"><?= $_GET["error"] ?></div>
                        </div>
                    <?php  } else if (isset($_GET["message"]) && $_GET["message"] === "success") { ?>
                        <div class="form-element">
                            <div style="font-size: 0.9rem" class="a-dk panel-success">Course updated successfully!</div>
                        </div>
                    <?php  } ?>
                    <div style="margin-top: 20px">
                        <button id="change-banner-button" type="button" class="w-100 a-dk input-standard-2">Change banner <i id="change-banner-icon" class="fa-solid fa-angle-down"></i></button>
                        <div class="change-banner-container a-dk grid-gap-2 grid-2-1">
                            <?php foreach ($images as $i => $x) { ?>
                                <label class="change-banner-label" for="image-<?= $i ?>">
                                    <img class="change-banner-banner w-100" src="<?= $x ?>">
                                    <input <?= $x == $bn ? "checked" : "" ?> class="change-banner-input" value="<?= $x ?>" type="radio" name="banner" id="image-<?= $i ?>">
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div style="margin-top: 20px">
                        <h5 class="a-dk to-white">Course name:</h5>
                        <input class="a-dk w-100" required="required" type="text" name="course" placeholder="Course name" value="<?= $name ?>">
                    </div>
                    <div style="margin-top: 20px">
                        <h5 class="a-dk to-white">Limit:</h5>
                        <span><?= $oc ?> / </span><input class="a-dk" size="2" maxlength="2" required="required" type="text" name="occupancy" placeholder="1-30" value="<?= $lt ?>">
                    </div>
                    <div style="margin-top: 20px">
                        <h5 class="a-dk to-white">Description:</h5>
                        <textarea required placeholder="1-100" name="description" class="a-dk form-input-text" rows="10"><?= $desc ?></textarea>
                    </div>
                    <div class="tx-center" style="margin-top: 20px">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="submit" class="button button-main">Save changes</button>
                    </div>
                </form>
            <?php } elseif ($result1->num_rows == 0) { ?>
                <div class="tx-center">
                    <h2 class="a-dk to-white">Time to create your own course!</h2>
                </div>
                <div class="tx-center" style="margin-top: 25px">
                    <i id="oops-logo-2" class="a-dk to-white fa-solid fa-bolt"></i>
                </div>
                <div class="tx-center" style="margin-top: 30px">
                    <a style="display: inline-block;text-decoration: none" href="create-course.php?rdt=1" class="button button-main">Create Course</a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>