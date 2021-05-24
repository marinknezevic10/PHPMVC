<?php

class Upload extends Controller
{
    function index()
    {
        
        header("Location:" . ROOT . "upload/image");
        die;
    }

    function image()
    {
        //if the person wants to upload image he must be logged in
        $user = $this->loadModel("user");

        //if the person is not logged in redirect them to login page
        if(!$result = $user->check_logged_in())
        {
            header("Location:" . ROOT . "login");
            die;
        }

        $data['page_title'] = "Upload";
        $this->view("templates/upload", $data);
    }

    
}