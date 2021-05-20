<?php
//simplifying things
//functionality that is used in all controllers
class Controller
{
    protected function view($view)//reads from the view directory and displays page for user
    {
        if(file_exists("../app/views/". $view .".php"))
        {
            include "../app/views/". $view .".php";
        }else{
            include "../app/views/404.php";
        }
    }

    protected function loadModel($model)//loading classes from model
    {
        if(file_exists("../app/models/". $model .".php"))
        {
            include "../app/models/". $model .".php";
            
            //instanciranje klase
            return $model = new $model();
        }
        return false;
    }
}