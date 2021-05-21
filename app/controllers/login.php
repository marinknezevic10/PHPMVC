<?php

class Login extends Controller
{
    function index()
    {
        $data['page_title'] = "Login";

        $this->view("templates/login", $data);
    }

    
}