
<?php $this->load->view('admin/include/popup.php'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion disp " id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15" style="font-size:25px;">
         Xycle
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">
          <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>Admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone1" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-user"></i>
          <span>Plan Type</span>
        </a>
        <div id="collapseone1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Plan Type Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/plan/add_plan">Add Plan Type</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/plan/list_plan">List Plan Type</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-users"></i>
          <span>Customer</span>
        </a>
        <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Customer Management:</h6>
            
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/customer/list_customer">List Customer</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/customer/free_customer">List Free Customer</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/customer/paid_customer">List Paid Customer</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone01" aria-expanded="true" aria-controls="collapseone01">
          <i class="fas fa-lock"></i>
          <span>User</span>
        </a>
        <div id="collapseone01" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/user/list_admin_user">Admin User</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/user/list_user">List User</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone2" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-plus"></i>
          <span>Ads</span>
        </a>
        <div id="collapseone2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ads Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/ads/add_ads">Add Ads</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/ads/list_ads">List Ads</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone21" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-plus"></i>
          <span>Access</span>
        </a>
        <div id="collapseone21" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Access Management:</h6>
            
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/access/add_access">Add Access</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/access/list_access">List Access</a>
          </div>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone12" aria-expanded="true" aria-controls="collapseone">
          <i class="fas fa-bell"></i>
          <span>Notification</span>
        </a>
        <div id="collapseone12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Notification Management:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/notification/add_notification">Add Notification</a>
            <a class="collapse-item" href="<?php echo base_url();?>View_admin/notification/list_notification">List Notification</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
    
            <!-- Divider -->
      <hr class="sidebar-divider">
        <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>View/order/order">
          <i class="fas fa-address-book"></i>
          <span> Report</span>
        </a>
      </li> -->
     
      <!-- Heading -->
     

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
           
            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
              <?php $user_id=$this->session->userdata('user_id');
                            $profile=$this->Admin_model->table_column('profile','user_id',$user_id);
                            foreach($profile as $row){ ?> 
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['user_name']; ?></span>
                           <?php if($row['img'] != ""){ ?>
                                <img  class="img-profile rounded-circle" src="<?php echo base_url();?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" height="150px" width="150px">
                            <?php }else{ ?>
						                   <img  class="img-profile rounded-circle" src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" height="150px" width="150px">
                            <?php }  } ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <div class="dropdown-item" onclick="disp_profile()">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
</div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin/logout_front" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>