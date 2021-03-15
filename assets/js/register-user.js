 //Global variables
 let role = 'student';

 //Change branch on basis of institute
 $('#institute').on('change',function(){
    let institute = $(this).val();
    if($(this).val() == '0')
    {
        $('#branch').html( "<option value='0'>Select your branch</option><option value='0' disabled>Select your institute first</option>");
        $('#department').html( "<option value='0'>Select your department</option><option value='0' disabled>Select your branch first</option>");
    }else{
    $.ajax({
        url : "process/get-branch.php",
        type : "POST",
        data : {institute},
        success : function(data)
            {
                if(data !== '')
                {
                    $('#branch').html( "<option value='0'>Select your branch</option>"+data);
                    $('#branch').data('college-id',institute);
                }else{
                    $('#branch').html( "<option value='0'>Select your branch</option>");
                }
            }
        });
    }
});

 //Change branch and get department on basis of branch
     $('#branch').on('change',function(){
             let branch = $(this).val();
             let institute = $(this).data('college-id');
             if($(this).val() == '0')
            {
                $('#department').html( "<option value='0'>Select your department</option><option value='0' disabled>Select your branch first</option>");
            }else{
         $.ajax({
             url : "process/get-department.php",
             type : "POST",
             data : {branch,institute},
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
         $('#branch-div').hide();
         $('#dept-div').hide();
         $('#class-div').removeClass('d-md-flex');
         $('#branch-div').removeClass('d-md-flex');
         $('#dept-div').removeClass('d-md-flex');
         role = 'teacher';
     });
 //Select the role of student
 $('#student').on('click',(e)=>{
     e.preventDefault();
     $('#student').addClass('selected');
     $('#teacher').removeClass('selected');
     $('#class-div').show();
     $('#branch-div').show();
     $('#dept-div').show();
     $('#class-div').addClass('d-md-flex');
     $('#branch-div').addClass('d-md-flex');
     $('#dept-div').addClass('d-md-flex');
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
 