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
        
        //if title and file are set upload the image
        if(isset($_POST['title']) && isset($_FILES['file']))
        {
            $uploader = $this->loadModel("upload_file");
            $uploader->upload($_POST, $_FILES);
        }

        $data['page_title'] = "Upload";
        $this->view("templates/upload", $data);
    }

    
}