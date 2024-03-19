<?php


    // check if request coming is post or not and is coming from singup form
    if(  isset($_POST['isFromSignup']) ){
        
        // validate data from request
        if( empty($_POST['firstName']) ){
            die("First name is required.");
        }

        if( empty($_POST['lastName']) ){
            die("Last name is required.");
        }

        if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            die("Please enter valid email.");
        }

        print_r($_POST);

    }

?>