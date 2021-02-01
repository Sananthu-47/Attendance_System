<?php
include "../includes/db.php";

$reg_id = $_POST['reg_id'];
$password = $_POST['password'];
$role = $_POST['role'];
$data = '';

$result = mysqli_query($connection,"SELECT id FROM $role WHERE reg_id='$reg_id' AND password = '$password'");
if(!$result)
{
    echo mysqli_error($connection);
}else{
    $data =  mysqli_fetch_assoc($result);
    echo $data['id'];
}