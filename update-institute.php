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
            <div class="my-3 form-group" id='institute-detail'>
                <?php echo $institute->institute_branch_department('branch',$college_id); ?>
            </div><!--</institute-detail>-->

    </form>
    </div><!---</app>-->
</div><!-- </wrappper> -->

<script src='assets/js/update-institute.js'></script>



