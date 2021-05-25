<?php 

class Upload_file
{
    function upload($POST, $FILES)
    {
        $DB = new Database();

        if(isset($POST['title']) && ($FILES['file']))
        {

        //upload file
        show($POST);
        show($FILES);
        die;
        move_uploaded_file($FILES['file']['tmp_name'], destination);
        
        //save to db
        $arr['title'] = $POST['title'];
        $arr['description'] = $POST['description'];
        $arr['url_address'] = get_random_string_max(60);
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into images (title,description,url_address,date) values(:title,:description,:url_address,:date)";
        $data = $DB->write($query, $arr);
            if($data)
            {

                header("Location:" . ROOT . "home");
                die;
            }

        }
    }
}