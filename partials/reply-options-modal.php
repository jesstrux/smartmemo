<div id="replyOptions" class="modal alert">
    <div class="modal-content">
        <div class="modal-title">Pick An Option</div>
        <div class="modal-body">
            <div class="option-item" onclick="closeModal('replyOptions'); sendReply(0)">
                <div class="icon" style="background: #2fb92f;">
                    <i class="zmdi zmdi-check"></i>
                </div>
                <p class="flex text-">Approve</p>
            </div>

            <div class="option-item" onclick="closeModal('replyOptions'); sendReply(0)">
                <div class="icon layout center-center" style="background: #e83c3d;">
                    <i class="zmdi zmdi-close"></i>
                </div>
                <p class="flex text-">Decline</p>
            </div>

            <div class="option-item full" onclick="closeModal('replyOptions'); openModal('writeReply');">
                <i class="zmdi zmdi-edit"></i> &emsp;&nbsp;
                <p class="text-">Write A Comment</p>
            </div>
        </div>
    </div>
</div>