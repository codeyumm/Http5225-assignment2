<?php
 $is_invalid = false;


    // check if request coming is post and coming from the login form
    if(isset( $_POST['isFromLogin'])){
        
        // check if user is invalid
        if ($is_invalid) {

            // redirect to login page
            echo("User is invalid");
            exit;
        }

       
        
        // get the email and password from request
        $email = $_POST['email'];

        // connect to database
        include('../connection.php');

        $conn = ConnectDB();
    

        $query = sprintf("SELECT * FROM user WHERE email = '%s'", 
                            $conn->real_escape_string($_POST['email']));


        $result = mysqli_query($conn, $query);

        $user = $result -> fetch_assoc();

        // at this point we know that user exist
        if ($user) {

            if ( password_verify($_POST['password'], $user['password'])) {

                die("login successful");
            }
        }

        // if user is invalid
        $is_invalid = true;

        exit;

        $password = $_POST['password'];

        // get the hash of password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);


    }

?>