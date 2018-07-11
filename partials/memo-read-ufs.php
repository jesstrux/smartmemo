<div id="memoReplies" style="padding: 1.5em 0.7em; border-top: 1px solid #ddd">
    <h5 class="text-regular" style="margin-bottom: 2em;letter-spacing: 1px; color: #999; font-size: 0.9em;">MEMO RESPONSES</h5>

    <?php
        foreach ($ufs as $ufs) {
            $bg_status = "#ddd";
            $status_text = "UNKNOWN";

            $status = $ufs['status'];
            if($status == 1){
                $bg_status = "green";
                $status_text = "APPROVED";
            }else if($status == 2){
                $bg_status = "red";
                $status_text = "REJECTED";
            }

            echo '
            <div class="memo-reply layout" style="margin-bottom: 22px;">
                    <div style="width: 2px; margin-right: 16px; border-radius: 3px; background: ' . $bg_status . '"></div>

                    <div class="text flex">
                        <h3 class="text-bold">'.$ufs["name"]. '</h3>
                        <p class="text-light" style="font-size: 1.1em; line-height: 1.4em; margin-top: 0.3em">
                            ' . $status . '
                        </p>
                    </div>
            </div>';
        }
    ?>
</div>