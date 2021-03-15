<?php
include "../includes/db.php";
include "../Classes/Institute.php";
$institute = new Institute();
$institute_id = $_POST['institute'];

$query = "SELECT * FROM branch_selected WHERE institute = '$institute_id'";
$output = '';
$result = mysqli_query($connection,$query); 
if(mysqli_num_rows($result)<1)
{
    $output.= "<option value='0' disabled>No branches found</option>";
}else{
    while($row = mysqli_fetch_assoc($result))
    {
        $branch = $institute->get_branch_by_id($row['branch']);
        $output.= "<option value='".$row['branch']."'>".$branch['branch']."</option>";
    }
}

    echo $output;