<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cameo 2024</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

 <!-- Sidebar Start -->
 <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/dark-logo.svg" width="250" alt="" style="margin-left:-20px"/>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
           
             <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li> 
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./home.php" aria-expanded="false">
              <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu"><?php echo $_SESSION['comp']; ?></span><!--done-->
              </a>
            </li>
    
            <li class="sidebar-item">
              <a class="sidebar-link" href="./rejected.php" aria-expanded="false">
              <span>
                  <i class="ti ti-flag"></i>
                </span>
                <span class="hide-menu">Rejected</span><!--done-->
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="./logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
</html>