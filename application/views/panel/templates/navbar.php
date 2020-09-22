
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url('panel/dashboard');?>"><img class="brand-logo" alt="admin logo" src="<?php echo base_url().$apps_icon;?>" style="height:25px;width:25px;">
                <h2 class="brand-text"><?php echo $apps_name;?></h2></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <span class="avatar avatar-online">
                    <?php if ($this->session->userdata('fotopengguna')==''): ?>
                        <img src="<?php echo base_url();?>assets/backend/app-assets/images/user/avatar.jpg" alt="avatar"><i></i>
                      <?php else: ?>
                        <img src="<?php echo base_url().$this->session->userdata('fotopengguna');?>" alt="avatar"><i></i>
                    <?php endif; ?>
                  </span>
                  <span class="user-name"><?php echo $this->session->userdata('nama_lengkap');?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo base_url('panel/profile/');?>"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('auth/logout');?>"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->
