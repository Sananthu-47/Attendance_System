<?php
include "../includes/db.php";
$new_department = $_POST['new_department'];
$branch_id = $_POST['branch_id'];
$department_full_form = $_POST['department_full_form'];

$result = mysqli_query($connection,"INSERT INTO department (department,department_full_form,branch) VALUES ('$new_department','$department_full_form','$branch_id')");
$last_id = mysqli_insert_id($connection);

if($result)
{
    echo "<option value='".$last_id."'>".$new_department."</option>";
}