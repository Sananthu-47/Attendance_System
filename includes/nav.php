<div class="login-navbar">
<i class="fa fa-bars" id='navbar' aria-hidden="true"></i>
<span class='text-capitalize'>Mange your college details</span>
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