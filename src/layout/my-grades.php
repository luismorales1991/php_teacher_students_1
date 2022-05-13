<?php
$count = 0
?>
<h2 class="title-right-div a-dk h2-title-1"><i class="fa-solid fa-table-list"></i> My Grades</h2>
<hr style="margin-top: 10px">
<p class="all-p-1 a-dk" style="margin-top: 10px">These are your current courses. The grades are set by your teacher. If you want to unassing from a course, click on "Unassing".</p>
<br>

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
            <tr class="a-dk">
                <td class="tx-right all-p-1 all-brd-dk a-dk">
                    <?php
                    $count++;
                    echo $count;
                    ?>
                </td>
                <td class="tx-center all-p-1 all-brd-dk a-dk">Mathematics</td>
                <td class="tx-center all-p-1 all-brd-dk a-dk">Sam Smith</td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo rand(50, 100) ?></span></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo rand(50, 100) ?></span></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo rand(50, 100) ?></span></td>
                <td class="tx-center all-p-1 all-brd-dk a-dk"><span><?php echo rand(50, 100) ?></span></td>
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
                <td class="tx-center all-p-1 all-brd-dk a-dk"><button class="button reject-button">Unassing</button></td>
            </tr>
        </tbody>
    </table>
</div>