<?php

class Posts 
{
    //reading from database
    function get_all()
    {
        $query = "select * from images order by id desc limit 12";

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

        $DB = new Database();
        $data = $DB->read($query);
        if(is_array($data))
        {
            return $data;
        }

        return false;
    }
}