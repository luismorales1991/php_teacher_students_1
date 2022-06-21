<?php
$count = 0;

$stmt = $conn->prepare("call get_inbox_from_teacher(?)");

$stmt->bind_param("s", $_SESSION["access-token"]);

$stmt->execute();
$result = $stmt->get_result();
$inboxes = [];

$count = 0;
while ($row = $result->fetch_assoc()) {
    $inboxes[$count] = [
        "student_id" => $row["user_id"],
        "course" => $row["id_course"],
        "username" => $row["username"],
        "create_time" => $row["create_time"]
    ];
    $count++;
}
$stmt->close();
?>
<h2 class="title-right-div a-dk h2-title-1"><span class="icon-title-h2-1 material-icons-outlined">inbox</span> Inbox</h2>
<hr style="margin-top: 10px">
<?php if (count($inboxes) > 0) { ?>
    <p class="all-p-1 a-dk" style="margin-top: 10px">Here is the people who wants to join to your class. You can accept them or reject them.</p>
    <div style="margin-top: 20px" class="table-div">
        <table class="table-1">
            <tr>
                <th class="all-p-1 all-brd-dk a-dk">#</th>
                <th class="all-p-1 all-brd-dk a-dk">Student</th>
                <th class="all-p-1 all-brd-dk a-dk">Date</th>
                <th class="all-p-1 all-brd-dk a-dk"></th>
                <th class="all-p-1 all-brd-dk a-dk"></th>
            </tr>
            <tbody>
                <?php foreach ($inboxes as $i => $x) { ?>
                    <tr class="a-dk">
                        <td class="tx-right all-p-1 all-brd-dk a-dk">
                            <?= $i + 1 ?>
                        </td>
                        <td class="all-p-1 all-brd-dk a-dk"><?= $x["username"] ?></td>
                        <td class="all-p-1 all-brd-dk a-dk"><?= $x["create_time"] ?></td>
                        <td class="all-p-1 all-brd-dk a-dk">
                            <form action="./controllers/create-assignment.php" method="post">
                                <input type="hidden" name="course" value="<?= $x["course"] ?>">
                                <input type="hidden" name="student" value="<?= $x["student_id"] ?>">
                                <button type="submit" name="submit" class="button accept-button">Accept</button>
                            </form>
                        </td>
                        <td class="all-p-1 all-brd-dk a-dk">
                            <form action="./controllers/delete-inbox.php" method="post">
                                <input type="hidden" name="course" value="<?= $x["course"] ?>">
                                <input type="hidden" name="student" value="<?= $x["student_id"] ?>">
                                <button type="submit" name="submit" class="button reject-button">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } elseif (count($inboxes) === 0) { ?>
    <div style="text-align: center; margin-top: 40px">
        <h2 class="title-error-layouts-1 a-dk to-white" style="margin-bottom: 30px">Looks like you don't have requests. I think it's just a matter of time...</h2>
        <i style="display: block" id="oops-logo" class="a-dk to-white noselect fa-solid fa-umbrella"></i>
    </div>
<?php } ?>