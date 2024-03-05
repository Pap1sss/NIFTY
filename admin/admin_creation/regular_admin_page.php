<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>REGULAR ADMIN</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/analyticstyle.css">
    
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->   
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
         
        </div>
        <div class="header-right">
         <a href="logout.php">
          <span class="material-icons-outlined">LOGOUT</span>
          </a>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
       
        
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined"></span>Welcome, <?php echo $_SESSION['user_name'] ?>
          </div>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="../CRUD.php" >
              <span class="material-icons-outlined">inventory</span> Manage Products
            </a>
          </li>
          <a href="../categories.php">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">inventory_2</span> Add Category
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="analytics_table/admin_logs.php" >
              <span class="material-icons-outlined">fact_check</span> Stocks Update
            </a>
          </li>

        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
      

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">MANAGE PRODUCTS</p>
              <a href="analytics_table/admin_products.php">
              <span class="material-icons-outlined text-blue">inventory</span>
              </a>
            </div>
            
          </div>
         

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">MANAGE CATEGORIES</p>
              <a href="analytics_table/admin_logs.php" >
              <span class="material-icons-outlined text-orange">inventory_2</span>
              </a>
            </div>

          </div>

          <div class="card">
            <div class="card-inner">
                
              <p class="text-primary">MANAGE STOCKS</p>
              <a href="analytics_table/sales.php" >
              <span class="material-icons-outlined text-green">fact_check</span>
              </a>
            </div>
            
          </div>


        </div>
        </div>
       
         <br><br>




   
      </main>
      <!-- End Main -->

    </div>
    

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>