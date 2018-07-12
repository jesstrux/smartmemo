<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 7/6/2018
 * Time: 9:09 AM
 */

class memoInfo
{



    function myMemoCount($con,$user_id,$memo_type){
        // memo types 1 = received as ufs,2 = sent,3 = draft


        //get the user memo inbox
        if($memo_type == 0){
            $inbox_memos=array();
            $memoId=array();

            $query = "SELECT id FROM memo WHERE to_userid=$user_id and status=1";
            $result =	mysqli_query($con, $query); //execute the query
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $memo_id = $row['id'];
                $memo_status = SELF::checkMemoStatus($con, $memo_id);

                if ($memo_status == 1) {
                    $memoId[] = $memo_id;
                }


            }
            foreach ($memoId as $memo_ids){
                $querys = "SELECT * FROM memo WHERE id=$memo_ids and status=1";
                $results =	mysqli_query($con, $querys); //execute the query
                $row2 =mysqli_fetch_array($results,MYSQLI_ASSOC);
                $inbox_memos[]=$row2;
            }

            $counter=count($inbox_memos);
            return $counter;
        }

        //count the user memo received as ufs
        if($memo_type == 1){

            $currentUfs=SELF::currentUfs($con,$user_id);

            if($currentUfs == $user_id){
                $query = "SELECT * FROM memo_ufs WHERE user_id=$user_id WHERE status=0";

                $result =	mysqli_query($con, $query); //execute the query
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                return $count;
            }
            return null;

        }

        //count the user sent memo
        if($memo_type == 2){
            $query = "SELECT * FROM memo WHERE from_userid=$user_id WHERE status=1";

            $result =	mysqli_query($con, $query); //execute the query
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            return $count;
        }



        //count the user draft memo
        if($memo_type == 3){
            $query = "SELECT * FROM memo WHERE from_userid=$user_id WHERE status=0";

            $result =	mysqli_query($con, $query); //execute the query
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            return $count;
        }

        return null;

    }

    function allMyMemos($con,$user_id){
        $query = "SELECT * FROM memo where from_userid=$user_id";
        $result =	mysqli_query($con, $query); //execute the query
        return $result;
    }

    function myMemo($con,$user_id,$memo_type){
        // memo types 0 inbox memos , 1 = received as ufs,2 = sent,3 = draft


        //get the user memo inbox
        if($memo_type == 0){
            $inbox_memos=array();
            $memoId=array();

            $query = "SELECT id FROM memo WHERE to_userid=$user_id and status=1";
            $result =	mysqli_query($con, $query); //execute the query
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $memo_id = $row['id'];
                $memo_status = SELF::checkMemoStatus($con, $memo_id);

                if ($memo_status == 1) {
                    $memoId[] = $memo_id;
                }


            }
            foreach ($memoId as $memo_ids){
                $querys = "SELECT * FROM memo WHERE id=$memo_ids and status=1";
                $results =	mysqli_query($con, $querys); //execute the query
                $row2 =mysqli_fetch_array($results,MYSQLI_ASSOC);
                $inbox_memos[]=$row2;
            }


            return $inbox_memos;
        }

        //get the user memo received as ufs
        if($memo_type == 1){
            $ufsd_memos=array();
            $ids=array();
            //get all memo ids that are ufsd to this user.
            $query = "SELECT memo_id FROM memo_ufs WHERE user_id=$user_id and status=0";
            $result =	mysqli_query($con, $query); //execute the query
            while($row =mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $memo_ids=$row['memo_id'];
                $ids[]=$memo_ids;
            }

            //check if this user is the current
            foreach ($ids as $memo_ids){

                $currentUfs=SELF::currentUfs($con,$memo_ids);
                if($currentUfs == $user_id){
                    $querys = "SELECT * FROM memo WHERE id=$memo_ids and status=1";
                    $results =	mysqli_query($con, $querys); //execute the query
                    $row2 =mysqli_fetch_array($results,MYSQLI_ASSOC);
                    $ufsd_memos[]=$row2;
                }
            }

            return $ufsd_memos;
        }

        //get the user sent memo
        if($memo_type == 2){
            $query = "SELECT * FROM memo WHERE from_userid=$user_id and status=1";

            $result =	mysqli_query($con, $query); //execute the query
            //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($count != 0){
                $row = $result;
                return $row;
            }
            return null;
        }

        //get the user draft memo
        if($memo_type == 3){
            $query = "SELECT * FROM memo WHERE from_userid=$user_id and status=0";
            $results =	mysqli_query($con, $query); //execute the query
            $count = mysqli_num_rows($results);
            if($count != 0){
                $row = $results;
                return $row;
            }
            return null;
        }

        return null;

    }

    function LocateMemo($con,$memo_id){
        // memo find the location of memo

        //check if not approved by ufs
        $query2 = "SELECT * FROM memo_ufs WHERE memo_id=$memo_id and status=0 ORDER BY level ASC";
        $result2 =	mysqli_query($con, $query2); //execute the query
        $count2 = mysqli_num_rows($result2);

        //check if there is any ufs has a pending memo
        if($count2 != 0){
            while($row2 =mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                return $row2['user_id'];
            }

        }
        else{
            $query = "SELECT * FROM memo WHERE id=$memo_id";

            $result =	mysqli_query($con, $query); //execute the query
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            return $row['to_userid'];
        }
    }

    function getMemoResponse($con,$memo_id){
        $query = "SELECT * FROM memo_response WHERE memo_id=$memo_id";
        $result =	mysqli_query($con, $query); //execute the

        return $result;
    }

    function  getUfsName($con,$ufs_id){

        $sql_ufs="SELECT user_id FROM memo_ufs WHERE id=$ufs_id ";
        $results = mysqli_query($con, $sql_ufs); //execute the query
        $row2 = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $user_id=$row2['user_id'];
        $query = "SELECT fname,mname,surname FROM users WHERE id=$user_id";
        $result = mysqli_query($con, $query); //execute the query
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $fname			=	$row['fname'];
        $lname		    =	$row['mname'];
        $surname		=	$row['surname'];

        if($row){
            return ucwords($fname.' '.$lname.' '.$surname);
        }
        else{
            return "";
        }
    }

    function currentUfs($con,$memo_id){
        $query = "SELECT user_id FROM memo_ufs WHERE memo_id=$memo_id and status=0 ORDER BY level ASC";
        $result =	mysqli_query($con, $query); //execute the query
        $count = mysqli_num_rows($result);
        if($count !=0){
            while ($row =mysqli_fetch_array($result,MYSQLI_ASSOC)){
                return $row['user_id'];
            }
        }

        return null;
    }

    function checkMemoStatus($con,$memo_id){
        // returned values 0 for pedning, 1 for approved , 2 declined

        //check if memo has any ufs
        $query = "SELECT id FROM memo_ufs WHERE memo_id=$memo_id";
        $result =	mysqli_query($con, $query); //execute the query
        $count = mysqli_num_rows($result);
        if($count != 0){
            //check if all ufs have responded by all ufs
            $query2 = "SELECT * FROM memo_response WHERE memo_id=$memo_id and action=0";
            $result2 =	mysqli_query($con, $query2); //execute the query
            $count2 = mysqli_num_rows($result2);
            if($count2 == 0){
                //this memo has not been declined yet, then check if all ufs have responded
                $query3 = "SELECT * FROM memo_ufs WHERE memo_id=$memo_id and status=1";
                $result3 =	mysqli_query($con, $query3); //execute the query
                $count3 = mysqli_num_rows($result3);

                if($count == $count3){
                    //approved by all
                    return 1;
                }
                else{
                    //still pending to one ufs
                    return 0;
                }
            }
            else{
                //memo is declined by any of the ufs
                return 2;
            }

        }
        else{
            //this is a direct memo has no ufs
            return 1;
        }

    }
    function limit_text($text) {
        $limit=50;
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }


    function getBroadcastMemo($con,$dept_id){

        $broadcast_id=array();
        $data=array();
        $query = "SELECT broadcast_id FROM broadcast_receivers WHERE dept_id=$dept_id";
        $results =	mysqli_query($con, $query); //execute the query

        while($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){
            $broadcast_id[]=$row['broadcast_id'];
        }

        if(!empty($broadcast_id)){
            foreach ($broadcast_id as $memo_id){

                $query = "SELECT * FROM broadcast WHERE id=$memo_id";
                $results =	mysqli_query($con, $query); //execute the query

                $data[]=$row=mysqli_fetch_array($results,MYSQLI_ASSOC);
            }
            return $data;
        }
        else {
            return null;
        }

    }

}