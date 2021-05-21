<?php

class About extends Controller
{
    function index()
    {
        $data['page_title'] = "About";
        $this->view("about", $data);

        //$this->view("about");//calling function below
    }

    
}