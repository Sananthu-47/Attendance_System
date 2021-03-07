//Global variables
let role = 'student';
const errorField = $('.disappear');//Get the error filed of to show the pop up messages

//Select the role of teacher
$('#teacher').on('click',(e)=>{
    e.preventDefault();
    $('#student').removeClass('selected');
    $('#teacher').addClass('selected');
    role = 'teacher';
});
//Select the role of student
$('#student').on('click',(e)=>{
    e.preventDefault();
    $('#student').addClass('selected');
    $('#teacher').removeClass('selected');
    role = 'student';
});

//Send an ajax request to login.php to verify the user
$("#login").on('click',function(e){
e.preventDefault();
let reg_id = $('#login-id').val();
let password = $('#login-password').val();
if(reg_id !== '' && password !== '' && role !== '')
{
    $.ajax({
    url : "process/login.php",
    type : "POST",
    data : {reg_id,password,role},
    success : function(data)
    {
        if(data === 'Entered wrong details')
        {
            $('.error-data').html(data);
            errorField.addClass('danger-field');//Add red bg and color
            errorField.show();
        }
        else{
            errorField.hide();
            window.location.href = 'index.php';
        }
    }
    });
}else{
    $('.error-data').html('Fill all fields properly');
    errorField.addClass('danger-field');//Add red bg and color
    errorField.show();
}
});

$(document).on('keyup',(e)=>{
if(e.keyCode === 13)
{
    $('#login').click();
}
});

//To close the pop up of error
$('.close').on('click',()=>{
$('.disappear').hide();
});