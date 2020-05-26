<?php
class Users 
{
    //  registration/ saving users details into the database
    public function INSERT_USER($nickname, $email, $password){
        global $pdoConn;
        $date_created = date ('Y-m-d H:i:s');
        $sqlQ = 'INSERT INTO users (nickname, email, password, date_created) VALUE(?,?,?,?)';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $nickname);
            $bindP -> bindParam(2, $email);
            $bindP -> bindParam(3, $password);
            $bindP -> bindParam(4, $date_created);
            if ($bindP->execute()==TRUE) {
                echo 'registration is successful';
            }
            else{
                echo 'seem you could not  be registered';
            }
        }
    }
    //handling login
     public function AUTHENTICATION($nickname, $password){
        global $pdoConn;
        
        $sqlQ = 'SELECT * FROM users WHERE nickname =? AND password =?';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
            
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $nickname);
            $bindP -> bindParam(2, $password);
            
            if ($bindP->execute()) {
                $result = $bindP->fetchAll();
                return $result;
            }
            else{
                $result = 0;
                return $result;
            }


        }
            }

             public function FETCH_USER($id){
        global $pdoConn;
        
        $sqlQ = 'SELECT * FROM users WHERE id=?';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
            
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $id);
            
            if ($bindP->execute()) {
                $result = $bindP->fetchAll();
                return $result;
            }
            else{
                $result = 0;
                return $result;
            }


        }
            }
             //  update password
    public function UPDATE_PASSWORD($id, $newPassword){
        global $pdoConn;
        // $date_created = date ('Y-m-d H:i:s');
        $sqlQ = 'UPDATE users SET password =? WHERE id =?';
        if (!$bindP= $pdoConn->prepare($sqlQ)) {
           echo 'boom. query did not work';
        }
        else{
            $bindP -> bindParam(1, $newPassword);
            $bindP -> bindParam(2, $id);
            if ($bindP->execute()) {
                echo 'Password change is successful';
            }
            else{
                echo 'Failed to change';
            }
        }
    }
}
