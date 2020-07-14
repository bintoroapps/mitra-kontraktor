<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Kontraktor</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('dash/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('dash/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dash/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?= $this->renderSection('css') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url('dash/dist/img/user1-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url('dash/dist/img/user8-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url('dash/dist/img/user3-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= base_url('/admin/logout') ?>" class="dropdown-item">Sign Out</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link" target="_blank">
      <img src="<?= session('company_photo') ? base_url('media/' . session('company_photo')) : base_url('dash/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= session('company_name') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('dash/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session('firstname') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
            <?php $uri = service('uri') ?>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $uri->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= in_array($uri->getSegment(2), ['company-profile']) ? 'menu-open' : '' ?>">
            <a href="<?= base_url('admin/company-profile') ?>" class="nav-link <?= in_array($uri->getSegment(2), ['company-profile']) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Profil Perusahaan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?= in_array($uri->getSegment(3), ['home', 'about', 'faq', 'team', 'service', 'project', 'blog', 'contact']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($uri->getSegment(3), ['home', 'about', 'faq', 'team', 'service', 'project', 'blog', 'contact']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Tampilan Website
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/home') ?>" class="nav-link <?= $uri->getSegment(3) == 'home' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/about') ?>" class="nav-link <?= $uri->getSegment(3) == 'about' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/faq') ?>" class="nav-link <?= $uri->getSegment(3) == 'faq' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/team') ?>" class="nav-link <?= $uri->getSegment(3) == 'team' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/service') ?>" class="nav-link <?= $uri->getSegment(3) == 'service' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/project') ?>" class="nav-link <?= $uri->getSegment(3) == 'project' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/blog') ?>" class="nav-link <?= $uri->getSegment(3) == 'blog' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tampilan-website/contact') ?>" class="nav-link <?= $uri->getSegment(3) == 'contact' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
          </ul>
      </li>
      <li class="nav-item has-treeview <?= in_array($uri->getSegment(2), ['jasa', 'appointment', 'kupon']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($uri->getSegment(2), ['jasa', 'appointment', 'kupon']) ? 'active' : '' ?>">
            <i class="nav-icon fab fa-servicestack"></i>
            <p>
              Pengaturan Jasa
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/jasa') ?>" class="nav-link <?= $uri->getSegment(2) == 'jasa' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Jasa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/appointment') ?>" class="nav-link <?= $uri->getSegment(2) == 'appointment' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Appointment</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url('admin/kupon') ?>" class="nav-link <?= $uri->getSegment(2) == 'kupon' ? 'active' : '' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Kupon</p>
              </a>
            </li> -->
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="<?= base_url('admin/portfolio') ?>" class="nav-link <?= $uri->getSegment(2) == 'portfolio' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-newspaper"></i>
          <p>
            Pengaturan Portfolio
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="<?= base_url('admin/media') ?>" class="nav-link <?= $uri->getSegment(2) == 'media' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-images"></i>
          <p>
            Media
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview <?= in_array($uri->getSegment(2), ['artikel', 'komentar', 'statistik', 'anggota']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($uri->getSegment(2), ['artikel', 'komentar', 'statistik', 'anggota']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-poll"></i>
            <p>
              Marketing
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('admin/artikel') ?>" class="nav-link <?= $uri->getSegment(2) == 'artikel' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Artikel / Post</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/komentar') ?>" class="nav-link <?= $uri->getSegment(2) == 'komentar' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Komentar</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?= base_url('admin/seo') ?>" class="nav-link <?= $uri->getSegment(2) == 'seo' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>SEO</p>
              </a>
            </li> -->
              <!-- <li class="nav-item">
                <a href="<?= base_url('admin/social-media') ?>" class="nav-link <?= $uri->getSegment(2) == 'social-media' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Media</p>
              </a>
            </li> -->
              <li class="nav-item">
                <a href="<?= base_url('admin/anggota') ?>" class="nav-link <?= $uri->getSegment(2) == 'anggota' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Anggota</p>
              </a>
            </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="<?= base_url('admin/team') ?>" class="nav-link <?= $uri->getSegment(2) == 'team' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Tim
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="<?= base_url('admin/tracking-code') ?>" class="nav-link <?= $uri->getSegment(2) == 'tracking-code' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-code"></i>
          <p>
            Tracking Code
          </p>
        </a>
      </li>
      <!-- <li class="nav-item has-treeview">
        <a href="<?= base_url('admin/testimonial') ?>" class="nav-link <?= $uri->getSegment(2) == 'testimonial' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-comment-dots"></i>
          <p>
            Testimonial
          </p>
        </a>
      </li> -->
</ul>
</nav>
<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?= $this->renderSection('content') ?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('dash/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('dash/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('dash/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dash/dist/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('dash/dist/js/demo.js') ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('dash/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
<script src="<?= base_url('dash/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?= base_url('dash/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
<!-- ChartJS -->
<!-- <script src="<?= base_url('dash/plugins/chart.js/Chart.min.js') ?>"></script> -->

<!-- PAGE SCRIPTS -->
<!-- <script src="<?= base_url('dash/dist/js/pages/dashboard2.js') ?>"></script> -->
<?= $this->renderSection('js') ?>
</body>
</html>
