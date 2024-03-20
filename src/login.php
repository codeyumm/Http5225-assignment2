<!DOCTYPE html>
<html lang="en">

<!-- Include header from shared layout -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php'); ?>

<body>

<?php
    // Include database connection PHP file
    include('../src/connection.php');

    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php');
?>




<!-- check if request coming from process-loging.php with invalid status  -->
<?php

    // Check if the status parameter exists in the URL
    if(isset($_GET['status'])) {
        // Check the value of the status parameter
        $status = $_GET['status'];
        
        // Display appropriate message based on the status
        if($status === "invalid") {

            echo  '<div class="alert alert-danger alert-dismissible fade show">
                        <strong>Username or password is invalid.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';

        } elseif ($status === "newUser") {

            echo '<div class="alert alert-success alert-dismissible fade show">
                        <strong>Registration successful. Now you can login.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>';

        }
    }

?>


<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="reg-form-container px-4">
                <form action="./components/process-login.php" method="POST" id="reg-form" class="p-4" novalidate>



                    <div class="form-group mb-4">
                        <label for="email">Email address</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>
                    </div>


                    <input type="hidden"  value="true" name="isFromLogin">

                    <input type="submit"  value="Login" class="btn btn-dark">
                                    
                    
                </form>
            </div>
        </div>
    </div>
</div>







</body>
</html>