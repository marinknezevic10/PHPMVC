<?php

class Upload extends Controller
{
    function index()
    {
        $data['page_title'] = "Upload";

        $this->view("templates/upload", $data);
    }

    function image()
    {
        $data['page_title'] = "Upload";

        $this->view("templates/upload", $data);
    }

    
}