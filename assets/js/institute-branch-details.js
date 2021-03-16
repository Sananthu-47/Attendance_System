$('#branch').on('change',()=>{
    $("#add-branch").prop( "disabled", false );
});

//Add the branch to the institute
$("#add-branch").on('click',function(e){
    e.preventDefault();
let branch = $('#branch').val();
let college_id = $('#branch').data('college-id');
    $.ajax({
         url : "process/add-branch.php",
         type : "POST",
         data : {branch,college_id},
         success : function(data)
             {
                 if(data == 0)
                 {
                 alert("Already added");
                 }else{
                    $('#selected-branches').append(data);
                    $('#branch').val(0);
                    $("#add-branch").prop( "disabled", true );
                 }
             }
         });
});

//Delete selected branch
$(document).on('click','.delete-branch',function(){
    let delete_btn = $(this);
    let id = $(this).data('delete-branch');
    $.ajax({
         url : "process/delete-branch.php",
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

//Toggle branch button
$('#not-in-branch').on('click',function(e){
    e.preventDefault();
    let newBranchDiv = $('#new-branch-div');
    if(newBranchDiv.hasClass("d-none"))
    {
        newBranchDiv.removeClass('d-none');
        newBranchDiv.addClass('d-flex flex-column');
        $('#new-branch').focus();
    }else{
        newBranchDiv.removeClass('d-flex flex-column');
        newBranchDiv.addClass('d-none');
    }
});

//Add new branch to db
$('#create-branch').on('click',function(e){
    e.preventDefault();
    let new_branch = $('#new-branch').val();
    let branch_full_form = $('#new-branch-full-form').val();
    if(new_branch !== '' && branch_full_form !== '')
    {
    $.ajax({
         url : "process/create-branch.php",
         type : "POST",
         data : {new_branch,branch_full_form},
         success : function(data)
             {
                $('#branch').append(data);
                $('#new-branch').val('');
                $('#new-branch-full-form').val('');
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

    // Go to add the departments for the each branches
    $(document).on('click','.go-add-department',function(e){
        e.preventDefault();
        let branch_id = $(this).data('add-department');
        let college_id = $(this).data('college-id');
        let type = $(this).data('type');
        
        $.ajax({
                url : "process/branch-department.php",
                type : "POST",
                data : {branch_id,college_id,type},
                success : function(data)
                    {
                    $('#branch-department-details').html(data);
                    }
                });
    });

 