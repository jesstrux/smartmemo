<div id="attachments" label="<?php echo count($attachments) . ' Attachment' . $extra_s; ?>">

<?php
    foreach ($attachments as $attachment) {
        $type = $attachment['type'];

        echo '
            <a href="uploads/' . $attachment['src'] . '" class="attachment ' . $type . '" target="blank">
                <i class="zmdi"></i>
                <span class="trim-text">' . $attachment['title'] . '</span>
            </a>
        ';
    }
?>

</div>