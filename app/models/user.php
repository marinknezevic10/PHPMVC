<?php

class User
{
    function login()
    {
        $DB = new Database();

        $_SESSION['error'] = ""
        if(isset($POST['username']) && ($POST['password']))
        {
        //assigning username and password to an array
        $arr['username'] = $POST['username'];
        $arr['password'] = $POST['password'];

        //we are not using variables because these are gonna be prepared statements :username :password
        $query = "select * from users where username = :username && password = :password limit 1";
        $data = $DB->read($query, $arr);
            if(is_array($data))
            {
                //logged in
                //query and data are array of objects but we want just the first result, $data[0]
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_adress;
            }else{
            
                $_SESSION['error'] = "wrong username or password"
            }
        }else{

            $_SESSION['error'] = "please enter valid username and password"
        }
    }

    function signup()
    {

    }

    function check_login()//checking if user is logged in
    {
        $DB = new Database();
        //if user_url is set read from the database
        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];

        $query = "select * from users where user_adress = :user_url limit 1";
        $data = $DB->read($query, $arr);
            if(is_array($data))
            {
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_adress;
                
                return true;
            }    
        }
        return false;
    }
                
}