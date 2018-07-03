<?php

class getUfs
{
    public static function fromMemo($con,$memo_id){
        $query = "SELECT * FROM memo_ufs where memo_id=$memo_id";
        $result =	mysqli_query($con, $query); //execute the query

        return $result;
    }
}