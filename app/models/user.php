<?php

class User
{
    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";
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
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                header("Location:" . ROOT . "home");
                die;
            }else{
            
                $_SESSION['error'] = "wrong username or password";
            }
        }else{

            $_SESSION['error'] = "please enter valid username and password";
        }
    }

    function signup($POST)
    {

        $DB = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && ($POST['password']))
        {
    
        $arr['username'] = $POST['username'];
        $arr['password'] = $POST['password'];
        $arr['email'] = $POST['email'];
        $arr['url_address'] = get_random_string_max(60);
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into users (username,password,email,url_address,date) values(:username,:password,:email,:url_address,:date)";
        $data = $DB->write($query, $arr);
            if($data)
            {

                header("Location:" . ROOT . "home");
                die;
            }

        }else{

            $_SESSION['error'] = "please enter valid username and password";
        }
    }

    function check_logged_in()//checking if user is logged in
    {
        $DB = new Database();
        //if user_url is set read from the database
        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];

        $query = "select * from users where url_address = :user_url limit 1";
        $data = $DB->read($query, $arr);
            if(is_array($data))
            {
 
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;
                
                return true;
            }    
        }
        return false;
    }

    function logout()
    {
        unset($_SESSION['user_name']);
        unset($_SESSION['user_url']);

        header("Location:" . ROOT . "home");
                die;
    }
                
}