<?php
include "../includes/db.php";

$reg_id = $_POST['regId'];
$username = $_POST['username'];
$email = $_POST['email'];
$institute = $_POST['institute'];
$branch = $_POST['branch'];
$department = $_POST['department'];
$password = $_POST['password'];
$role = $_POST['role'];
$class = '';
if($role === 'student')
{
    $class = $_POST['classSelected'];
}else{
    $class = 'none';
}

$registerIdDb = mysqli_query($connection,"SELECT reg_id FROM user WHERE reg_id = '$reg_id' AND institute = '$institute'");
$emailDb = mysqli_query($connection,"SELECT email FROM user WHERE email = '$email' AND institute = '$institute'");
$output = '';

if(mysqli_num_rows($registerIdDb)>0)
{
    $output.="User is already exists with same registeration number";
}else if(mysqli_num_rows($emailDb)>0){
    $output.="User with same email id already exists";
}else{
    $query="INSERT INTO user (reg_id,username,email,institute,branch,dept,password,joined,class,role) VALUES ('$reg_id','$username','$email','$institute','$branch','$department','$password',now(),'$class','$role')";

    $result = mysqli_query($connection,$query);

    if(!$result)
    {
        $output = "User was not able to add ".mysqli_error($connection);
    }else{
        $output = true;
    }
}

echo $output;
