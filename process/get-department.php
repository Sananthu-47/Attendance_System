<?php
include "../includes/db.php";
include "../Classes/Institute.php";
$institute = new Institute();
$branch = $_POST['branch'];
$institute_id = $_POST['institute'];

    $query = "SELECT * FROM department_selected WHERE branch = '$branch' AND institute = '$institute_id'";
    $result = mysqli_query($connection,$query); 
    $output = '';
    if(mysqli_num_rows($result)<1)
{
    $output.= "<option value='0' disabled>No department found</option>";
}else{
        while($row = mysqli_fetch_assoc($result))
        {
        $department = $institute->get_department_by_id($row['department']);
        $output.= "<option value='".$row['department']."'>".$department['department']."</option>";
        }
}

echo $output;