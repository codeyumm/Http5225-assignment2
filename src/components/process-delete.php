<?php

echo "Hello from process-delete.php";
echo $_GET['food_item_id'];

// Include database connection PHP file
include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');

$conn = ConnectDB();

$food_item_id = $_GET['food_item_id']; // Sanitize or validate user input as needed

$query = 'DELETE FROM food_items WHERE food_item_id = ' . $food_item_id;

echo $query;

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: Failed to execute statement.";
    error_log("Failed to execute statement for food_item_id: " . $food_item_id);
    exit;
}

if (mysqli_affected_rows($conn) > 0) {
    header("Location: /Http5225-assignment2/src/admin/items.php?status=itemDeleted");
} else {
    echo "No records deleted.";
}

?>
