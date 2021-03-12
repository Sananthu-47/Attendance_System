<?php include "includes/header.php"; ?>

<!-- Holds all login features in it -->
<div class="login-wrapper">

<?php include "includes/nav.php";
include "Classes/Institute.php";
 $institute = new Institute();?>

<div class="app d-flex justify-content-center align-items-center">
    <form class='d-flex flex-column justify-content-center bg-white p-3' id='institute-form-update'>
    <div class="bg-primary-color p-2 my-2 text-white">Your institute details</div>
            <!-- Institute name -->
            <div class="my-3 form-group">
                <label for="full-name" class='mx-2 badge badge-dark d-inline'>Institute name:</label>
                <input type="text" name="full_name" id="full-name" placeholder="Institute name" class='form-control m-1 border border-dark' value="<?php $college_id =  $user->get_data_by_id('institute',$logged_in_id);
                    $institute_detail = $institute->get_institute_details($college_id);
                    echo $institute_detail['institute_name']; ?>">
            </div>

            <!-- Institute code name -->
            <div class="my-3 form-group">
                <label for="short-name" class='mx-2 badge badge-dark d-inline'>Institute Code:</label>
                <input type="text" name="short_name" id="short-name" placeholder="Institute name" class='form-control m-1 border border-dark' value="<?php echo $institute_detail['name']; ?>">
            </div>
            <span class='text-danger'>* Example: T JOHN INSTITUTE OF TECHNOLOGY => TJIT</span>

            <!-- Location -->
            <div class="my-3 form-group">
                <label for="location" class='mx-2 badge badge-dark d-inline'>Location:</label>
                <input type="text" name="location" id="location" placeholder="Location" class='form-control m-1 border border-dark' value="<?php echo $institute_detail['location']; ?>">
            </div>

            <!-- Add branches -->
            <div class="my-3 form-group">
                <div class="bg-primary-color p-2 text-white">Add your institute offered branches</div>
                    <div class="d-flex justify-content-center align-items-center mx-auto my-2 col-lg-6 col-sm-12">
                    <select id="branch" class='form-control input-login' data-college-id='<?php echo $college_id; ?>'>
                                <option value="0">Add branch</option>
                                <?php 
                                $institute->get_all_branch();
                            ?>
                    </select>
                    <button class='btn btn-success mx-2' id='add-branch' disabled>Add</button>
                    <button class='btn btn-warning badge' id='not-in-branch'>Not in list?</button>
                    </div>

                <div class='disappear success-field' style='display:none'><span class='error-data'>New branch created</span><i class='fa fa-times close text-secondary'></i></div>

                        <div class="my-2 px-5 w-100 justify-content-center d-none" id='new-branch-div'>
                            <input type="text" id="new-branch" placeholder='Add new branch'>
                            <button class='btn btn-primary mx-2' id='create-branch'>Create</button>
                        </div>

                    <div class="all-branch col-lg-5 col-12 mx-auto">
                        <header class='bg-dark text-light p-1'>Selected branches</header>
                            <ul class="list-group" id='selected-branches'>
                            <?php 
                                $institute->get_all_selected_branch($college_id);
                            ?>
                            </ul>
                    </div>
            </div>

    </form>
    </div><!---</app>-->
</div><!-- </wrappper> -->

<script>

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
                        delete_btn.parent().remove();
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
            newBranchDiv.addClass('d-flex');
            $('#new-branch').focus();
        }else{
            newBranchDiv.removeClass('d-flex');
            newBranchDiv.addClass('d-none');
        }
    });

    //Add new branch to db
    $('#create-branch').on('click',function(e){
        e.preventDefault();
        let new_branch = $('#new-branch').val();
        $.ajax({
             url : "process/create-branch.php",
             type : "POST",
             data : {new_branch},
             success : function(data)
                 {
                    $('#branch').append(data);
                    $('#new-branch').val('');
                    $('.disappear').show();
                    $('.disappear').delay(4000).fadeOut(500); 
                 }
             });
    });

    //To close the pop up of error
    $('.close').on('click',()=>{
    $('.disappear').hide();
    });
</script>


