<?php
$count = 0
?>
<h2 class="title-right-div a-dk h2-title-1"><i class="fa-solid fa-people-group"></i> My Students</h2>
<hr style="margin-top: 10px">
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
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="all-p-1 all-brd-dk a-dk"><a class="student-table-name edit-table-item">Sara Smith</a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><a class="grade-number edit-table-item"><?php echo rand(50, 100) ?></a></td>
                <?php
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
                ?>
            </tr>
        </tbody>
    </table>
</div>