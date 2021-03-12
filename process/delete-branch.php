<?php
include "../includes/db.php";

$id = $_POST['id'];
$result = mysqli_query($connection,"DELETE FROM branch_selected WHERE id = '$id'");
if($result)
{
    echo "1";
}else{
    echo "Error:".mysqli_error($connection);
}