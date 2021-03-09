<?php include "includes/header.php"; 

if(!isset($_SESSION['logged_in_id']))
    {
        header('Location:login-ui.php');
    }
?>

<!-- body -->

<?php 
include "includes/nav.php"; ?>

<div class="app">
    <!-- Heading banner -->
    <div class='p-2 bg-primary-color text-white'>
        <h4>WELCOME <?php echo $user->get_data_by_id('username',$logged_in_id); ?></h4>
    </div>
    <!-- Notification -->
    <div class="notification-holder">
        <div class='p-2 bg-white text-center'>
            <h4>Notifications:</h4>
        </div>
        <div class='notifications m-auto'>
            <ul class="list-group">
                <li class='list-group-item'>Hello</li>
                <li class='list-group-item'>lorem50 hhhho jhgftrdesdfg styfg</li>
                <li class='list-group-item'>Hello</li>
            </ul>
            <button class='btn btn-primary my-2 self-align'>Load more</button>
        </div><!-- Notifications --->
    </div><!--- notification holder -->

    <!-- Present me -->
    <div class="present-add bg-white my-5 d-flex justify-content-center align-items-center p-2">
        <div class="mx-3">Give my present<p class='text-danger'>Note: This process is irreversable</p></div>
        <div class="mx-3"><button class='btn btn-success'>Present</button></div>
        <div class="mx-3 h5 text-primary">Number of presents: 15</div>
    </div>

</div><!--App-->


<?php include "includes/fotter.php"; ?>