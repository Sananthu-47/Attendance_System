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
                    <!-- Login fields -->
                    <div class="my-3">
                        <label for="id" class='px-2'>Registeration id:</label>
                        <input type="text" name="id" id="login-id" placeholder="Registration id" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Username -->
                    <div class="my-3">
                        <label for="username" class='px-2'>Username:</label>
                        <input type="text" name="username" id="username" placeholder="Username" class='px-5 py-2 input-login'>
                    </div>
                     <!-- Email -->
                     <div class="my-3">
                        <label for="email" class='px-2'>Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Institute -->
                    <div class="my-3">
                        <label for="institute" class='px-2'>Institute:</label>
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
                    <!-- Branch -->
                    <div class="my-3">
                        <label for="branch" class='px-2'>Branch:</label>
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
                    <div class="my-3">
                        <label for="department" class='px-2'>Department:</label>
                        <select id="department" class='form-control input-login'>
                            <option value="0">Select your department</option>
                        <?php 
                             $query = "SELECT * FROM department";
                             $result = mysqli_query($connection,$query); 
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option>".$row['name']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <!-- Password field -->
                    <div class="my-3">
                        <label for="id" class='px-2'>Password:</label>
                        <input type="password" name="password" id="register-password" placeholder="Password" class='px-5 py-2 input-login'>
                    </div>
                    <!--Conform Password field -->
                    <div class="my-3">
                        <label for="id" class='px-2'>Confirm password:</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password" class='px-5 py-2 input-login'>
                    </div>
                    <!-- Sigin button to create new teacher account -->
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <button class='btn btn-primary'>Register</button>
                    </div><!--</sigin> -->
                    <!-- Flex to login button and forget password -->
                    <div class="d-flex justify-content-center align-items-center py-3">
                        <span class='text-danger mx-2'>Already have an account?</span>
                        <a href='login-ui.php'><input type="button" value="Login" class='btn btn-success input-login px-4'></a>
                    </div><!-- </login button div> -->
                </div><!-- </login-all-fields> -->
            </div><!-- </login-card> -->
        </div><!--</login-body>-->
    </div><!-- </wrappper> -->
    <script>

    </script>

<?php include "includes/fotter.php"; ?>