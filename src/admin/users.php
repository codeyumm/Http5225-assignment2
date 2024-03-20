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
    $query = "SELECT * FROM users";
    
    // execute query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }
?>

<body>

<div class="container mt-5">
    <?php

    // Check if the status parameter exists in the URL
    if(isset($_GET['status'])) {
        // Check the value of the status parameter
        $status = $_GET['status'];
        
        // Display appropriate message based on the status
        if($status === "itemDeleted") {

            echo  '<div class="alert alert-success alert-dismissible fade show">
                        <strong>Item deleted successfully.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';

        }elseif($status === "itemEdited") {

            echo  '<div class="alert alert-success alert-dismissible fade show">
                        <strong>Item edited successfully.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';

        } 
    }

    ?>

<?php
            
            // check if user is admin or not
            if( $_SESSION['isAdmin'] ){
                echo '<form action="/Http5225-assignment2/src/admin/dashboard.php" method="GET">
    
                        <input type="hidden"  value="<?php  echo $food_item_id ?>" name="food_item_id" class="btn btn-dark">
    
                        <input type="submit"  value="Back To Dashboard" class="btn btn-dark  mt-2 mb-4">
                                                    
                    </form> ';
            }
            
?>

<h2 class="mb-4">All Users</h2>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>ID</th>
                <th>Name</th>
                <!-- <th>Image</th> -->
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Initialize counter
            $counter = 1;

            // Iterate through each product
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['email'] === "garry@admin.com"){
                    continue;
                }
                echo '<tr>';
                echo '<td>' . $counter . '</td>'; // Display the counter
                echo '<td>' . $row['id'] . '</td>';
                echo '<td class="name-container"><a href="/Http5225-assignment2/src/details.php?user_id=' . $row['id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</a></td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td class="action-container">';
                echo '<a href="/Http5225-assignment2/src/user/edit.php?user_id=' . $row['id'] . '" class="btn btn-dark btn-edit btn-sm mr-1">Edit</a>';
                echo '<a href="/Http5225-assignment2/src/src/components/process-delete-user.php?user_id=' . $row['id'] . '" class="btn btn-dark btn-delete btn-sm ml-1" data-toggle="modal" data-itemID="'.  $row['id'] .'" data-target="#deleteConfirmationModal">Delete</a>';
                echo '</td>';
                echo '</tr>';

                // Increment counter
                $counter++;
            }
            ?>
        </tbody>
    </table>
</div>
</div>






<!-- Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>


<script>
            
            document.querySelectorAll('.btn-delete').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var user_id = this.dataset.itemid;
                    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
                        deleteItem(user_id);
                    });
                });
            });

  
            function deleteItem(user_id) {
                window.location.href = '/Http5225-assignment2/src/components/process-delete-user.php?user_id=' + user_id; 
            }

</script>   










<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
