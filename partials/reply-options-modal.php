<style>
    
</style>
<div id="replyOptions" class="modal sm">
    <div class="modal-content" style="min-width: 260px; padding-bottom: 0; padding-top: 0;">
        <div class="modal-title">Pick An Option</div>
        <div class="modal-body" style="padding: 0;">
            <div class="layout center" onclick="closeModal('replyOptions'); sendReply(0)" style="padding: 0.5em 1em">
                <div class="layout center-center" style="position: relative; background: #2fb92f; margin-right: 12px; width: 40px; height: 40px; border-radius: 50px;">
                    <i class="zmdi zmdi-check"></i>
                </div>
                <p class="flex text-">Approve</p>
            </div>

            <div class="layout center" onclick="closeModal('replyOptions'); sendReply(0)" style="padding: 0.5em 1em">
                <div class="layout center-center" style="position: relative; background: #e83c3d; margin-right: 12px; width: 40px; height: 40px; border-radius: 50px;">
                    <i class="zmdi zmdi-close"></i>
                </div>
                <p class="flex text-">Decline</p>
            </div>

            <div class="layout center-center" onclick="closeModal('replyOptions'); openModal('writeReply');"
            style="background: black; color: #fff; padding: 1em;">
                <i class="zmdi zmdi-edit"></i> &emsp;&nbsp;
                <p class="text-">Write A Comment</p>
            </div>
        </div>
    </div>
</div>