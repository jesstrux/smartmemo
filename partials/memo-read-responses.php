<div id="memoReplies" style="padding: 1.5em 0.7em; border-top: 1px solid #ddd">
    <h5 class="text-regular" style="margin-bottom: 2em;letter-spacing: 1px; color: #999; font-size: 0.9em;">MEMO COMMENTS</h5>

    <?php
        foreach ($responses as $response) {
            echo '
            <div class="memo-reply layout start" style="margin-bottom: 22px; margin-left: 12px;">
                    <img class="for-user" src>

                    <div class="text flex">
                        <h3 class="text-bold">'.$response["name"]. '</h3>
                        <p class="text-light" style="font-size: 1.1em; line-height: 1.4em; margin-top: 0.3em">
                            ' . $response["comment"] . '
                        </p>
                    </div>
            </div>';
        }
    ?>
</div>