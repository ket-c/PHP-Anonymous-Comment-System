<?php
class Comments
{
    //  saving comments into the database
    public function INSERT_COMMENTS($user_id, $description){
        global $pdoConn;
        $date_created = date ('Y-m-d H:i:s');
        $sqlQ = 'INSERT INTO anonymous_comments (user_id, description, date_created) VALUE(?,?,?)';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $user_id);
            $bindP -> bindParam(2, $description);
            $bindP -> bindParam(3, $date_created);
            if ($bindP->execute()) {
                echo 'comments successfully saved';
            }
            else{
                echo 'error. comments not saved';
            }
        }
        return 'done';
    }

    //  fetching comments from the database
    public function FETCH_COMMENTS ($user_id){
        global $pdoConn;
        $sqlQ = 'SELECT * FROM anonymous_comments WHERE user_id =? ORDER BY id DESC';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $user_id);
            if ($bindP->execute()) {
               $data= $bindP->fetchAll();
               return $data;
            }
            else{
                echo 'error. comments not saved';
            }
        }

    }
}
