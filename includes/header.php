<?php
include "db.php";

    ob_start();
    session_start();
    if(isset($_SESSION['logged_in_id']))
    {
        include 'Classes/User.php';
        $user = new User();
        $logged_in_id = $_SESSION['logged_in_id'];
        $institute_id = $user->get_data_by_id('institute',$logged_in_id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"></link>
    <script src="assets/jQuery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Attendance system</title>
</head>
<body>
