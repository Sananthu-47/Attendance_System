<?php

class Institute{
    public $user_logged_in_as;

    function get_institute_details($id)
    {
        global $connection;
        $query = "SELECT * FROM institute WHERE id = '$id'";
        $result = mysqli_query($connection,$query); 
        return mysqli_fetch_assoc($result);
    }

    function get_all_branch()
    {
        global $connection;
        $query = "SELECT * FROM branch";
        $result = mysqli_query($connection,$query); 
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<option>".$row['branch']."</option>";
        }
    }

    function get_branch_by_id($id)
    {
        global $connection;
        $query = "SELECT branch FROM branch WHERE id = '$id'";
        $result = mysqli_query($connection,$query); 
        if(mysqli_num_rows($result)>0)
        {
        return mysqli_fetch_assoc($result);
        }else{
            echo "No branches selected";
        }
    }

    function get_all_selected_branch($id)
    {
        if($id !== null)
        {
        global $connection;
        $query = "SELECT * FROM branch_selected WHERE id='$id'";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $branch_name = $this->get_branch_by_id($row['id']);
            echo "<li class='list-group-item'>".$branch_name['branch']."</li>";
        }
    }
    }

    function registered_or_not($institute_name,$institute_code,$location)
    {
        global $connection;
        $query = "SELECT * FROM institute WHERE institute_name = '$institute_name' AND name = '$institute_code' AND location = '$location'";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0)
        {
            return false;
        }
        return true;
    }


}