<?php

echo "hello from delete user";

// Include database connection PHP file
include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');

$conn = ConnectDB();

$user_id = $_GET['user_id']; // Sanitize or validate user input as needed

$query = 'DELETE FROM users WHERE id = ' . $user_id;

echo $query;

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: Failed to execute statement.";
    exit;
}

if (mysqli_affected_rows($conn) > 0) {
    header("Location: /Http5225-assignment2/src/admin/users.php?status=itemDeleted");
} else {
    echo "No records deleted.";
}

?>
