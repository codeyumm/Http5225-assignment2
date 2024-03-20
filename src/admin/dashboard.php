
<!DOCTYPE html>
<html lang="en">

    
<body>
    
<?php




    // Include database connection PHP file
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/nav.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php');


    // get connection object
    $conn = ConnectDB();

    // query to count number of items in food_items table
    $queryForFoodItemsCount = "SELECT COUNT(*) AS total_food_items FROM food_items";
    $queryForUsersCount = "SELECT COUNT(*) AS total_users FROM users";

    // execute query and get the result
    $result = mysqli_query($conn, $queryForFoodItemsCount);

    if( $result ){

        $row = mysqli_fetch_assoc($result);
        $total_food_items = $row['total_food_items'];

    } else {

        echo "sql error" . mysqli_error($connection);

    }

    // execute query and get the result
    $result = mysqli_query($conn, $queryForUsersCount);

    if( $result ){
    
        $row = mysqli_fetch_assoc($result);
        $total_users = $row['total_users'];
    
    } else {
    
        echo "sql error" . mysqli_error($connection);
    
    }
   


?>
    
<div class="container mt-5">
    <div class="row">
        <h2>Admin Dashboard</h2>
    </div>
    <div class="row mt-4">
            <div class="col-md-6 mb-4">
                    <div class="card glassmorphism">
                        <div class="card-body">
                            <h4 class="card-title">Products</h4>
                            <p class="card-text">Total: <span id="totalProducts"><?php echo $total_food_items ?></span></p>
                            <a href="products.php" class="btn btn-dark">View All Products</a>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="card glassmorphism">
                        <div class="card-body">
                            <h4 class="card-title">Users</h4>
                            <p class="card-text">Total: <span id="totalUsers"><?php echo $total_users ?></span></p>
                            <a href="users.php" class="btn btn-dark">View All Users</a>
                        </div>
                    </div>
            </div>
    </div>
</div>

    
    
    
    
    </body>
    </html>