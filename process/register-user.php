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
$table_name = $_POST['role'];
$query = '';
$class = '';
if($table_name === 'student')
{
    $class = $_POST['classSelected'];
}else{
    $class = '';
}

$registerIdDb = mysqli_query($connection,"SELECT reg_id FROM $table_name WHERE reg_id = '$reg_id' AND institute = '$institute'");
$emailDb = mysqli_query($connection,"SELECT email FROM $table_name WHERE email = '$email' AND institute = '$institute'");
$output = '';

if(mysqli_num_rows($registerIdDb)>0)
{
    $output.="User is already exists with same registeration number";
}else if(mysqli_num_rows($emailDb)>0){
    $output.="User with same email id already exists";
}else{
    $query.="INSERT INTO $table_name (reg_id,username,email,institute,branch,dept,password,joined";
    if($table_name === 'student')
    {
        $query.=",class";
    }
    $query.=") VALUES ('$reg_id','$username','$email','$institute','$branch','$department','$password',now()";
    if($table_name === 'student')
    {
        $query.=",'$class'";
    }
    $query.=")";

    $result = mysqli_query($connection,$query);

    if(!$result)
    {
        $output = "User was not able to add ".mysqli_error($connection);
    }else{
        $output = true;
    }
}

echo $output;
