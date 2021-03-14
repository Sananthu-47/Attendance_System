<?php
include "../includes/db.php";
include "../Classes/Institute.php";
$institute = new Institute();
$branch_id = $_POST['branch_id'];
$college_id = $_POST['college_id'];
$type = $_POST['type'];

echo $institute->institute_branch_department($type,$college_id,$branch_id);
