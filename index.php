<?php include "includes/header.php"; ?>
   
<?php
    if(!isset($_SESSION['user_id']))
    {
        header('Location:login-ui.php');
    }
?>

<?php include "includes/fotter.php"; ?>