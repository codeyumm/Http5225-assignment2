<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container-fluid d-flex justify-content-center align-items-center sticky">
    <a class="navbar-brand" href="/Http5225-assignment2/index.php">Know your food</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ">

      <?php session_start(); ?>

      <?php if(isset($_SESSION['user_id'])){

        if( isset($_SESSION['isAdmin'])){

          echo  '
                <li class="nav-item">
                  <a class="nav-link" href="/Http5225-assignment2/src/logout.php">Logout</a>
                </li>';
            
          
        } else {
        
         echo  '<li class="nav-item ">
                  <a class="nav-link active" aria-current="page" href="/Http5225-assignment2/src/compare.php">Compare food items</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/Http5225-assignment2/src/logout.php">Logout</a>
                </li>';
        }
      }
      ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>