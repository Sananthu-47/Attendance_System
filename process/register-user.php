<?php
include "../includes/db.php";
include "../global.php";

$reg_id = $_POST['regId'];
$username = $_POST['username'];
$email = $_POST['email'];
$institute = $_POST['institute'];
$branch = $_POST['branch'];
$department = $_POST['department'];
$password = $_POST['password'];

$registerIdDb = mysqli_query($connection,"SELECT reg_id FROM teacher WHERE reg_id = '$reg_id' AND institute = '$institute'");
$emailDb = mysqli_query($connection,"SELECT email FROM teacher WHERE email = '$email' AND institute = '$institute'");
$output = '';

if(mysqli_num_rows($registerIdDb)>0)
{
    $output.="User is already exists with same registeration number";
}else if(mysqli_num_rows($emailDb)>0){
    $output.="User with same email id already exists";
}else{
    $result = mysqli_query($connection,"INSERT INTO teacher (reg_id,username,email,institute,branch,dept,password,joined) VALUES ('$reg_id','$username','$email','$institute','$branch','$department','$password',now())");
    if(!$result)
    {
        $output = "User was not able to add".mysqli_error($connection);
    }else{
        $output = true;
    }
}

echo $output;
