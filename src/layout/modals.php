<div class="overlay disable" id="overlay-modal">
    <div class="modal-container">
        <form method="post" action="controllers/create-grade.php" id="edit-grade" class="modal">
            <div class="modal-header ov-au">
                <span style="font-size: 17px">Edit grade</span>
                <button class="x-button" type="button">x</button>
            </div>
            <hr>
            <div class="modal-body a-dk">
                <div style="font-size: 18px; margin-bottom: 15px">
                    <input type="hidden" name="id" value="" id="modal-id" />
                    <input type="hidden" name="unit" id="modal-unit-data" value="" />
                    <p><b>Unit: </b><span id="modal-unit">I</span></p>
                    <p><b>Student: </b><span id="modal-name-1"></span></p>
                </div>
                <p style="margin-bottom: 5px">Insert the new grade:</p>
                <input placeholder="0-100" name="grade" id="input-change-grade" class="a-dk w-100" type="number">
            </div>
            <div class="ov-au modal-footer a-dk">
                <div class="tx-center button-container">
                    <button type="submit" name="submit" class="modal-button button button-main">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="overlay disable" id="overlay-modal-student">
    <div class="modal-container">
        <form method="post" action="./controllers/delete-assignment.php" id="edit-student" class="modal">
            <div class="modal-header ov-au">
                <span style="font-size: 17px">Edit student</span>
                <button class="x-button" type="button">x</button>
            </div>
            <hr>
            <div class="modal-body a-dk">
                <div style="font-size: 18px; margin-bottom: 15px">
                    <p><b>Student: </b>Sam Smith</p>
                </div>
            </div>
            <div class="ov-au modal-footer a-dk">
                <div class="tx-center button-container">
                    <input type="hidden" id="modal-id-2" name="id">
                    <button class="modal-button button button-red-1">Unassign</button>
                </div>
            </div>
        </form>
    </div>
</div>