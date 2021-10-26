<?php
class Logs
{
    //saving logs into the database
    public function INSERT_LOG($id, $description){
        global $pdoConn;
        $date_created = date ('Y-m-d H:i:s');
        $sqlQ = 'INSERT INTO anonymous_logs (user_id, description, date_created) VALUE(?,?,?)';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
           //echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $id);
            $bindP -> bindParam(2, $description);
            $bindP -> bindParam(3, $date_created);
            if ($bindP->execute()) {
                //echo 'logged';
                
            }
            else{
                //echo 'failed to log';
            }
        }
       
    }
}
