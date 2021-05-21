<?php

class Contact extends Controller
{
    function index()
    {
        $data['page_title'] = "Contact us";

        $this->view("templates/contact", $data);
    }

    
}