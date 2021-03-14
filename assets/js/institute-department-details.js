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