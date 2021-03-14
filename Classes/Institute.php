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
        $output = '';
        $query = "SELECT * FROM branch";
        $result = mysqli_query($connection,$query); 
        while($row = mysqli_fetch_assoc($result))
        {
            $output.= "<option value='".$row['id']."'>".$row['branch']."</option>";
        }
        return $output;
    }

    function get_branch_by_id($id)
    {
        global $connection;
        $query = "SELECT * FROM branch WHERE id = '$id'";
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
        $output = '';
        $query = "SELECT * FROM branch_selected WHERE institute='$id'";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $branch_name = $this->get_branch_by_id($row['branch']);
            $output.= "<li class='list-group-item d-flex justify-content-between align-items-center'><div class='d-flex flex-column'><span class='h5'>".$branch_name['branch']."</span><span>".$branch_name['branch_full_form']."</span></div><div class='d-flex align-items-center'> <i class='fa fa-trash text-danger fa-lg delete-branch' data-delete-branch='".$row['id']."'></i><i class='fa fa-chevron-right text-primary fa-lg ml-3 go-add-department' data-add-department='".$row['branch']."'></i></div></li>";
        }
        return $output;
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


    function institute_branch_department($type,$college_id)
    {
        $output = '';
        $all_branch = $this->get_all_branch();
        $selected_branch = $this->get_all_selected_branch($college_id);
        if($type == 'branch')
        {
          $output.="<div class='bg-primary-color p-2 text-white'>Add your institute offered branches</div>
                    <div class='d-flex justify-content-center align-items-center mx-auto my-2 col-lg-6 col-sm-12'>
                    <select id='branch' class='form-control input-login' data-college-id='";
                    $output.=$college_id;
                    $output.="'><option value='0'>Add branch</option>";
                    $output.=$all_branch;
                    $output.="</select>
                    <button class='btn btn-success mx-2' id='add-branch' disabled>Add</button>
                    <button class='btn btn-warning badge' id='not-in-branch'>Not in list?</button>
                    </div>

                <div class='disappear success-field' style='display:none'><span class='error-data'>New branch created</span><i class='fa fa-times close text-secondary'></i></div>

                        <div class='my-2 justify-content-center d-none' id='new-branch-div'>
                            <input type='text' id='new-branch' class='my-2' placeholder='Add new branch'>
                            <input type='text' id='new-branch-full-form' placeholder='Full form'>
                            <button class='btn btn-primary mx-5 my-2' id='create-branch'>Create</button>
                        </div>

                    <div class='all-branch col-lg-5 col-12 mx-auto'>
                        <header class='bg-dark text-light p-1'>Selected branches</header>
                            <ul class='list-group' id='selected-branches'>";
                    $output.=$selected_branch;
                    $output.="</ul>
                    </div>";
        }
        echo $output;
    }

}