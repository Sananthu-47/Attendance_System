<?php include "includes/header.php"; ?>

<!-- Holds all register features in it -->
    <div class="login-wrapper">
        <!-- Navbar for the register page -->
        <div class="login-navbar">
            <span class='text-capitalize'>Mange your college details</span>
        </div>
        <!-- Login body holds all the elments in it -->
        <div class="login-body">
        <!-- This holds the card structure of login page -->
            <div class="register-card card">
            <!-- Login header to show this is the login card -->
                <div class="login-header">
                <span class="text-center text-white">Register Here</span>
                </div>
                <!-- This holds all the fields in  login card -->
                <div class="login-all-fields">
                    <form id='register-form'>
                    <!-- Hold the data in flex for student and teacher ;ogin buttons -->
                    <div class="p-3 role-data d-flex justify-content-around align-items-center">
                        <span class='badge badge-dark d-inline'>Role:</span>
                        <button id='student' tyep='button' class="btn btn-light selected">Student</button>
                        <button id='teacher' type='button' class="btn btn-light">Teacher</button>
                    </div><!-- </role-data> -->
                    <!-- Login fields -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center">
                        <label for="id" class='mx-2 badge badge-dark d-inline'>Registeration id:</label>
                        <input type="text" name="id" id="reg-id" placeholder="Registration id" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Username -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center">
                        <label for="username" class='mx-2 badge badge-dark d-inline'>Username:</label>
                        <input type="text" name="username" id="username" placeholder="Username" class='px-5 py-2 input-login'>
                    </div>
                     <!-- Email -->
                     <div class="my-3 d-md-flex justify-content-around align-items-center">
                        <label for="email" class='mx-2 badge badge-dark d-inline'>Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Institute -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center px-2">
                        <label for="institute" class='mx-2 badge badge-dark d-inline'>Institute:</label>
                        <select id="institute" class='form-control input-login'>
                            <option value="0">Select your institute</option>
                        <?php 
                             $query = "SELECT * FROM institute";
                             $result = mysqli_query($connection,$query); 
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$row['name']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <!-- Class -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center px-2" id='class-div'>
                        <label for="class" class='mx-2 badge badge-dark d-inline'>Class:</label>
                        <select id="select-class" class='form-control input-login'>
                            <option value="0">Select your class</option>
                        <?php 
                             $query = "SELECT * FROM class";
                             $result = mysqli_query($connection,$query); 
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$row['class']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <!-- Branch -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center px-2">
                        <label for="branch" class='mx-2 badge badge-dark d-inline'>Branch:</label>
                        <select id="branch" class='form-control input-login'>
                            <option value="0">Select your branch</option>
                        <?php 
                             $query = "SELECT * FROM branch";
                             $result = mysqli_query($connection,$query); 
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$row['branch']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <!-- Department -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center px-2">
                        <label for="department" class='mx-2 badge badge-dark d-inline'>Department:</label>
                        <select id="department" class='form-control input-login'>
                            <option value="0">Select your department</option>
                        </select>
                    </div>
                    <!-- Password field -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center">
                        <label for="id" class='mx-2 badge badge-dark d-inline'>Password:</label>
                        <input type="password" name="password" id="register-password" placeholder="Password" value='123456' class='px-5 py-2 input-login'>
                    </div>
                    <!-- Important note to show the default password set is 123456 -->
                    <span class='text-danger small px-1'>* The default password set is 123456 its highly recommended to change it</span>
                    <!--Conform Password field -->
                    <div class="my-3 d-md-flex justify-content-around align-items-center">
                        <label for="id" class='mx-2 badge badge-dark d-inline'>Confirm password:</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Sigin button to create new teacher account -->
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <button class='btn btn-primary' id='register'>Register</button>
                    </div><!--</sigin> -->
                        </form>
                    <div class='disappear' style='display:none'><span class='error-data'></span><i class='fa fa-times close text-secondary'></i></div>
                    <!-- Flex to login button and forget password -->
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <span class='text-danger mx-2'>Already have an account?</span>
                        <a href='login-ui.php' class='decoration'><button class='btn btn-success px-4 input-login'>Login</button></a>
                    </div><!-- </login button div> -->
                </div><!-- </login-all-fields> -->
            </div><!-- </login-card> -->
        </div><!--</login-body>-->
    </div><!-- </wrappper> -->
    <script>
    //Global variables
    let role = 'student';

//Change branch and get department on basis of branch
    $('#branch').on('change',()=>{
        if($('#branch').val() !== '0')
        {
            let branch = $('#branch').val();
        $.ajax({
            url : "process/get-department.php",
            type : "POST",
            data : {branch},
            success : function(data)
                {
                    if(data !== '')
                    {
                        $('#department').html( "<option value='0'>Select your department</option>"+data);
                    }else{
                        $('#department').html( "<option value='0'>Select your department</option>");
                    }
                }
            });
        }
    });

// Check for confirm password
$('#confirm-password').on('keyup',()=>{
    let newPassword = $('#confirm-password').val();
    let password = $('#register-password').val();
    if(newPassword !== password)
    {
        $('#confirm-password').addClass('border border-danger');
    }else{
        $('#confirm-password').removeClass('border-danger');
        $('#confirm-password').addClass('border-success');
    }
});

//Select the role of teacher
$('#teacher').on('click',(e)=>{
    e.preventDefault();
        $('#student').removeClass('selected');
        $('#teacher').addClass('selected');
        $('#class-div').hide();
        $('#class-div').removeClass('d-md-flex');
        role = 'teacher';
    });
//Select the role of student
$('#student').on('click',(e)=>{
    e.preventDefault();
    $('#student').addClass('selected');
    $('#teacher').removeClass('selected');
    $('#class-div').show();
    $('#class-div').addClass('d-md-flex');
    role = 'student';
});

// Register user
$('#register-form').on('submit',(e)=>{
    e.preventDefault();
    //Get all values to send to the register-user.php
    let regId = $('#reg-id').val();
    let username = $('#username').val();
    let email = $('#email').val();
    let institute = $('#institute').val();
    let classSelected = $('#select-class').val();
    let branch = $('#branch').val();
    let department = $('#department').val();
    let password = $('#register-password').val();
    let confirmPassword = $('#confirm-password').val();
    //If any data is not entered then it will show a alert to fill it properly
    if(password === confirmPassword && regId !== '' && username !== '' && email !== '' && institute !== '' && branch !== 0 && department !== 0) 
    {
        if(role === 'student' && classSelected !== 0 || role === 'teacher')
        {
        $.ajax({
            url : "process/register-user.php",
            type : "POST",
            data : {regId,username,email,institute,branch,department,password,role,classSelected},
            success : function(data)
                {
                    const errorField = $('.disappear');//Get the error filed of to show the pop up messages
                   if(data == 1)
                   {
                        $('.error-data').html(`User added successfully!`);
                        errorField.addClass('success-field');//Add the sucess bg and color
                        errorField.removeClass('danger-field');//Remove if exists red bg and color
                        errorField.show();
                        //To remove the alert message after 3sec
                        setTimeout(() => {
                            errorField.hide();
                        }, 3000);
                        document.getElementById('register-form').reset();//Reset form
                        $('#register-password').val('123456');//Reset the password back to 123456
                        $('#confirm-password').removeClass('border border-sucess');//Reset the border color
                        $('#department').html( "<option value='0'>Select your department</option>");//Reset the department options
                   }else{
                        $('.error-data').html(data);
                        errorField.addClass('danger-field');//Add red bg and color
                        errorField.removeClass('success-field');//Remove if exists sucess bg and color
                        errorField.show();
                   }
                }
            });
        }else{
            alert('Select your class to proceed');
        }
    }else{
        alert('Enter all field data properly');
    }
});

//To close the pop up of error
$('.close').on('click',()=>{
    $('.disappear').hide();
});

    </script>

<?php include "includes/fotter.php"; ?>