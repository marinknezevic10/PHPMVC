<?php

class Home extends Controller//controller for the home page and index method
{
    function index()
    {
        //reading from the database
        //$DB = new Database();
        //$data['result'] = $DB->read("select * from images");

        $data['page_title'] = "Home";

        //loading model
        $posts = $this->loadModel("posts");

        //loading function from model
        $result = $posts->get_all();

        //loading pagination sending data to home controller
        $pagination = $this->loadModel("pagination");
        $data['prev_page'] = $pagination->generate_link($pagination->current_page_number() - 1);
        $data['next_page'] = $pagination->generate_link($pagination->current_page_number() + 1);

        $data['posts'] = $result;
        $image_class = $this->loadModel("image_class");
        //image cropping
        if(is_array($data['posts']))
        {
            foreach ($data['posts'] as $key => $value) {
                
                $data['posts'][$key]->image = $image_class->get_thumbnail($data['posts'][$key]->image);
            }
        }

        //show($data[0]->image);//showing particular image

        $this->view("templates/index", $data);//calling function view
    }

    
}