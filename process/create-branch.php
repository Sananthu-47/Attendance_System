<?php
include "../includes/db.php";
$new_branch = $_POST['new_branch'];
$result = mysqli_query($connection,"INSERT INTO branch (branch) VALUES ('$new_branch')");
$last_id = mysqli_insert_id($connection);

if($result)
{
    echo "<option value='".$last_id."'>".$new_branch."</option>";
}