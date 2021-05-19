<?php 
    session_start();//very important for the websites that require log in and out

    require "../app/init.php";

    $app = new App();//creating an instance of the class App