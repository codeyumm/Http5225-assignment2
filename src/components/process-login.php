<?php



    // check if request coming is post and coming from the login form
    if(isset( $_POST['isFromLogin'])){
       

        
        // get the email and password from request
        $email = $_POST['email'];

        // connect to database
        include('../connection.php');

        $conn = ConnectDB();
    

        $query = sprintf("SELECT * FROM users WHERE email = '%s'", 
                            $conn->real_escape_string($_POST['email']));


        $result = mysqli_query($conn, $query);

        $user = $result -> fetch_assoc();

        // at this point we know that user exist
        // check if user exists
        if ($user) {
            // verify password
            if (password_verify($_POST['password'], $user['password'])) {

                // start the session and set user id in session array
                session_start();

                $_SESSION['user_id'] = $user["id"];
                $_SESSION['user_fname'] = $user["first_name"];
                $_SESSION['user_lname'] = $user["last_name"];




                header("Location: /Http5225-assignment2/index.php");

            } else {

                $is_invalid = true;

            }
        } else {

            $is_invalid = true;
        }


        if ($is_invalid) {

            header("Location: /Http5225-assignment2/src/login.php?status=invalid");

            exit;
        }

        $password = $_POST['password'];

        // get the hash of password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);


    }

?>