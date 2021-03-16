<div class="login-navbar d-flex justify-content-center">
    <div class='col-1'><i class="fa fa-bars" id='navbar' aria-hidden="true"></i></div>
    <div class='col-8'><span class='text-capitalize'>Manage your college details</span></div>
    <div class='col-2 d-flex justify-content-end mr-3'>
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
    <div class='list-group' id='all-nav'>
        <a href='index.php' class="navbar-side list-group-item-action active-nav">Home</a>
        <?php 
        if($user->get_data_by_id('role',$logged_in_id) == 'teacher')
        {
            echo "<a href='register.php' class='navbar-side list-group-item-action'>Add student</a>";
        }?>
        <a href='#' class="navbar-side list-group-item-action">Attendance</a>
        <?php 
        if($user->get_data_by_id('role',$logged_in_id) == 'teacher')
        {
        echo "<a href='all-students.php' class='navbar-side list-group-item-action'>All students</a>";
        }
        ?>
        <a href='#' class="navbar-side list-group-item-action">Calender</a>
        <a href='#' class="navbar-side list-group-item-action">Marks</a>
        <a href='#' class="navbar-side list-group-item-action">Time table</a>
        <?php 
        if($user->get_data_by_id('role',$logged_in_id) == 'teacher')
        {
        echo "<a href='update-institute.php' class='navbar-side list-group-item-action'>Institute details</a>";
        }
        ?>
    </div>
</div>

<script>
    $(document).on('click','#navbar',(e)=>{
        $('#side-nav').toggle();
    });

    $(document).ready(function() {
	var pathname = window.location.pathname;
    for(let i=0;i<$('#all-nav').children().length;i++)
    {
        if($('#all-nav').children()[i].href==="http://localhost"+pathname)
        {
            $('#all-nav').children()[i].classList.add('active-nav')
        }else if($('#all-nav').children()[i].classList.contains('active-nav')){
           $('#all-nav').children()[i].classList.remove('active-nav');
        }
    }
});
</script>