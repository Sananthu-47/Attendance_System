<?php include "includes/header.php"; ?>

<!-- Holds all login features in it -->
    <div class="login-wrapper">
    <!-- Navbar for the login page -->
        <div class="login-navbar">
            <span class='text-capitalize'>Mange your college details</span>
        </div>
    <!-- Login body holds all the elments in it -->
        <div class="login-body">
        <!-- This holds the card structure of login page -->
            <div class="login-card card">
            <!-- Login header to show this is the login card -->
                <div class="login-header">
                <span class="text-center text-white">Login Here</span>
                </div>
                <!-- This holds all the fields in  login card -->
                <div class="login-all-fields">
                <!-- Hold the data in flex for student and teacher ;ogin buttons -->
                    <div class="p-3 role-data d-flex justify-content-around align-items-center">
                        <span>Role:</span>
                        <button id='student' class="btn btn-light selected">Student</button>
                        <button id='teacher' class="btn btn-light">Teacher</button>
                    </div><!-- </role-data> -->
                    <!-- Login fields -->
                    <div class="d-flex align-items-center my-3">
                        <label for="id" class='px-2'>Login id:</label>
                        <input type="text" name="id" id="login-id" placeholder="Registration id" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Password field -->
                    <div class="d-flex align-items-center my-3">
                        <label for="id" class='px-2'>Password:</label>
                        <input type="password" name="password" id="login-password" placeholder="Password" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Flex to login button and forget password -->
                    <div class="d-flex justify-content-around py-3">
                        <input type="button" value="Login" id='login' data-role='student' class='btn btn-success input-login px-4'>
                        <span class='text-primary'>Fogot password?</span>
                    </div><!-- </login button div> -->
                    <!-- Sigin button to create new teacher account -->
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <span class='text-danger mx-2'>Create a teacher account</span>
                        <a href='register.php'><button class='btn btn-primary'>Signin</button></a>
                    </div><!--</sigin> -->
                </div><!-- </login-all-fields> -->
            </div><!-- </login-card> -->
        </div><!-- </login-body> -->
    </div><!-- </wrappper> -->
    
    <script>
    //Select the role of teacher
    $('#teacher').on('click',(e)=>{
        $('#student').removeClass('selected');
        $('#teacher').addClass('selected');
        $('#login').attr('data-role','teacher');
    });
    //Select the role of student
    $('#student').on('click',(e)=>{
        $('#student').addClass('selected');
        $('#teacher').removeClass('selected');
        $('#login').attr('data-role','student');
    });

    //Send an ajax request to login.php to verify the user
$("#login").on('click',function(e){
    e.preventDefault();
    let reg_id = $('#login-id').val();
    let password = $('#login-password').val();
    let role = $(this).data('role');
    if(reg_id !== '' && password !== '' && role !== '')
    {
        $.ajax({
        url : "process/login.php",
        type : "POST",
        data : {reg_id,password,role},
        success : function(data)
        {
            if(data !== '')
            {
                console.log(data);
            }else{
                alert("You have entered wrong details");
            }
        }
        });
    }else{
        alert('Fill all the fields');
    }
});
    </script>

<?php include "includes/fotter.php"; ?>