<?php

@include '../config.php';
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
    <title>Analytics</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
         <a href="../admin_creation/super_admin_page.php">
          <span class="material-icons-outlined">account_circle</span>
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
            <a href="user_accounts.php" >
              <span class="material-icons-outlined">dashboard</span> User Account
            </a>
          </li>
          <a href="admin_products.php">
          <li class="sidebar-list-item">
            
              <span class="material-icons-outlined">inventory_2</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="admin_logs.php" >
              <span class="material-icons-outlined">fact_check</span> Admin logs
            </a>
          </li>
          
          <li class="sidebar-list-item">
            <a href="sales.php">
              <span class="material-icons-outlined">shopping_cart</span> Sales
            </a>
          </li>
          
          <li class="sidebar-list-item">
            <a href="orders.php">
              <span class="material-icons-outlined">shopping_cart</span> Orders
            </a>
          </li>
          
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
      
   <!-- TABLE for users -->
  



<h2>Created Users</h2>
<div style= "display: flex;">
<div style="margin-left:45px; margin-right: 45px;">
<table class="table table-striped" >
<thead>
<tr>
<th>User ID</th>
<th>User's Name</th>
<th>User's Email</th>

</tr>
</thead>
<?php
include_once "../admin_creation/config.php";
$sql="SELECT * from usertable";
$result=$conn-> query($sql);

if ($result-> num_rows > 0){
while ($row=$result-> fetch_assoc()) {
?>
<tr>
<td style = "border: 1px solid;"><?=$row["id"]?></td>
<td style = "border: 1px solid;"><?=$row["name"]?></td>
<td style = "border: 1px solid;"><?=$row["email"]?></td>


 
    

<?php
  
}
}
?>

</table>
</div>

<div style="margin-left:45px; margin-right: 45px;">
<h2>Users Time & Date of use</h2>
<table class="table table-striped" >
<thead>
<tr>
<th>Email</th>
<th>Time of access</th>
<th>Date of access</th>

</tr>
</thead>
<?php
include_once "../admin_creation/config.php";
$sql="SELECT * from logs";
$result=$conn-> query($sql);

if ($result-> num_rows > 0){
while ($row=$result-> fetch_assoc()) {
?>
<tr>
<td style = "border: 1px solid;"><?=$row["email"]?></td>
<td style = "border: 1px solid;"><?=$row["timein"]?></td>
<td style = "border: 1px solid;"><?=$row["date"]?></td>

<?php
  
}
}
?>

</table>

      
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