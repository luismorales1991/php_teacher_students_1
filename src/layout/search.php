<?php
$count = 0;

$stmt = $conn->prepare("call get_all_courses()");

$stmt->execute();
$result = $stmt->get_result();

$courses = [];
$inbox = [];
$ass = [];
$sames = [];
$indexes_1 = [];

$username = "";
$role = "";

$noc = false;

if ($result->num_rows == 0) {
    $noc = true;
};

$count = 0;
while ($row = $result->fetch_assoc()) {
    $courses[$count] = [
        "id" => $row["id"],
        "name" => $row["name"],
        "description" => $row["description"],
        "limit" => $row["limit"],
        "banner" => $row["banner"],
        "username" => $row["username"],
        "occupancy" => $row["occupancy"]
    ];
    $count++;
}

$stmt->close();

$stmt = $conn->prepare("call get_assignment_from_student(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();

$count = 0;
while ($row = $result->fetch_assoc()) {
    $ass[$count] = $row["course_id"];
    $count++;
}

$stmt->close();

$count = 0;
for ($i = 0; $i < count($courses); $i++) {
    for ($j = 0; $j < count($ass); $j++) {
        if ($courses[$i]["id"] == $ass[$j]) {
            $sames[$count] = $i;
            $count++;
        }
    }
}

$count = 0;
for ($l = 0; $l < 2; $l++) {
    for ($i = 0; $i < count($courses); $i++) {
        switch ($l) {
            case 0:
                if (in_array($i, $sames)) {
                    $indexes_1[$count] = $courses[$i];
                    $count++;
                }
                break;
            case 1:
                if (!in_array($i, $sames)) {
                    $indexes_1[$count] = $courses[$i];
                    $count++;
                }
                break;
        }
    }
}

$stmt = $conn->prepare("call get_courses_inbox_with_student(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);
$stmt->execute();
$result = $stmt->get_result();

$count = 0;
while ($row = $result->fetch_assoc()) {
    $inbox[$count] = $row["course_id"];
    $count++;
}

$stmt->close();
?>
<h2 class="title-right-div a-dk h2-title-1"><span class="icon-title-h2-1 material-icons-outlined">search</span> Search</h2>
<hr style="margin-top: 10px">

<?php if ($noc == false) { ?>
    <p class="all-p-1 a-dk" style="margin-top: 10px">Explore all the courses available to be assigned. You can be assigned to a maximum of 10 courses. By clicking the "Request" button, the teacher will be able to see your request and they will decide if he accepts you or not.</p>
    <br>
    <div>
        <div style="margin-top: 20px" class="search-div">
            <div>
                <span style="margin-right: 7px; font-weight: bold" class="a-dk all-p-1">Search:</span>
                <input class="a-dk standard-input" id="search-input" placeholder="Type the name" type="search">
            </div>
        </div>
        <hr style="margin: 20px 0">
        <div class="flex-layout-3-1 grid-gap-1">

            <?php
            foreach ($indexes_1 as $x) {
                $requested = false;
                $assigned = false;
            ?>
                <div class="box-cont-1 search-element">
                    <div>
                        <img src="<?= $x["banner"] ?>" class="image-course-search" />
                    </div>
                    <div style="padding: 20px">
                        <?php foreach ($ass as $z) { ?>
                            <?php if ($x["id"] == $z) { ?>
                                <div style="margin-bottom: 10px">
                                    <span class="to-white a-dk"><i style="color: #6ab04c" class="fa-solid fa-check"></i> You are assigned</span>
                                </div>
                            <?php $assigned = true;
                            } ?>
                        <?php } ?>

                        <div class="to-white a-dk" style="margin-bottom: 10px">
                            <?= $x["occupancy"] ?>/<?= $x["limit"] ?><br />
                        </div>
                        <div>
                            <h3 class="to-white a-dk search-filter" style="margin-bottom: 10px"><?= $x["name"] ?></h3>
                            <div style="margin-bottom: 10px">
                                <b class="to-white a-dk">by: </b><span class="to-white a-dk"><?= $x["username"] ?></span>
                            </div>
                            <p class="to-white a-dk" style="margin-bottom: 10px"><?= $x["description"] ?></p>
                        </div>
                        <div style="margin-bottom: 10px">
                            <button class="view-more to-white a-dk"><i class="fa-solid fa-angle-down"></i> View More</button>
                        </div>
                        <form action="controllers/<?php echo ($assigned === true) ? "delete-assign.php" : "create-inbox.php" ?>" method="post">
                            <input type="hidden" name="id" value="<?= $x["id"] ?>">
                            <div class="tx-center">
                                <?php foreach ($inbox as $y) { ?>
                                    <?php if ($x["id"] == $y) {
                                        $requested = true;
                                    } ?>
                                <?php } ?>
                                <?php if ($assigned === true) { ?>
                                    <button name="submit" type="submit" class="button reject-button">Unassing</button>
                                <?php } elseif ($requested === false) { ?>
                                    <input type="hidden" name="request" value="true">
                                    <button name="submit" type="submit" class="button accept-button">Request</button>
                                <?php } elseif ($requested === true) { ?>
                                    <input type="hidden" name="request" value="false">
                                    <button name="submit" type="submit" class="a-dk button done-button">Requested</button>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }
            $conn->close()
            ?>
        </div>
    </div>
<?php } else { ?>
    <div style="text-align: center; margin-top: 40px">
        <h2 class="a-dk to-white" style="margin-bottom: 30px">Sorry, no courses created yet!</h2>
        <i style="display: block" id="oops-logo" class="a-dk to-white noselect fa-solid fa-baby-carriage"></i>
    </div>
<?php } ?>


<div id="not-found-banner" style="text-align: center; margin-top: 20px; display: none">
    <h2 class="a-dk to-white" style="margin-bottom: 20px">Course not found :(</h2>
    <i style="display: block" id="oops-logo" class="a-dk to-white noselect fa-solid fa-heart-crack"></i>
</div>
<script src="./js/search.js"></script>