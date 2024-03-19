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


<?php echo $_SERVER['DOCUMENT_ROOT'] . '/Http-5225-assignment2/src/connection.php' ?>



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