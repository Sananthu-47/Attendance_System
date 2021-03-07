<?php
include "../includes/db.php";
include "../Classes/Institute-details.php";
$institute = new Institute();

$institute_name = $_POST['full_name'];
$institute_code = $_POST['short_name'];
$location = $_POST['location'];

    if($institute_name !== '' && $institute_code !== '' && $location !== '')
    {
        if($institute->registered_or_not($institute_name,$institute_code,$location))
        {
            $query = "INSERT INTO institute (institute_name,name,location) VALUES ('$institute_name','$institute_code','$location')";
            $result = mysqli_query($connection,$query);
            echo "1";
        }else{
            echo "2";
        }
    }else{
        echo "0";
    }
