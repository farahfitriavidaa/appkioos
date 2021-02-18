<nav class="navbar header-navbar pcoded-header">
      <div class="navbar-wrapper">

          <div class="navbar-logo">
              <a class="mobile-menu" id="mobile-collapse" href="#!">
                  <i class="ti-menu"></i>
              </a>
              <a class="mobile-search morphsearch-search" href="#">
                  <i class="ti-search"></i>
              </a>
              <a href="index.html">
                  <img class="img-fluid" src="<?=base_url()?>assets/logoputih.png" alt="Theme-Logo" width="100px"/>
              </a>
              <a class="mobile-options">
                  <i class="ti-more"></i>
              </a>
          </div>

          <div class="navbar-container container-fluid">
              <ul class="nav-left">
                  <li>
                      <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                  </li>

                  <li>
                      <a href="#!" onclick="javascript:toggleFullScreen()">
                          <i class="ti-fullscreen"></i>
                      </a>
                  </li>
              </ul>
              <ul class="nav-right">
                  <li class="user-profile header-notification">
                      <a href="#!">
                          <img src="<?=base_url()?>uploads/fotoakun/<?=$akun->foto?>" class="img-radius" alt="User-Profile-Image">
                          <span><?=$akun->username?></span>
                          <i class="ti-angle-down"></i>
                      </a>
                      <ul class="show-notification profile-notification">
                          <!-- <li>
                              <a href="#!">
                                  <i class="ti-settings"></i> Settings
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="ti-user"></i> Profile
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                  <i class="ti-email"></i> My Messages
                              </a>
                          </li> -->
                          <li>
                              <a href="<?=base_url()?>Login/logout">
                                  <i class="ti-layout-sidebar-left"></i> Logout
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
          <nav class="pcoded-navbar">
              <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
              <div class="pcoded-inner-navbar main-menu">
                  <div class="">
                      <div class="main-menu-header">
                          <img class="img-40 img-radius" src="<?=base_url()?>uploads/fotoakun/<?=$akun->foto?>" alt="User-Profile-Image">
                          <div class="user-details">
                              <span><?=$akun->namalengkap?></span>
                              <span id="more-details"><?=$akun->level?></span>
                          </div>
                      </div>
                  </div>
                  <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                  <ul class="pcoded-item pcoded-left-item">
                      <li class="active">
                          <a href="<?=base_url()?>Admin">
                              <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
                  <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Data</div>
                  <ul class="pcoded-item pcoded-left-item">
                      <li>
                          <a href="<?=base_url()?>Admin/kategoriAdmin">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kategori Produk</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>Admin/Produk">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Produk</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>Admin/diskon">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Diskon</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <li>
                          <a href="<?=base_url()?>Admin/banner">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Banner</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <!-- <li>
                          <a href="bs-basic-table.html">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kupon Diskon</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li> -->
                  </ul>

                  <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Laporan</div>
                  <ul class="pcoded-item pcoded-left-item">
                      <li>
                          <a href="chart.html">
                              <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                              <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transaksi</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul> -->
          </nav>
