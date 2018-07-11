<div id="writeReply" class="modal">
    <div class="modal-content">
        <div class="modal-title">Reply to Memo</div>
        <div class="modal-body">
            <div class="input-box">
                <textarea rows="7" type="text" required class="input-control" id="replyBody"></textarea>
                <label for="body">Enter your reply in here...</label>
            </div>
        </div>
        <div class="modal-buttons">
            <button class="rounded-btn" onclick="closeModal('writeReply')">Cancel</button>
            <button class="rounded-btn btn btn-success" onclick="sendResponse()">Submit</button>
        </div>
    </div>
</div>