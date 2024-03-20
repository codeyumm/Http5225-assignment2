<?php
    // Include database connection PHP file
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/nav.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php');

    // Get user_id from request
    $user_id = $_GET["user_id"];

    // Connect to database
    $conn = ConnectDB();

    $query = 'SELECT * FROM users WHERE id =' . $user_id . ';';

    // Run query on database and get the result
    $users = mysqli_query($conn, $query);
?>

<body>
    <div class="container edit-section">
        <?php
            // Check if user is admin or not
            if($_SESSION['isAdmin']) {
                echo '<form action="/Http5225-assignment2/src/admin/items.php" method="GET">
                        <input type="hidden" name="food_item_id" value="<?php echo $food_item_id ?>" class="btn btn-dark">
                        <input type="submit" value="Back to list" class="btn btn-dark">
                      </form>';
            }
        ?>

        <div class="row">
            <h1>Edit Food Item</h1>
            <form class="edit-form" method="POST" action="/Http5225-assignment2/src/components/process-update-user.php">
                <!-- Hidden input field to check if request is coming from edit form or not -->
                <input type="hidden" name="isFromEditForm" value="true">
                
                <div class="container mt-5">
                    <?php foreach ($users as $user): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
