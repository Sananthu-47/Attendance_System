<?php include "includes/header.php"; ?>

<!-- Holds all login features in it -->
<div class="login-wrapper">
    <!-- Navbar for the login page -->
        <div class="login-navbar">
            <span class='text-capitalize'>Mange your college details</span>
        </div>
    <!-- Login body holds all the elments in it -->
    <div class="d-flex justify-content-center align-items-center h-100">
    <form class='d-flex flex-column justify-content-center bg-white p-3' id='institute-form'>
    <div class="bg-primary-color p-2 my-2 text-white">Your institute details</div>
            <!-- Institute name -->
            <div class="my-3 form-group">
                <label for="full-name" class='mx-2 badge badge-dark d-inline'>Institute name:</label>
                <input type="text" name="full_name" id="full-name" placeholder="Institute name" class='form-control m-1 border border-dark'>
            </div>

            <!-- Institute code name -->
            <div class="my-3 form-group">
                <label for="short-name" class='mx-2 badge badge-dark d-inline'>Institute Code:</label>
                <input type="text" name="short_name" id="short-name" placeholder="Institute name" class='form-control m-1 border border-dark'>
            </div>
            <span class='text-danger'>* Example: T JOHN INSTITUTE OF TECHNOLOGY => TJIT</span>

            <!-- Location -->
            <div class="my-3 form-group">
                <label for="location" class='mx-2 badge badge-dark d-inline'>Location:</label>
                <input type="text" name="location" id="location" placeholder="Location" class='form-control m-1 border border-dark'>
            </div>

<input type="submit" value="Authorize" class='btn btn-success' id='authorize'>

    </form>
    </div><!--- </login-body> -->
</div><!-- </wrappper> -->
    

    <script>
$("#authorize").on('click',(e)=>{
e.preventDefault();

    let data = $("#registerSubmit").serialize();
    $.ajax({
        type : "POST",
        url : "process/authorize.php",
        data : $("#institute-form").serialize(),
        success : function(data){
            switch(data)
            {
                case "0":
                    alert('All fields should be filled');
                break;
                case "1":
                    window.location.href = 'login-ui.php';
                break;
                case "2":
                    alert('Institute already registered');
                break;
            }
        }
    });
});

    </script>