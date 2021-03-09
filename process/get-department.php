<?php
include "../includes/db.php";
$branch = $_POST['branch'];

    $query = "SELECT * FROM department WHERE branch = '$branch'";
    $result = mysqli_query($connection,$query); 
        while($row = mysqli_fetch_assoc($result))
        {
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }