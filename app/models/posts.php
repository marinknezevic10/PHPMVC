<?php

class Posts 
{
    //reading from database
    function get_all()
    {
        //if the page is set assign it if its not page number = 1
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        //if the page number is less than 1, set it to 1, if not leave it as it is
        $page_number = $page_number < 1 ? 1 : $page_number;

        //number of images per page
        $limit = 2;

        //tells database to give next 10 posts
        $offset = ($page_number - 1) * $limit;
        
        $query = "select * from images order by id desc limit $limit offset $offset";

        $DB = new Database();
        $data = $DB->read($query);
        if(is_array($data))
        {
            return $data;
        }

        return false;
    }

    function get_one($link)
    {
        $query = "select * from images where url_address = :link limit 1";
        $arr['link'] = $link;

        $DB = new Database();
        $data = $DB->read($query, $arr);
        if(is_array($data))
        {
            return $data[0];
        }

        return false;
    }
}