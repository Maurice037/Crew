<?php
include_once ('php/Config/Cfg_Master.php');

session_start();
$meduser = $mediclevel;
$copuser = $coplevel;


 ?>
 <!-- kopfteil -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="/start.php" class="nav-link">Startseite</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Forum</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/logout.php" class="nav-link">Ausloggen</a>
      </li>
    </ul>




    
  </nav>
  <!-- Ende vom Kopfteil -->

<!--Navbar-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="start.php" class="brand-link">
      <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Crew </span>
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
        echo  "<div class='d-block' style=  color:white  >  ".$name." </div>";




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

            <p>
              Allgemein
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" >
            <li class="nav-item">
             <a href="/Public/civ/profil/index.php"  class="nav-link active " >
                <i class="far fa-circle nav-icon" ></i>
                <p>Profil</p>
              </a>
            </li>
         <!--   <li class="nav-item">
              <a href="/Public/civ/gang/" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Gangs</p>
              </a>
            </li>-->
            <li class="nav-item">
              <a href="/Public/civ/car/index.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Fahrzeuge</p>
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


                switch ($copuser) {
                    default :

                        echo '
                        <a href="#" class="nav-link active">

                          <p>
                            Polizei
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/Public/cop/ranks/index.php" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Beförderung</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/Public/cop/Ausbildungen/index.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Urlaub</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/Public/cop/melden/index.php" class="nav-link active">
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


                switch ($meduser) {
                    default  :
                    echo '
                    <a href="#" class="nav-link active">

                      <p>
                        Ark
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" >
                      <li class="nav-item">
                        <a href="/Public/med/ranks/index.php" class="nav-link active " >
                          <i class="far fa-circle nav-icon" ></i>
                          <p>Beförderung</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/Public/med/Ausbildungen/index.php" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Ausbildungen</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Urlaub</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/Public/med/melden/index.php" class="nav-link active">
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

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
            <?php


                switch ($copuser) {
                    case 9 :

                        echo '
                        <a href="#" class="nav-link active">

                          <p>
                            Polizei Ausbilderbereich
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/intern/cop/Spieler" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Spielerliste</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/cop/Ausbildung.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen eintragen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                          <a href="/intern/cop/blacklist.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blacklist</p>
                          </a>
                        </li>

                        ';



                        default :'';


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


                switch ($copuser) {
                    case 10 :

                        echo '
                        <a href="#" class="nav-link active">

                          <p>
                            Polizei Leitungsbereich
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
                            <a href="/intern/cop/Ausbildung.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen eintragen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                          <a href="/intern/cop/blacklist.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blacklist</p>
                          </a>
                        </li>
                        <li class="nav-item">
                        <a href="/intern/cop/Logs/index.php" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Logs</p>
                        </a>
                      </li>


                        ';



                        default :'';


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


                switch ($meduser) {
                    case 9 :

                        echo '
                        <a href="#" class="nav-link active">

                          <p>
                            Ark Ausbilderbereich
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/intern/med/Spieler" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Spielerliste</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/med/Ausbildung.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen eintragen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                          <a href="/intern/med/blacklist.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blacklist</p>
                          </a>
                        </li>
                        ';



                        default :'';


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


                switch ($meduser) {
                    case 10 :

                        echo '
                        <a href="#" class="nav-link active">

                          <p>
                            Ark Leitungsbereich
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" >
                          <li class="nav-item">
                            <a href="/intern/med/Spieler" class="nav-link active " >
                              <i class="far fa-circle nav-icon" ></i>
                              <p>Spielerliste</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="/intern/med/Ausbildung.php" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Ausbildungen eintragen</p>
                            </a>
                          </li>
                          <li class="nav-item">
                          <a href="/intern/med/blacklist.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blacklist</p>
                          </a>
                        </li>
                        <li class="nav-item">
                        <a href="/intern/med/Logs" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Logs</p>
                        </a>
                      </li>


                        ';



                        default :'';


                };
                ?>

             </li class="nav-item has-treeview menu-open">
        </nav class="mt-2">
       <nav class="mt-2">
    </ul>


                      </div>
    <!-- /.sidebar -->
  </aside>
