<?php
    echo '<div class="attachments">';
        while ($attachment = mysqli_fetch_array($attachments_result)) {
            $exploded = explode(".",$attachment['document']);
            $ext = end($exploded);
            $type = $ext;
            if(in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                $type = "image";

            echo '
                <div class="attachment ' . $type . '" title="' . $attachment['document'] . '">
                    <i class="zmdi"></i>
                    <span class="trim-text">' . $attachment['document'] .'</span>
                </div>
            ';
        }
    echo '</div>';