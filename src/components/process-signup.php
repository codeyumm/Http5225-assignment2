<?php

// check if request coming is post or not and is coming from singup form
if (isset($_POST['isFromSignup'])) {

    // validate data from request

    // validate firstname if empty or not
    if (empty($_POST['firstName'])) {
        die("First name is required.");
    }

    // validate lastname if empty or not
    if (empty($_POST['lastName'])) {
        die("Last name is required.");
    }

    // validate email if empty or not and is in proper form or not
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email.");
    }

    // password validation

    if (strlen($_POST['password']) < 4) {
        die("Password must be at least 4 characters.");
    }

    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter.");
    }

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        die("Both passwords must match");
    }

    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // connect to database
    include('../connection.php');

    $conn = ConnectDB();

    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("ssss",
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $password_hash);

    // run the query on database and store the result
    if ($stmt->execute()){

        // when user is added by admin
        session_start();

        if( $_SESSION['isAdmin'] ){
            header("Location: /Http5225-assignment2/src/admin/users.php?status=newUser");
            exit;
        }



        header("Location: /Http5225-assignment2/src/login.php?status=newUser");


    } else {
        die($conn->error);
    }

}

?>
