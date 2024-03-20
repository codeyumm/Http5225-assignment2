<?php
    // Include database connection PHP file
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');
    
    // Check if the request is coming from the right source
    if(isset($_POST['isFromAddForm'])) {
        // Get connection object 
        $conn = ConnectDB();

        // Get data from the request
        $food_item_name = $_POST['food_item_name'];
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $calories = $_POST['calories'];
        $protein_g = $_POST['protein_g'];
        $calcium_g = $_POST['calcium_g'];

        $vitamin_a_iu = $_POST['vitamin_a_iu'];
        $vitamin_b1_mg = $_POST['vitamin_b1_mg'];
        $vitamin_b2_mg = $_POST['vitamin_b2_mg'];
        $niacin_mg = $_POST['niacin_mg'];
        $vitamin_c_mg = $_POST['vitamin_c_mg'];
        
        // making default image url link
        $image_url = 'https://source.unsplash.com/random?' . urlencode($food_item_name);
        

        $query1 = "INSERT INTO `food_items` (`food_item_name`, `image_url`) 
                    VALUES ('$food_item_name', '$image_url')";
                    

        $result1 = mysqli_query($conn, $query1);


        $food_item_id = mysqli_insert_id($conn);


        $query2 = "INSERT INTO `food_item_data` (`food_item_id`, `unit`, `price`, `calories`, `protein_g`, `calcium_g`, `vitamin_a_iu`, `vitamin_b1_mg`, `vitamin_b2_mg`, `niacin_mg`, `vitamin_c_mg`) 
                    VALUES ('$food_item_id', '$unit', '$price', '$calories', '$protein_g', '$calcium_g',  '$vitamin_a_iu', '$vitamin_b1_mg', '$vitamin_b2_mg', '$niacin_mg', '$vitamin_c_mg')";

        $result2 = mysqli_query($conn, $query2);

        if($result1 && $result2) {

            header('Location: /Http5225-assignment2/src/admin/items.php');
            exit();
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request";
    }
?>
