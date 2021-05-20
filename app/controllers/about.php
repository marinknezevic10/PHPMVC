<?php

class About
{
    function index()
    {
        $this->view("about");//calling function below
    }

    function view($view)//reads from the view directory and displays page for user
    {
        if(file_exists("../app/views/". $view .".php"))
        {
            include "../app/views/". $view .".php";
        }else{
            include "../app/views/404.php";
        }
    }
}