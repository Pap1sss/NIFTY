<?php
@include 'admin/admin_creation/config.php';

ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

$secure = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "";
if (!$secure) {
  $r = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header("Location: $r");
  exit("use https!");
}
//if($secure) {
session_start();
/* and other secure happenings;;; */
//}

$sql = "SELECT * from upload";
$result = mysqli_query($conn, $sql);
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
      <link rel="shortcut icon" href="admin/uploaded_img/<?= $row["logo"] ?>" type="image/svg+xml">

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

      <!-- 
    - preload banner
  -->
      <link rel="preload" href="admin/uploaded_img/<?= $row["logo"] ?>" as="image">

    </head>

    <body id="top" style="background-color: #b69f77;">

      <!-- 
    - #HEADER
  -->

      <header class="header" data-header>
        <div class="container">

          <div class="overlay" data-overlay></div>

          <!-- 
    - #PIC FOR MAINPAGE
      -->
          <a href="index.php" class="logo">
            <img src="admin/uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="Footcap logo">
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
              <img src="admin/uploaded_img/<?= $row["logo"] ?>" width="190" height="50" alt="Footcap logo">
            </a>

            <ul class="navbar-list">

              <div class="container" style="display: flex; overflow-x: auto;">
                <?php

                $select_category = mysqli_query($conn, "SELECT * FROM `category`");
                if (mysqli_num_rows($select_category) > 0) {
                  while ($fetch_category = mysqli_fetch_assoc($select_category)) {
                    ?>
                    <div class="card-content">

                      <a onclick="refreshAndGoToDefault()" style="text-transform:uppercase;"
                        href="categorized_product.php?id=<?php echo $fetch_category["category"]; ?>">
                        <data class="card-price">
                          <?php echo $fetch_category['category']; ?></a>
                      </data>

                    </div>



                    <?php
                  }
                  ;
                }
                ;
                ?>



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

          <section class="section product">

            <!-- 
        - #category query
      -->


            <div class="container">

              <br>
              <h2 class="h2 section-title">OUR PRODUCTS</h2>
              <div class="container" style="display:flex; ">
                <form action="" method="post">
                  <ul class="product-list">
                    <?php

                    @include 'admin/config.php';

                    $id = "";
                    if (isset($_GET['id'])) {
                      $id = $_GET['id'];
                    }

                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `category` = '$id'");

                    ?>
                    <?php
                    if (mysqli_num_rows($select_products) > 0) {

                      while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                        ?>
                        <li class="product-item">

                          <div class="product-card" tabindex="0">


                            <figure class="card-banner" style="border: 2px solid #f6b035;">


                              <img src="<?php echo $fetch_product['image']; ?>" width="350" height="350" loading="lazy"
                                alt="PRODUCTS" class="image-contain">

                              <ul class="card-action-list">


                              </ul>



                            </figure>
                            <div class="card-content">
                              <h3 class="h3 card-title">

                                <p style="text-transform: uppercase;">
                                  <?php echo htmlspecialchars($fetch_product['name']); ?>
                                </p>


                              </h3>

                              <data style="color: white; font-size:20px;">₱
                                <?php echo htmlspecialchars($fetch_product['price']); ?>
                              </data>

                            </div>
                            <br>
                            <a href=" productdetails.php?id=<?php echo htmlspecialchars($fetch_product["id"]); ?>"
                              class="btn">View
                              Details</a>



                            <?php
                      }
                      ;
                    }
                    ;
                    ?>

                      </div>
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

        <div class="footer-top section" style="background-color: #b69f77;">
          <div class="container">

            <div class="footer-brand">


              </ul>

            </div>

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

        <div class="footer-bottom">
          <div class="container">

            <p class="copyright">

            </p>

          </div>
        </div>

      </footer>





      <!-- 
    - #GO TO TOP
  -->

      <a href="#top" class="go-top-btn" data-go-top>
        <ion-icon name="arrow-up-outline"></ion-icon>
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