<?php

@include 'config.php';
require_once "../controllerUserData.php";

$username = $_SESSION['username'];


if ($username != false) {
  $sql = "SELECT * FROM admin_accounts WHERE username = '$username'";
  $run_Sql = mysqli_query($conn, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $username = $fetch_info['username'];
  }
} else {
  header('Location: login_form.php');
}

// Create a prepared statement for the SELECT query
$stmt = $conn->prepare("SELECT * from upload");

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <title>Admin Page</title>

      <!-- Montserrat Font -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css/analyticstyle.css">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css/analyticstyle.css">
      <!-- 
    - favicon
  -->
      <link rel="shortcut icon" href="../uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">
    </head>
    <style>
      .detail-btn {
        background-color: #BF9C5C;

      }

      .detail-btn:hover {
        background-color: #F4B39D;
        color: white;
      }
    </style>

    <body style="background: #D3D2D2;">

      <!-- Header -->
      <header class="header" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, .1);">


     

        <img src="..//uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">



        <a href="logout.php">
          <span class="material-icons-outlined">logout</span>
        </a>


      </header>
      <!-- End Header -->


      <!-- Main -->
      <main class="main-container">
        <div class="container" style=" border: 1px solid red; ">
        <li class="product-item"
                          style="box-shadow: 1px 3px 10px 1px; color: #C2C0C0; padding: 10px; border-radius: 5px;">

                          <div class="product-card" tabindex="0">


                            <figure class="card-banner">


                              <img src="<?php echo htmlspecialchars($fetch_product['image']); ?>" width="350" height="350"
                                loading="lazy" alt="PRODUCTS" class="image-contain">

                              <ul class="card-action-list">




                              </ul>



                            </figure>
                            <div class="card-content">
                              <h3 class="h3 card-title">

                                <p style="text-transform: uppercase; color: #4a4747;">
                                  <?php echo htmlspecialchars($fetch_product['name']); ?>
                                </p>


                              </h3>

                              <data style="color: #4a4747; font-size:20px;">₱
                                <?php echo htmlspecialchars($fetch_product['price']); ?>
                              </data>

                            </div>
                            <br>
                            <style>
                              .detail-btn {
                                background-color: #f9c47f;

                              }

                              .detail-btn:hover {
                                background-color: #F4B39D;
                              }
                            </style>
                            <a style=" border-radius: 7px; border: 2px solid white; display: flex; justify-content:center; align-items: center;"
                              href=" productdetails.php?id=<?php echo htmlspecialchars($fetch_product["id"]); ?>"
                              class="btn detail-btn">View Details</a>


                            <?php
                   
                    ?>

                      </div>
                    </li>
    
     </div>

      



      </main>


      <!-- End Main -->



      </div>

      <?php
  }
}
?>
  <!-- Scripts -->
  <!-- ApexCharts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
  <!-- Custom JS -->
  <script src="js/scripts.js"></script>
</body>

</html>