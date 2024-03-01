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



<section style = "padding-top:10px;">
    <div class = "container">
      <div class = "row">
        <h1>ORDERS</h1>
        <form method = "post" action = "orders.php">
            <div class = "col-lg-4">
              <div class = "form-group">
                <input type="date" name="start_date" class="form-control">
            </div>
            </div>
            <div class = "col-lg-4">
              <div class = "form-group">
                <input type="date" name="end_date" class="form-control">
            </div>
            </div>
      
            <div class = "col-lg-4">
              <div class = "form-group">
                <input type="submit" name="submit_date" class="btn btn-primary">
            </div>
            </div>
            </form>
           
      

<?php
  if (isset($_POST['submit_date'])) {

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $query = mysqli_query($conn,"SELECT * FROM orders WHERE date_created between '$start_date' and '$end_date'");
      
      if (mysqli_num_rows($query)>0){

        foreach($query as $value){

       ?>

          <div class="col-lg-12">
          <table class="table table-striped">
            <thead>
              <th>ORDER ID</th>
              <th>NAME</th>
              <th>MOBILE NUMBER</th>
              <th>EMAIL</th>
              <th>PAYMENT METHOD</th>
              <th>ADDRESS</th>
              <th>ORDERS</th>
              <th>TOTAL PRICE</th>
              <th>STATUS</th>
              <th>DATE</th>
              <th>TIME</th>
            </thead>

            <tbody>

            <?php
            foreach ($query as $value){ ?>
            <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['name']?></td>
            <td><?=$value['number']?></td>
            <td><?=$value['email']?></td>
            <td><?=$value['method']?></td>
            <td><?=$value['address']?> </td>
            <td><?=$value['total_products']?></td>
            <td><?=$value['total_price']?></td>
            <td><?=$value['status']?></td>
            <td><?=$value['date_created']?></td>
            <td><?=$value['time_created']?></td>
            </tr>
            <?php 
            }
            ?>
            </tbody>

          </table>
          </div>
       <?php
       
       
      }

  }

  else{
    ?>
    <div class="col-lg-12">
                        <h3>NO ORDERS CAN BE FOUND</h3>
                    </div>

        </div>
    <?php
  }
}
?>

</section>



       
         <br><br>


        
   
      </main>
      <!-- End Main -->

    </div>
    

    <!-- Scripts -->
    <script>
    function searchTable() {
      let input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("productTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Assuming the product name is in the second column
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>


    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>