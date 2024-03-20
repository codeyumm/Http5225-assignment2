<?php 
    // Include database connection
    include("../connection.php");
        
    // Check if the request is coming from the edit form
    if(isset($_POST['isFromEditForm'])) {


        $conn = ConnectDB();

        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $id = $_POST['id']; 

 
        $query = "UPDATE users SET 
                        first_name = '$first_name',
                        last_name = '$last_name',
                        email = '$email'
                WHERE id = '$id'"; 

     
        $result = mysqli_query($conn, $query);

        if($result) {
      
            header('Location: /Http5225-assignment2/src/admin/users.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request";
    }
?>
