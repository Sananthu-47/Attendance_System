<?php
$connection = mysqli_connect('localhost','root','','attendance_system');
if(!$connection)
{
    echo mysqli_error($connection);
}