<?php

class Home extends Controller//controller for the home page and index method
{
    function index()
    {
        //reading from the database
        //$DB = new Database();
        //$data['result'] = $DB->read("select * from image");

        $data['page_title'] = "Home";

        //show($data[0]->image);//showing particular image

        $this->view("templates/index", $data);//calling function view
    }

    
}