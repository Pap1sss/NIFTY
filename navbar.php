
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
  
  <link rel="shortcut icon" href="../assets/images/urllogo.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
 
  <link rel="stylesheet" href="../assets/css/style.css">

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
  <link rel="preload" href="./assets/images/hero-banner.jpg" as="image">

</head>

<body id="top">

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
        <img src="./assets/images/homepagelogo.png" width="150" height="50" alt="Footcap logo">
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
            <a href="#" class="navbar-link">Home</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link">About</a>
          </li>

          <li class="navbar-item">
            <a href="products.php" class="navbar-link">Products</a>
          </li>




        </ul>

        <ul class="nav-action-list">

          <li>
            <button class="nav-action-btn">
              <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

              <span class="nav-action-text">Search</span>
            </button>
          </li>

          <li>
            <a href="login_user/home.php" class="nav-action-btn">
              <ion-icon name="person-outline" aria-hidden="false"></ion-icon>

              <span class="nav-action-text">Login / Register</span>
            </a>
          </li>

          

          <li>
            <button class="nav-action-btn">
              <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

              <data class="nav-action-text">Basket: <strong></strong></data>

             
            </button>
          </li>

        

        </ul>

      </nav>

    </div>
  </header>


  <!-- 
    - #END HEADER
  -->

</body>

</html>