// Make add button active on change 
$('#department').on('change',()=>{
    $("#add-department").prop( "disabled", false );
});

//Add the department to the institute
$('#add-department').on('click',function(e){
    e.preventDefault();
let department = $('#department').val();
let branch = $(this).data('branch-id');
let college_id = $('#department').data('college-id');
    $.ajax({
         url : "process/add-department.php",
         type : "POST",
         data : {department,branch,college_id},
         success : function(data)
             {
                 if(data == 0)
                 {
                 alert("Already added");
                 }else{
                    $('#selected-department').append(data);
                    $('#department').val(0);
                    $("#add-department").prop( "disabled", true );
                 }
             }
         });
});

//Delete selected department
$(document).on('click','.delete-department',function(){
    let delete_btn = $(this);
    let id = $(this).data('delete-department');
    $.ajax({
         url : "process/delete-department.php",
         type : "POST",
         data : {id},
         success : function(data)
             {
                 if(data == 1)
                 {
                    delete_btn.parent().parent().remove();
                 }else{
                 alert(data);
                 }
             }
         });
});

//Toggle department button
$('#not-in-department').on('click',function(e){
    e.preventDefault();
    let newDeptDiv = $('#new-department-div');
    if(newDeptDiv.hasClass("d-none"))
    {
        newDeptDiv.removeClass('d-none');
        newDeptDiv.addClass('d-flex flex-column');
        $('#new-department').focus();
    }else{
        newDeptDiv.removeClass('d-flex flex-column');
        newDeptDiv.addClass('d-none');
    }
});

//Add new department to db
$('#create-department').on('click',function(e){
    e.preventDefault();
    let new_department = $('#new-department').val();
    let branch_id = $(this).data('branch-id');
    let department_full_form = $('#new-department-full-form').val();
    if(new_department !== '' && department_full_form !== '')
    {
    $.ajax({
         url : "process/create-department.php",
         type : "POST",
         data : {new_department,department_full_form,branch_id},
         success : function(data)
             {
                $('#department').append(data);
                $('#new-department').val('');
                $('#new-department-full-form').val('');
                $('.disappear').show();
                $('.disappear').delay(4000).fadeOut(500); 
             }
         });
    }else{
        alert('Fill all fields properly');
    }
});

//To close the pop up of error
$('.close').on('click',()=>{
    $('.disappear').hide();
    });