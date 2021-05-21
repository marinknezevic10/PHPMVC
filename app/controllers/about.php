<?php

class About extends Controller
{
    function index()
    {
        $data['page_title'] = "About";
        $this->view("templates/about-us", $data);

        //$this->view("about");//calling function below
    }

    
}