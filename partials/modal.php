<div id="createMemo" class="modal">
    <div class="modal-content">
        <div class="modal-title">Memo Action</div>
        <form method="post">

        <div class="modal-body">
            <div class="plvr">
                <div class="form-group">
                    <input value="<?php echo $_GET['memo_id']; ?>" type="hidden" name="memoId">
                    <div class="custom-control custom-radio" style="margin: 10px;">
                        <input id="customRadio1" name="actionRadio" value="1" class="custom-control-input" type="radio">
                        <label class="custom-control-label" for="customRadio1">Approve Memo</label>

                        <input id="customRadio2" name="actionRadio" value="0" class="custom-control-input" type="radio">
                        <label class="custom-control-label" for="customRadio2">Decline Memo</label>
                    </div>
                </div>
            </div>
            <div class="input-box">
                <textarea rows="7" required class="input-control" id="body" name="body"></textarea>
                <label for="body">Response Information</label>
            </div>
        </div>
        <div class="modal-buttons">
            <button class="rounded-btn" onclick="closeModal('createMemo')">Cancel</button>
            <button class="rounded-btn btn btn-success" name="respondToMemo" type="submit">Submit</button>
        </div>
        </form>
    </div>
</div>