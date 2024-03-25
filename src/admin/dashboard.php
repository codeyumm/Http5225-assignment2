
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

        echo "sql error" . mysqli_error($conn);

    }

    // execute query and get the result
    $result = mysqli_query($conn, $queryForUsersCount);

    if( $result ){
    
        $row = mysqli_fetch_assoc($result);
        $total_users = $row['total_users'];
    
    } else {
    
        echo "sql error" . mysqli_error($conn);
    
    }
    
?>
    
<div class="container mt-5">
    <div class="row">
        <h2>Hello <?php  echo $_SESSION['user_fname'] ?> (Admin) </h2>
        <h2>Dashboard</h2>
    </div>
    <div class="row mt-4">
            <div class="col-md-6 mb-4">
                    <div class="card glassmorphism">
                        <div class="card-body">
                            <h4 class="card-title">Products</h4>
                            <p class="card-text">Total: <span id="totalProducts"><?php echo $total_food_items ?></span></p>
                            <a href="./items.php" class="btn btn-dark">View All Products</a>
                            <a href="./add-item.php" class="btn btn-dark">Add A New Product</a>

                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="card glassmorphism">
                        <div class="card-body">

                            <h4 class="card-title">Users</h4>
                            <p class="card-text">Total: <span id="totalUsers"><?php echo ($total_users - 1) ?></span></p>
                            <a href="./users.php" class="btn btn-dark">View All Users</a>
                            <a href="./add-user.php" class="btn btn-dark">Add A New User</a>

                        </div>
                    </div>
            </div>
    </div>
</div>

    
    
    
    
    </body>
    </html>