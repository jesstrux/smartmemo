<?php

class getUfs
{
    public static function fromMemo($con,$memo_id){
        $query = "SELECT * FROM memo_ufs where memo_id=$memo_id";
        $result =	mysqli_query($con, $query); //execute the query

        return $result;
    }

    public static function forMemo($con, $memo_id)
    {
        $query = "SELECT CONCAT(u.fname, ' ', u.mname, ' ', u.surname) AS name,";
        $query .= " ufs.level, ufs.status";
        $query .= " FROM memo_ufs ufs";
        $query .= " JOIN users u ON ufs.user_id = u.id";
        $query .= " where ufs.memo_id=$memo_id";

        $result = mysqli_query($con, $query);
        echo mysqli_error($con); //execute the query
        $ufs = [];

        if (mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                $ufs[] = $row;

        return $ufs;
    }

    public static function forUser($con, $user_id)
    {
        $query = "SELECT m.*, 'Inbox' as type, 'true' AS is_ufs";
        $query .= " FROM memo_ufs ufs";
        $query .= " JOIN memo m ON ufs.memo_id = m.id";
        $query .= " where ufs.user_id=$user_id AND ufs.status < 1";
        $query .= " ORDER BY m.updated_at DESC";

        $result = mysqli_query($con, $query);

        if(mysqli_error($con) != null){
            echo mysqli_error($con); //execute the query
            echo $query;
        }

        $ufs = [];

        if (mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            $ufs[] = $row;

        return $ufs;
    }
}