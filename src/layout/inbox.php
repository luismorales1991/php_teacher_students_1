<?php
$count = 0
?>
<h2 class="title-right-div a-dk h2-title-1"><span class="material-icons-outlined">inbox</span> Inbox</h2>
<hr style="margin-top: 10px">
<p class="all-p-1 a-dk" style="margin-top: 10px">Here is the people who wants to join to your class. You can accept them or reject them.</p>
<div style="margin-top: 20px" class="table-div">
    <table class="table-1">
        <tr>
            <th class="all-p-1 all-brd-dk a-dk">#</th>
            <th class="all-p-1 all-brd-dk a-dk">Name</th>
            <th class="all-p-1 all-brd-dk a-dk">Date</th>
            <th class="all-p-1 all-brd-dk a-dk"></th>
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
                <td class="all-p-1 all-brd-dk a-dk">Sam Smith</td>
                <td class="all-p-1 all-brd-dk a-dk">08/08/2003</td>
                <td class="all-p-1 all-brd-dk a-dk"><button class="button accept-button">Accept</button></td>
                <td class="all-p-1 all-brd-dk a-dk"><button class="button reject-button">Reject</button></td>
            </tr>
        </tbody>
</div>