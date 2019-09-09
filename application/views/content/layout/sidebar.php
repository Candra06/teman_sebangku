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
                    <small class="designation text-muted">Content Writer</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home_content') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          


          <li class="nav-item <?= ($this->uri->segment(1) == "Blog" ? 'active' : '')?>">
            <a class="nav-link" href="<?= base_url('Blog') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Blog</span>
            </a>
          </li>

          <li class="nav-item <?= ($this->uri->segment(1) == "Outlet" ? 'active' : '')?>">
            <a class="nav-link" href="<?= base_url('Outlet') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Outlet</span>
            </a>
          </li>
        
          <li class="nav-item <?= ($this->uri->segment(1) == "Promo" ? 'active' : '')?>">
            <a class="nav-link" href="<?= base_url('Promo') ?>">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Promo</span>
            </a>
          </li>
       
          
        </ul>
      </nav>
      <!-- /Sidebar -->