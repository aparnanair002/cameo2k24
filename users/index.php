<!doctype html>
<html lang="en">
  <?php
  session_start();
  $name=$_SESSION['cord_name'];
  if(!isset($_SESSION['cord_name'])){
    header('Location: ./login.php');
    exit();
  }
?>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
   <?php
   include('sidebar.php');
   

   ?>
   
    <!--  Main wrapper -->
    <div class="bo2y-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title fw-semibold mb-4" style="margin-left:650px;">Welcome <?php echo "&nbsp&nbsp&nbsp",htmlspecialchars($name);?> !! </h6>
            </div></div></div></div>
     
    <div class="body-wrapper">
      
      <div class="container-fluid">
      <img src="../assets/images/logos/dark-logo.svg" width="1100px" height="450px" alt="" style="margin-left:-20px"/>
       
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>