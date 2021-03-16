<?php include "includes/header.php"; ?>


<!-- Holds all login features in it -->
<div class="login-wrapper">

<?php include "includes/nav.php";
include "Classes/Institute.php";
 $institute = new Institute();?>

<div class="app d-flex flex-column justify-content-center align-items-center">
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
    </form><!-- institute-form-update -->
        <!-- Holds all department and branch details -->
        <div class="bg-white p-3 branch-department-div">
            <!-- Add branches -->
            <div class="my-3" id='branch-department-details'>
                        <?php echo $institute->institute_branch_department('branch',$college_id,0);?>
            </div><!--</branch-department-details>-->
            <!-- Add subjects -->
            <div class="my-3" id='subject-details'>
            <div class='bg-primary-color p-2 text-white'>Manage subjects offered</div>
            <div class='d-md-flex justify-content-center align-items-center mx-auto my-2 col-lg-6 col-sm-12'>
                <select id='branch-subject' class='form-control input-login'>
                <option value='0'>Branch</option>
                <?php 
                    $query = "SELECT * FROM branch_selected WHERE institute = '$institute_id'";
                    $result = mysqli_query($connection,$query); 
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value='".$row['id']."'>".$institute->get_branch_by_id($row['branch'])['branch']."</option>";
                    } 
                ?>
                </select>
                <select id='class-subject' class='form-control input-login'>
                <option value='0'>Class</option>
                <?php
                    $query = "SELECT * FROM class";
                    $result = mysqli_query($connection,$query); 
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value='".$row['id']."'>".$row['class']."</option>";
                    } 
                ?>
                </select>
                <select id='department-subject' class='form-control input-login'>
                <option value='0'>Department</option>
                </select>
                <button class='btn btn-primary mx-2' id='view-class' disabled>View</button>
            </div>
            </div><!--</subject-details>-->
        </div><!--</branch-department-div>-->

    </div><!---</app>-->
</div><!-- </wrappper> -->

<?php include "includes/fotter.php"; ?>

