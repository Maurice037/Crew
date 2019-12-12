<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/start.php" class="brand-link">
    <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Acp </span>
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
              Datenbank
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" >
            <li class="nav-item">
              <a href="/Seiten/Spieler/index.php" class="nav-link active " >
                <i class="far fa-circle nav-icon" ></i>
                <p>Spieler</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/Seiten/Gangs/index.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Gangs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Telefon</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Logs</p>
              </a>
            </li>
          </li class="nav-item has-treeview menu-open">
        </nav class="mt-2">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Rcon
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Servermanager</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Spielerliste</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Banliste</p>
                  </a>
                </li>
              </li class="nav-item has-treeview menu-open">
            </nav class="mt-2">
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
