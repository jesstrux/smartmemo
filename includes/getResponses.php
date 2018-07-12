<?php

class getResponses
{
    public static function forMemo($con, $memo_id)
    {
        $query = "SELECT CONCAT(u.fname, ' ', u.mname, ' ', u.surname) AS name,";
        $query .= " response.comment, response.action AS status";
        $query .= " FROM memo_response response";
        $query .= " JOIN users u ON response.user_id = u.id";
        $query .= " where response.memo_id=$memo_id";

        $result = mysqli_query($con, $query);
        echo mysqli_error($con); //execute the query
        $response = [];

        if (mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                $response[] = $row;

        return $response;
    }

    public static function forUser($con, $user_id)
    {
        
    }
}