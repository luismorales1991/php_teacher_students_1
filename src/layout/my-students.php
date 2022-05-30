<?php
$count = 0;
$assignments = [];

$stmt = $conn->prepare("call get_course_from_teacher(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result1 = $stmt->get_result();
$stmt->close();

$stmt = $conn->prepare("call get_assignments_from_teacher(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $assignments[$count] = [
        "username" => $row["username"],
        "unit1" => $row["unit1"],
        "unit2" => $row["unit2"],
        "unit3" => $row["unit3"],
        "unit4" => $row["unit4"]
    ];
    $count++;
}

$stmt->close();
?>

<h2 class="title-right-div a-dk h2-title-1"><i class="fa-solid fa-people-group"></i> My Students</h2>
<hr style="margin-top: 10px">
<?php if ($result1->num_rows > 0) { ?>
    <?php if (count($assignments) === 0) { ?>
        <div style="text-align: center; margin-top: 40px">
            <h2 class="a-dk to-white" style="margin-bottom: 30px">Wait for your new students! You have to accept them, check your inbox.</h2>
            <i style="display: block" id="oops-logo" class="a-dk to-white noselect fa-solid fa-clipboard-question"></i>
        </div>
    <?php } elseif (count($assignments) > 0) { ?>
        <p class="all-p-1 a-dk" style="margin-top: 10px">In order to edit a note, click on the note you want to change. If you want to unassing a student, click on the student name.</p>
        <br>
        <div style="margin-top: 10px">
            <div class="all-p-1 a-dk" style="margin-bottom: 5px">
                <span class="approved-text a-dk">Approved</span> - the student has passed the subject.
            </div>
            <div class="all-p-1 a-dk" style="margin-bottom: 5px">
                <span class="semi-approved-text a-dk">Semi Approved</span> - the student did not passed the subject but still has chance to do an extraodinary exam.
            </div>
            <div class="all-p-1 a-dk">
                <span class="not-approved-text a-dk">Not Approved</span> - the student did not passed the subject and does not have a chance to do an extraodinary exam.
            </div>
        </div>

        <div style="margin-top: 20px" class="search-div">
            <div>
                <span style="margin-right: 7px; font-weight: bold" class="a-dk all-p-1">Search:</span>
                <input class="a-dk standard-input" placeholder="Type the name" type="search">
            </div>
        </div>

        <div style="margin-top: 20px" class="table-div">
            <table class="table-1">
                <tr>
                    <th class="all-p-1 all-brd-dk a-dk">#</th>
                    <th class="all-p-1 all-brd-dk a-dk">Student</th>
                    <th class="all-p-1 all-brd-dk a-dk">Unit I</th>
                    <th class="all-p-1 all-brd-dk a-dk">Unit II</th>
                    <th class="all-p-1 all-brd-dk a-dk">Unit III</th>
                    <th class="all-p-1 all-brd-dk a-dk">Unit IV</th>
                    <th class="all-p-1 all-brd-dk a-dk">Average</th>
                </tr>
                <tbody>
                    <?php foreach ($assignments as $i => $x) { ?>
                        <tr class="a-dk">
                            <td class="tx-right all-p-1 all-brd-dk a-dk">
                                <?= $i+1 ?>
                            </td>
                            <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                            <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number a-dk edit-table-item"><?= (is_null($x["unit1"]) ? '<i class="fa-solid fa-circle-plus"></i>' : $x["unit1"]) ?></a></td>
                            <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number a-dk edit-table-item"><?= (is_null($x["unit1"]) ? '<i class="fa-solid fa-circle-plus"></i>' : $x["unit2"]) ?></a></td>
                            <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number a-dk edit-table-item"><?= (is_null($x["unit1"]) ? '<i class="fa-solid fa-circle-plus"></i>' : $x["unit3"]) ?></a></td>
                            <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number a-dk edit-table-item"><?= (is_null($x["unit1"]) ? '<i class="fa-solid fa-circle-plus"></i>' : $x["unit4"]) ?></a></td>
                            <?php

                        if (
                            is_null($x["unit1"]) &&
                            is_null($x["unit2"]) &&
                            is_null($x["unit3"]) &&
                            is_null($x["unit4"])
                        ) {
                            echo '<td class="tx-center all-p-1 all-brd-dk a-dk"><span>&mdash;</span></td>';
                        } else {
                            $average = rand(50, 100);
                            $approved = "";

                            if ($average > 69) {
                                $approved = "approved";
                            } else if ($average > 59) {
                                $approved = "semi-approved";
                            } else {
                                $approved = "not-approved";
                            }

                            echo '<td class="tx-center average-num all-p-1 all-brd-dk ' . $approved . ' a-dk"><b>' . $average . '</b></td>';
                        }
                        ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
<?php } else if ($result1->num_rows == 0) { ?>
    <div style="text-align: center; margin-top: 40px">
        <h2 class="a-dk to-white" style="margin-bottom: 30px">Whoops, looks like you haven't created your course yet!</h2>
        <span style="margin-bottom: 30px" id="oops-logo" class="noselect a-dk to-white material-symbols-outlined">
            sentiment_dissatisfied
        </span>
        <br>
        <a href="create-course.php" style="text-decoration: none;" class="button-main a-dk button" type="button">Create Course</a>
    </div>
<?php }
$conn->close(); ?>