<?php
    // Include database connection PHP file
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/connection.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/nav.php');
    
    // Include nav bar from layout
    include($_SERVER['DOCUMENT_ROOT'] . '/Http5225-Assignment2/src/layout/shared/header.php');

?>
<body>
<div class="container add-section">
    <h1>Add Food Item</h1>

    <form class="add-form" method="POST" action="/Http5225-assignment2/src/components/process-add-item.php">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="food_item_name" class="form-label">Food Item Name</label>
                    <input type="text" class="form-control" id="food_item_name" name="food_item_name">
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price in $</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                    <label for="calories" class="form-label">Calories</label>
                    <input type="text" class="form-control" id="calories" name="calories">
                </div>

                <div class="mb-3">
                    <label for="protein" class="form-label">Protein in gm</label>
                    <input type="text" class="form-control" id="protein" name="protein_g">
                </div>

                <div class="mb-3">
                    <label for="calcium" class="form-label">Calcium in gm</label>
                    <input type="text" class="form-control" id="calcium" name="calcium_g">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="vitamin_a" class="form-label">Vitamin A in iu</label>
                    <input type="text" class="form-control" id="vitamin_a" name="vitamin_a_iu">
                </div>

                <div class="mb-3">
                    <label for="vitamin_b1" class="form-label">Vitamin B1 in mg</label>
                    <input type="text" class="form-control" id="vitamin_b1" name="vitamin_b1_mg">
                </div>

                <div class="mb-3">
                    <label for="vitamin_b2" class="form-label">Vitamin B2 in mg</label>
                    <input type="text" class="form-control" id="vitamin_b2" name="vitamin_b2_mg">
                </div>

                <div class="mb-3">
                    <label for="niacin" class="form-label">Niacin in mg</label>
                    <input type="text" class="form-control" id="niacin" name="niacin_mg">
                </div>

                <div class="mb-3">
                    <label for="vitamin_c" class="form-label">Vitamin C in mg</label>
                    <input type="text" class="form-control" id="vitamin_c" name="vitamin_c_mg">
                </div>
            </div>
        </div>

        <input type="hidden" name="isFromAddForm" value="true">
        <input type="submit" class="btn btn-dark" value="Add Item" />
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
