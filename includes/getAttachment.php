<?php

class getAttachment
{
    public static function fromMemo($con,$memo_id){
        $query = "SELECT * FROM memo_attachment where memo_id=$memo_id";
        $result =	mysqli_query($con, $query); //execute the query

        return $result;
    }

    public static function forMemo($con, $memo_id)
    {
        $query = "SELECT * FROM memo_attachment where memo_id=$memo_id";
        $result = mysqli_query($con, $query);
        $attachments = [];

        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                $attachment = $row['document'];
                $ext = end(explode(".", $attachment));
                $type = $ext;
                if (in_array($ext, ["jpg", "png", "gif", "jpeg"]))
                    $type = "image";

                $pattern = '/_?\.' . $ext . '/';
                $name = preg_replace($pattern, "", $attachment);
                $name = str_replace("_", " ", $name);

                if ($type == "xlsx")
                    $type = "xls";
                else if ($type == "doc")
                    $type = "docx";

                $attachments[] = [
                    "title" => $name,
                    "type" => $type,
                    "src" => $attachment
                ];
            }
        }

        return $attachments;
    }
}