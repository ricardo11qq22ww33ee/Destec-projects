<?php
echo 
'
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="../">Destec</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-info">
          <span class="user-name">'; echo $last_name[0][0]; echo '
            <strong>'; echo $name[0][0]; echo '</strong>
          </span>
          <span class="user-role">';echo $puesto[0][0]; echo'</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          
          <li class="sidebar-dropdown">
          <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Dashboard</span>
            </a>
            <div class="sidebar-submenu">';
            echo getProjectListScreen();
            echo'
            </div>
          </li>

          <li class="sidebar-dropdown">
          <a href="#">
          <i class="fas fa-wrench"></i>
              <span>Production</span>
            </a>
            <div class="sidebar-submenu">';
            echo
             "<ul>
             <li>
	          <a href='../production/productionGeneral.php'>General</a>
			      </li>
		        </ul>";
            echo getProductionListScreen();
            echo'
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Purchases</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="../purchases/purchaseGeneral.php">General</a>
                </li>
              </ul>';
              echo getPurchasesListScreen();
            echo'</div>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="../user/logout.php">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
'
?>