<?php $user_id=$this->session->userdata('user_id'); 
$user_plan = $this->session->userdata('plan'); ?>
<div class="overall_header">
    <div class="common_header">
        <?php if($this->session->userdata('user_type') == 'admin'){ ?>
        <a href="<?php echo base_url(); ?>Administration" class="profile_img_show">
        <?php }else{ ?>
        <div class="profile_img_show side">
        <?php } ?>
        <?php $user_id=$this->session->userdata('user_id');
                            $profile=$this->Admin_model->table_column('profile','user_id',$user_id);
                            foreach($profile as $row){ 
                            if($row['img'] != ""){ ?>
                                <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" height="150px" width="150px">
                            <?php }else{ ?>
						        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" height="150px" width="150px">
                            <?php }  } ?>
        <?php if($this->session->userdata('user_type') == 'admin'){ ?>
        </a>
        <?php }else{ ?>
        </div>
        <?php } ?>
        <div class="search">
            <form class="search_design" action="<?php echo base_url(); ?>front/search" method="post">
                <input type="text" class="search_bar" name="search" placeholder="Search">
                <button type="submit" class="search_icon_disp" style="outline:none;border:none;">
                    <i class="fa fa-search search_icon " aria-hidden="true"></i>
        </button>
        </form>
        </div>
        <div class="chat">
            <a href="<?php echo base_url(); ?>View/front/notification">
                <i class="fa fa-bell bell" aria-hidden="true"></i>
           </a>
        </div>
        <div class="sidebar none">
            <div class="main_side">
                <a href="<?php echo base_url(); ?>Front/logout_front" class="btn btn-sm btn-danger" style="width:100%;">Logout</a>
            </div>
        </div>
    </div>
    <div class="menu_header">
        <div class="menu_top_nav">
            <a href="<?php echo base_url(); ?>View/front/home"><img src="<?php echo base_url(); ?>assets/admin/img/x_green.png" class="h_img">
            <div class="text">Home</div></a>
        </div>
        <div class="menu_top_nav">
        <?php $user_id=$this->session->userdata('user_id'); ?>
            <a href="<?php echo base_url(); ?>View/front/profile/<?php echo $user_id; ?>"><i class="fa fa-user icon" aria-hidden="true"></i>
          <div class="text">Profile</div></a>
        </div>
        <div class="menu_top_nav">
            <a href="<?php echo base_url(); ?>View/front/my_network"><i class="fa fa-users icon" aria-hidden="true"></i>
            <div class="text">My Network</div></a>
        </div>
        <div class="menu_top_nav">
            <a href="<?php echo base_url(); ?>View/front/chat"><i class="fa fa-comments icon" aria-hidden="true"></i>
            <div class="text">Chat</div></a>
        </div>
        
    </div>
</div>
