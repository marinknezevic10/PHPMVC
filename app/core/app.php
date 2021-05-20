<?php

//OOP
//url routing
//this code will take whatever is in the url and run specific class name and method inside

class App//collection of functions
{
    private $controller = "home";
    private $method = "index";
    private $params = [];//$params is an array that saves variables

    public function __construct()
    {
        $url = $this->splitURL();//$this to call the function inside the class

        //if the first variable is set in url $url[0]
        if(file_exists("../app/controllers/". strtolower($url[0]) .".php"))//strtolower reduces url
        {
            $this->controller = strtolower($url[0]);//once is set, we change it to $controller ="home"
            unset($url[0]);
        }

        require "../app/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        //if the second variable is set in url lets continue
        if(isset($url[1]))
        {
            //look inside controller, and if method exists continue
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //run the class and method
        $this->params = array_values($url);//copies values from one array and returns another array
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function splitURL()
    {
        //filter_sanitaze removes illegal characters from url
        //if the url is set get it if not redirect to home page
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));//explode converts string into an array,trim removes /
    }
}

