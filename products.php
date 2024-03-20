<?php
@include 'admin/admin_creation/config.php';

ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

$secure = isset ($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "";
if (!$secure) {
  $r = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header("Location: $r");
  exit ("use https!");
}
//if($secure) {
session_start();
/* and other secure happenings;;; */
//}

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
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Products</title>

      <!-- 
    - favicon
  -->
      <link rel="shortcut icon" href="./assets/images/urllogo.png" type="image/svg+xml">

      <!-- 
    - custom css link
  -->
      <link rel="stylesheet" href="./assets/css/style.css">


      <!-- 
    - google font link
  -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

      <!-- - preload banner
  -->
      <link rel="preload" href="admin/uploaded_img/<?= htmlspecialchars($row["logo"]); ?>" as="image">

    </head>

    <body id="top" style="background-color:rgba(0,0,0,0.025);">

      <!-- 
    - #HEADER
  -->

      <header class="header" data-header
        style="background: linear-gradient(to right, #f9c47f, #F4B39D); box-shadow: 0px 4px 4px rgba(0, 0, 0, .05);">
        <div class="container">

          <div class="overlay" data-overlay></div>

          <!-- 
    - #PIC FOR MAINPAGE
      -->
          <a href="index.php" class="logo">
            <img src="admin/uploaded_img/<?= htmlspecialchars($row["logo"]); ?>" width="150" height="50" alt="Footcap logo">
          </a>
          <!-- 
    - #FOR SMALL BROWSER
      -->
          <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>
          </button>

          <nav class="navbar" data-navbar>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
              <ion-icon name="close-outline"></ion-icon>
            </button>

            <a href="index.php" class="logo">
              <img src="./assets/images/homepagelogo.png" width="190" height="50" alt="Footcap logo">
            </a>

            <ul class="navbar-list">

              <li class="navbar-item">

              </li>



              <li class="navbar-item">

              </li>




            </ul>


            <ul class="nav-action-list">
              <li>
                <a href="login_user/home.php" class="nav-action-btn">
                  <ion-icon name="person-outline" aria-hidden="false"></ion-icon>

                  <span class="nav-action-text">Login / Register</span>
                </a>
              </li>



              <li>
                <a href="login_user/cart.php" class="nav-action-btn">
                  <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

                  <data class="nav-action-text">Basket: <strong></strong></data>


                </a>
              </li>

            </ul>

          </nav>

        </div>

      </header>


      <!-- 
    - #END HEADER
  -->


      </div>

      </li>
      </ul>

      </ul>


      </li>
      </div>
      </div>

      <main>
        <article>
          <!-- 
        - #PRODUCT
      -->

          <section class="section product" style="min-height: 100vh;">




            <div class="container">
              <!-- 
        - #category query
      -->


              <h2 class="h2 section-title" style="color: #4a4747;">OUR PRODUCTS</h2>
              <ul>
                <style>
                  .category-container::-webkit-scrollbar {
                    padding-top: 20px;
                    height: 7px;
                    border-radius: 5px;
                  }

                  .category-container::-webkit-scrollbar-thumb {
                    background-color: #E7E7E7;
                    cursor: pointer;
                  }

                  .category-container::-webkit-scrollbar-track {
                    background-color: transparent;
                  }
                </style>
                <div class="container category-container"
                  style="display: flex; overflow-x: auto; margin-bottom: 40px; padding: 20px 30px;">

                  <?php

                  $select_category = mysqli_query($conn, "SELECT * FROM `category`");
                  if (mysqli_num_rows($select_category) > 0) {
                    while ($fetch_category = mysqli_fetch_assoc($select_category)) {
                      ?>
                      <style>
                        .cat-card:hover {
                          background-color: #E7E7E7;
                          padding: 10px 15px;
                          border-radius: 5px;
                        }
                      </style>

                      <div class="card-content  cat-card" style="white-space: nowrap; cursor: pointer;">

                        <a style="color: #4a4747; text-transform:uppercase;" onclick="refreshAndGoToDefault()"
                          href="categorized_product.php?id=<?php echo htmlspecialchars($fetch_category["category"]); ?>">
                          <data>
                            <?php echo htmlspecialchars($fetch_category['category']); ?></a>
                        </data>

                      </div>



                      <?php
                    }
                    ;
                  }
                  ;
                  ?>
                </div>



              </ul>

              <div class="container" style="display:flex; ">
                <form action="" method="post">
                  <ul class="product-list">

                    <?php

                    $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                    if (mysqli_num_rows($select_products) > 0) {
                      while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                        ?>
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
                      }
                      ;
                    }
                    ;
                    ?>

                      </div>
                    </li>
              </div>
              </li>
              </ul>
              </ul>



            </div>
          </section>
          </form>

        </article>
      </main>





      <!-- 
    - #FOOTER
  -->

      <footer class="footer">

        <div class="footer-top section"
          style="background: linear-gradient(to right, #f9c47f, #F4B39D); box-shadow: 0px 4px 4px rgba(0, 0, 0, .05);">
          <div class="container">


            <div class="footer-link-box">

              <ul class="footer-list">

                <li>
                  <p class="footer-list-title">Contact Us</p>
                </li>

                <li>
                  <address class="footer-link">
                    <ion-icon name="location"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["address"]); ?>
                    </span>
                  </address>
                </li>

                <li>
                  <a href="tel:<?= htmlspecialchars($row["contact"]); ?>" class="footer-link">
                    <ion-icon name="call"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["contact"]); ?>
                    </span>
                  </a>
                </li>

                <li>
                  <a href="mailto:<?= htmlspecialchars($row["email"]); ?>" class="footer-link">
                    <ion-icon name="mail"></ion-icon>

                    <span class="footer-link-text">
                      <?= htmlspecialchars($row["email"]); ?>
                    </span>
                  </a>
                </li>

              </ul>





            </div>

          </div>
        </div>



      </footer>





      <!-- 
    - #GO TO TOP
  -->

      <a href="#top" class="go-top-btn" data-go-top>
        <ion-iconname="arrow-up-outline"></ion-icon>
      </a>





      <!-- 
    - custom js link
  -->
      <script src="./assets/js/script.js"></script>

      <!-- 
    - ionicon link
  -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <?php

  }
}
?>

</body>
<script>
  function refreshAndGoToDefault() {
    // Reload the page
    location.reload();

    // Go back to the default URL or page
    window.location.href = 'categorized_product.php'; // Replace with your default URL
  }
</script>

</html>