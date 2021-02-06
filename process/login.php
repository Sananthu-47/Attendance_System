<?php
include "../includes/db.php";

$reg_id = $_POST['reg_id'];
$password = $_POST['password'];
$role = $_POST['role'];
$output = '';

$result = mysqli_query($connection,"SELECT id FROM $role WHERE reg_id='$reg_id' AND password = '$password'");
if(!$result)
{
    echo mysqli_error($connection);
}else{
    if(mysqli_num_rows($result)>0)
    {
    $data =  mysqli_fetch_assoc($result);
    $output =  $data['id'];
    }else{
        $output = 'Entered wrong details';
    }
}

echo $output; 