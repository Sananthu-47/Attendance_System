<?php
include "../includes/db.php";
include "../Classes/Institute.php";
$institute = new Institute();

$branch = $_POST['branch'];
$college_id = $_POST['college_id'];

$result = mysqli_query($connection,"SELECT * FROM branch_selected WHERE institute = '$college_id' AND branch = '$branch'");
if(mysqli_num_rows($result)>0)
{
    echo "0";
}else{
    $result = mysqli_query($connection,"INSERT INTO branch_selected (institute,branch) VALUES ('$college_id','$branch')");
    $last_id = mysqli_insert_id($connection);
    if($result)
    {
    echo "<li class='list-group-item d-flex justify-content-between align-items-center h5'>".$institute->get_branch_by_id($branch)['branch']."<i class='fa fa-trash text-danger fa-lg delete-branch' data-delete-branch='".$last_id."'></i></li>";
    }
}
