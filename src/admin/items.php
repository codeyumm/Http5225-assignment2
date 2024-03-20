<!DOCTYPE html>
<html lang="en">

<?php
    // Include database connection PHP file
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/nav.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php');

    // get connection object
    $conn = ConnectDB();

    // query to fetch products
    $query = "SELECT * FROM food_items JOIN food_item_data ON food_items.food_item_id = food_item_data.food_item_id";
    
    // execute query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }
?>

<body>

<div class="container mt-5">
  <h2>All Products</h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <!-- <th>Image</th> -->
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Iterate through each product
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['food_item_id'] . '</td>';
            echo '<td>' . $row['food_item_name'] . '</td>';
            // echo '<td><img src="' . $row['image_url'] . '" alt="' . $row['food_item_name'] . '" class="img-thumbnail"></td>';
            echo '<td class="action-container">';
            echo '<a href="/Http5225-assignment2/src/edit.php?food_item_id=' . $row['food_item_id'] . '" class="btn btn-dark btn-edit btn-sm mr-1">Edit</a>';
            echo '<a href="delete_product.php?food_item_id=' . $row['food_item_id'] . '" class="btn btn-dark btn-delete btn-sm">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
