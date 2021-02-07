<?php include "includes/header.php"; 

if(!isset($_SESSION['logged_in_id']))
    {
        header('Location:login-ui.php');
    }
?>

<!-- body -->
<?php include "includes/nav.php"; ?>
<?php include 'Users/User.php' ?>

<div class="app">
    <?php  $user = new User();
echo $user->get_data_by_id('username',$logged_in_id); ?>
</div>


<?php include "includes/fotter.php"; ?>