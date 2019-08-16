<!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?= base_url() ?>asset/app/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> <?= $_SESSION['username']?> </p> <!--  -->
                  <div>
                    <small class="designation text-muted">Admin</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-public" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Data Public</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-public">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Promo') ?>">Promo</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Blog') ?>">Blog</a>
                </li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Menu') ?>">Menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Outlet') ?>">Outlet</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Karyawan') ?>">Karyawan</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Pelanggan') ?>">Pelanggan</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Voucher') ?>">Voucher</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Data Report</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Poin') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Pengaturan Poin</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Akun') ?>">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">User Akun</span>
            </a>
          </li>
       
          
        </ul>
      </nav>
      <!-- /Sidebar -->