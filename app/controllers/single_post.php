<?php

class Single Post extends Controller
{
    function index($link = '')
    {

        if($link == "")
        {
            
            $data['page_title'] = "Image not found";
            $this->view("templates/not_found", $data);
        
        }else{

            $posts = $this->loadModel("posts");

            //get one post
            $result = $posts->get_one($link);

            $data['post'] = $result;
            
            $data['page_title'] = "Single Post";
            $this->view("templates/index", $data);
        }    
    }
  
}