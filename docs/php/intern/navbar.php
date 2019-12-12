<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/intern/cop/start.php" class="brand-link">
    <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Leitungsbereich </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <?php
      session_start();
      $lcopusernav=$_SESSION['coplevel'];
      $lmedusernav =$_SESSION['mediclevel'];
      if (isset($_SESSION['uid'])) {
        echo  "<div class='d-block' style=  color:white  >  ".$_SESSION['name']." </div>";
      }


      ?>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Zivilisten 
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" >
            <li class="nav-item">
             <a href="/public/civ/info.php"  class="nav-link active " >
                <i class="far fa-circle nav-icon" ></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/public/civ/gang.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Gangs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/public/civ/cars.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Fahrzeuge</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/public/civ/banhistory.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Banverlauf</p>
              </a>
            </li>
          </li class="nav-item has-treeview menu-open">
        </nav class="mt-2">
        <nav class="mt-2">
    </ul>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
            <?php
               
                
                switch ($lcopusernav) {
                    default :
                    
                        echo '
                        <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Polizei
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/intern/cop/Spieler/index.php" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Spielerliste</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/cop/Ausbildung/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/cop/Urlaub/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Urlaub</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/cop/meldungen/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Kummerkasten</p>
                            </a>
                          </li>
                        ';
                        case 0:'';
                       
                       
                };
                ?>
             
             </li class="nav-item has-treeview menu-open">
        </nav class="mt-2">
       <nav class="mt-2">
    </ul>
       
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
            <?php
              
                
                switch ($lmedusernav) {
                    default  :
                        echo  '
                        <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Altis Rotes Kreuz
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/intern/med/Spieler/index.php" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Beförderungen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/med/ausbildung/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/med/Urlaub/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Urlaub</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/med/meldungen/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Kummerkasten</p>
                            </a>
                          </li>
                        ';

                        case 0:'';
                      
                       }
                ?>
              </li class="nav-item has-treeview menu-open">
            </nav class="mt-2">
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
