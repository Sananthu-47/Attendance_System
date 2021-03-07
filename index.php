<?php include "includes/header.php"; 

if(!isset($_SESSION['logged_in_id']))
    {
        header('Location:login-ui.php');
    }
?>

<!-- body -->

<?php include 'Classes/User.php';
$user = new User();
include "includes/nav.php"; ?>

<div class="app">
    <?php  
echo $user->get_data_by_id('username',$logged_in_id); ?>
</div>


<?php include "includes/fotter.php"; ?>