<?php
include "../includes/db.php";
$new_branch = $_POST['new_branch'];
$branch_full_form = $_POST['branch_full_form'];

$result = mysqli_query($connection,"INSERT INTO branch (branch,branch_full_form) VALUES ('$new_branch','$branch_full_form')");
$last_id = mysqli_insert_id($connection);

if($result)
{
    echo "<option value='".$last_id."'>".$new_branch."</option>";
}