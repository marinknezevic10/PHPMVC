<?php

//database connection
//using pdo because if we use a different type od db we can still connect
class Database
{
    public function db_connect()
    {
        try{
            $string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME. ";";
            return $db = new PDO($string, DB_USER, DB_PASS);
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);//prepare for protection

        if(count($data) == 0)
        {
            $stm = $DB->query($query);
            $check = 0;
            if($stm){
                $check=1;
            }
        }else{
            $check =  $stm->execute($data);
        }

        if($check)
        {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                return $data;
            }
                return false;
        }else{
            return false;
        }
        
    }

    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);//prepare for protection

        if(count($data) == 0){
            $stm = $DB->query($query);
            $check = 0;
            if($stm){
                $check=1;
            }
        }else{
            $check = $stm = $stm->execute($data);
        }

        if($check){
           return true;
        }else{
            return false;
        }
    }
}