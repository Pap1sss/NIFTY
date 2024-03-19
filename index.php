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
      <title>HomePage</title>

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



    <!-- 
    - #HEADER
  -->

    <header class=" header" data-header
      style="background: linear-gradient(to right, #f9c47f, #F4B39D); box-shadow: 0px 4px 4px rgba(0, 0, 0, .05);">
      <div class="container">

        <div class="overlay" data-overlay></div>

        <!-- 
    - #PIC FOR MAINPAGE
      -->
        <a href="index.php" class="logo">
          <img src="admin/uploaded_img/<?= $row["logo"] ?>" width="150" height="50" alt="logo">
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
            <img src="admin/uploaded_img/<?= $row["logo"] ?>" width="190" height="50" alt="logo">
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


    <body id="top">
      <main>
        <article>

          <!-- 
        - #HERO
      -->

          <section class="section hero">
            <!--DIV CONTAINER FOR THE HERO BG-->
            <div
              style="height: 600px; width: 100vw; background-size: cover; background-repeat:no-repeat; background-image: url(admin/uploaded_img/<?= htmlspecialchars($row["homepage_image"]) ?>); background-position: center; opacity: .7; position: relative; filter: brightness(70%);">
            </div>
            <div class="container"
              style=" background-color: transparent; text-align: left; margin: 20%; padding: 5%; border-radius: 50px; position: absolute;">
              <div>
                <h2 class="h1 hero-title" style="color:#282828; text-shadow: 3px 3px 4px #BD9D5C;">
                  <strong>
                    <?= $row["title"] ?>
                  </strong>
                </h2>

                <p class="hero-text" style="color: black; letter-spacing: 1.5px;">
                  <?= $row["description"] ?>
                </p>
                <a href="products.php">
                  <button class="btn"
                    style="font-family: josefin, sans-serif; background-color:#f9c47f; border-radius: 5px; border: none; box-shadow: 0px 4px 4px rgba(0, 0, 0, .07); ">
                    <span>Shop Now</span>


                  </button>
                </a>

              </div>
            </div>

          </section>


        </article>
      </main>





      <!-- 
    - #FOOTER
  -->
    </body>
    <footer class="footer">

      <div class="footer-top section" style="background-color: white;">
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
                    <?= $row["address"] ?>
                  </span>
                </address>
              </li>

              <li>
                <a href="tel:<?= $row["contact"] ?>" class="footer-link">
                  <ion-icon name="call"></ion-icon>

                  <span class="footer-link-text">
                    <?= $row["contact"] ?>
                  </span>
                </a>
              </li>

              <li>
                <a href="<?= $row["email"] ?>" class="footer-link">
                  <ion-icon name="mail"></ion-icon>

                  <span class="footer-link-text">
                    <?= $row["email"] ?>
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


</html>