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
                    <select id="branch" class='form-control input-login'>
                                <option value="0">Add branch</option>
                                <?php 
                                $institute->get_all_branch();
                            ?>
                    </select>
                    <button class='btn btn-success mx-2' id='add-branch' disabled>Add</button>
                    <button class='btn btn-primary'>New</button>
                    </div>

                    <div class="all-branch col-lg-5 col-10 mx-auto">
                        <header class='bg-dark text-light p-1'>Selected branches</header>
                            <ul class="list-group" id='selected-branches'>
                            <?php 
                                $institute->get_all_selected_branch(0);
                            ?>
                            </ul>
                    </div>
            </div>

    </form>
    </div><!---</app>-->
</div><!-- </wrappper> -->


<script>
const selected_branches = [];

    $('#branch').on('change',()=>{
        $("#add-branch").prop( "disabled", false );
    });

    //Add the branch to the institute
    $("#add-branch").on('click',function(e){
        e.preventDefault();
        let branch = $('#branch').val();
        
        if(!selected_branches.includes(String(branch)) && branch != 0)
        {
        selected_branches.push(branch);
        $('#selected-branches').append(`<li class='list-group-item'>${branch}</li>`);
        $('#branch').val(0);
        $("#add-branch").prop( "disabled", true );
        }else{
            alert('Alredy added');
        }
    });
</script>



