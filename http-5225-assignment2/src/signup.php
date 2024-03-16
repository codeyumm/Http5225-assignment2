<!DOCTYPE html>
<html lang="en">

<!-- include constants.php for paths -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/http-5225-assignment2/constants.php'); ?>

<!-- inclue header from shared layout -->
<?php include( $sharedLayout . '/header.php'); ?>

<body>


<?php

    // include database connection php file
    include($_SERVER['DOCUMENT_ROOT'] . '/http-5225-assignment2/src/connection.php');

    // include nav bar from layout
    include($sharedLayout . '\nav.php');


?>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="reg-form-container px-4">
                <form action="./components/process-signup.php" method="POST" id="reg-form" class="p-4" novalidate>

                    <div class="form-group mb-4">
                        <label for="firstName">First Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter first name" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="lastName">Last Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter last name" required>
                        </div>
                    </div>

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

                    <div class="form-group mb-4">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder=" Re-enter password" required>
                        </div>
                    </div>

                    <input type="hidden"  value="true" name="isFromSignup">

                    <input type="submit"  value="Register" class="btn btn-dark">
                                    

                </form>
            </div>
        </div>
    </div>
</div>







</body>
</html>