<?php
$count = 0;

$stmt = $conn->prepare("call get_all_courses()");

$stmt->execute();
$result = $stmt->get_result();

$courses = [];
$inbox = [];
$ass = [];

$username = "";
$role = "";

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
?>
<h2 class="title-right-div a-dk h2-title-1"><span class="icon-title-h2-1 material-icons-outlined">search</span> Search</h2>
<hr style="margin-top: 10px">
<p class="all-p-1 a-dk" style="margin-top: 10px">Explore all the courses available to be assigned. You can be assigned to a maximum of 10 courses. By clicking the "Request" button, the teacher will be able to see your request and they will decide if he accepts you or not.</p>
<br>
<div>
    <div style="margin-top: 20px" class="search-div">
        <div>
            <span style="margin-right: 7px; font-weight: bold" class="a-dk all-p-1">Search:</span>
            <input class="text-input-dark-1 a-dk standard-input" ng-model="search" placeholder="Type the name" type="search">
        </div>
    </div>
    <hr style="margin: 20px 0">
    <div class="flex-layout-3-1 grid-gap-1">

        <?php
        foreach ($courses as $x) {
            $requested = false;
            $assigned = false;
        ?>
            <div class="box-cont-1">
                <div>
                    <img src="<?= $x["banner"] ?>" style="width: 100%" />
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
                        <h3 class="to-white a-dk" style="margin-bottom: 10px"><?= $x["name"] ?></h3>
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
<script>

</script>