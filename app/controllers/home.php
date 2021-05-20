<?php

class Home extends Controller//controller for the home page and index method
{
    function index()
    {
        $image_class = $this->loadModel("image_class");
        //checking if its correct
        //show($image_class);
        $this->view("home");//calling function below
    }

    
}