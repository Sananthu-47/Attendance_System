<?php
include "../includes/db.php";
include "../Classes/Institute.php";
$institute = new Institute();

$branch = $_POST['branch'];
$college_id = $_POST['college_id'];
$department = $_POST['department'];

$result = mysqli_query($connection,"SELECT * FROM department_selected WHERE institute = '$college_id' AND branch = '$branch' AND department = '$department'");
if(mysqli_num_rows($result)>0)
{
    echo "0";
}else{
    $result = mysqli_query($connection,"INSERT INTO department_selected (institute,branch,department) VALUES ('$college_id','$branch','$department')");
    $last_id = mysqli_insert_id($connection);
    if($result)
    {
    echo "<li class='list-group-item d-flex justify-content-between align-items-center'><div class='d-flex flex-column'><span class='h5'>".$institute->get_department_by_id($department)['department']."</span><span>".$institute->get_department_by_id($department)['department_full_form']."</span></div><div class='d-flex align-items-center'> <i class='fa fa-trash text-danger fa-lg delete-department' data-delete-department='".$last_id."'></i></div></li>";
    }
}
