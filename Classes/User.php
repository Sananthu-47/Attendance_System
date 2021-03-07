<?php

class User{
    public $user_logged_in_as;

    function get_data_by_id($getValue,$id)
    {
        global $connection;
        $result = mysqli_query($connection,"SELECT $getValue FROM user WHERE id = '$id'");
        $row = mysqli_fetch_array($result);
        return $row[0];
    }
}