<?php
$count = 0;

$stmt = $conn->prepare("call get_assignment_from_student(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();
$assignments = [];

while ($row = $result->fetch_assoc()) {
    $assignments[$count] = [
        "id" => $row["id"],
        "course" => $row["course"],
        "teacher" => $row["teacher"],
        "unit1" => $row["unit1"],
        "unit2" => $row["unit2"],
        "unit3" => $row["unit3"],
        "unit4" => $row["unit4"]
    ];
    $count++;
}

$stmt->close();
?>
<h2 class="title-right-div a-dk h2-title-1"><i class="fa-solid fa-table-list"></i> My Grades</h2>
<hr style="margin-top: 10px">
<?php if (count($assignments) > 0) { ?>
    <p class="all-p-1 a-dk" style="margin-top: 10px">These are your current courses. The grades are set by your teacher. If you want to unassing from a course, click on "Unassing".</p>
    <br>
    <p class="all-p-1 a-dk"><b>Note:</b> In this application, if you have less than 4 grades, the average it's still calculated as an average of 4 values.</p>
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
    <hr style="margin-top: 20px" />
    <div style="margin-top: 20px" class="table-div">
        <table class="table-1">
            <tr>
                <th class="all-p-1 all-brd-dk a-dk">#</th>
                <th class="all-p-1 all-brd-dk a-dk">Course</th>
                <th class="all-p-1 all-brd-dk a-dk">Teacher</th>
                <th class="all-p-1 all-brd-dk a-dk">Unit I</th>
                <th class="all-p-1 all-brd-dk a-dk">Unit II</th>
                <th class="all-p-1 all-brd-dk a-dk">Unit III</th>
                <th class="all-p-1 all-brd-dk a-dk">Unit IV</th>
                <th class="all-p-1 all-brd-dk a-dk">Average</th>
                <th class="all-p-1 all-brd-dk a-dk"></th>
            </tr>
            <tbody>
                <?php foreach ($assignments as $i => $x) { ?>
                    <tr class="a-dk">
                        <td class="tx-right all-p-1 all-brd-dk a-dk">
                            <?= $i + 1 ?>
                        </td>
                        <td class="all-p-1 all-brd-dk a-dk"><?= $x["course"] ?></td>
                        <td class="tx-center all-p-1 all-brd-dk a-dk"><?= $x["teacher"] ?></td>
                        <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo (is_null($x["unit1"]) ? "&mdash;" : $x["unit1"]) ?></span></td>
                        <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo (is_null($x["unit2"]) ? "&mdash;" : $x["unit2"]) ?></span></td>
                        <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo (is_null($x["unit3"]) ? "&mdash;" : $x["unit3"]) ?></span></td>
                        <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo (is_null($x["unit4"]) ? "&mdash;" : $x["unit4"]) ?></span></td>
                        <?php

                        if (
                            is_null($x["unit1"]) &&
                            is_null($x["unit2"]) &&
                            is_null($x["unit3"]) &&
                            is_null($x["unit4"])
                        ) {
                            echo '<td class="tx-center all-p-1 all-brd-dk a-dk"><span>&mdash;</span></td>';
                        } else {
                            $average = round((intval(is_null($x["unit1"]) ? 0 : $x["unit1"]) + intval(is_null($x["unit2"]) ? 0 : $x["unit2"]) + intval(is_null($x["unit3"]) ? 0 : $x["unit3"]) + intval(is_null($x["unit4"]) ? 0 : $x["unit4"])) / 4);
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
                        <td class="tx-center all-p-1 all-brd-dk a-dk">
                            <form action="./controllers/delete-assignment.php" method="post">
                                <input type="hidden" name="id" value="<?= $x["id"] ?>">
                                <button type="submit" name="submit" class="button reject-button">Unassing</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } elseif (count($assignments) === 0) { ?>
    <div style="text-align: center; margin-top: 40px">
        <h2 class="a-dk to-white" style="margin-bottom: 30px">You are not assigned to any class. Just why?</h2>
        <i style="display: block" id="oops-logo" class="a-dk to-white noselect fa-solid fa-ghost"></i>
    </div>
<?php }  ?>