<div class="login-navbar">
    <div class='col-1 p-0'><i class="fa fa-bars" id='navbar' aria-hidden="true"></i></div>
    <div class='col-9 p-0'><span class='text-capitalize'>Mange your college details</span></div>
    <div class='col-2 p-0 d-flex justify-content-end mr-3'>
    <a href="includes/logout.php"><i class="fa fa-sign-out mx-2 text-white"></i></a>
    <a href="index.php" class='remove-decoration-of-anchor'><div style='background-color:<?php printf( "#%06X\n", mt_rand( 0x200000, 0x900000 )); ?>' class='profile-small text-white text-uppercase'>
    <?php $username = $user->get_data_by_id('username',$logged_in_id); 
        foreach (explode(' ',$username) as $value) {
            echo $value[0];
        }
    ?></div></a>
    </div>
</div>

<div id="side-nav" style='display:none;'>
<!-- <div id="side-nav"> -->
    <div class='list-group'>
        <a href='index.php' class="navbar-side list-group-item-action active-nav">Home</a>
        <a href='#' class="navbar-side list-group-item-action">Add student</a>
        <a href='#' class="navbar-side list-group-item-action">Attendance</a>
        <a href='#' class="navbar-side list-group-item-action">Calender</a>
        <a href='#' class="navbar-side list-group-item-action">Marks</a>
        <a href='#' class="navbar-side list-group-item-action">Time table</a>
    </div>
</div>

<script>
    $(document).on('click','#navbar',(e)=>{
        $('#side-nav').toggle();
    });
</script>