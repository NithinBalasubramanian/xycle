<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan');
$user_id=$this->session->userdata('user_id'); ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Choose Group</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<form action="<?php echo base_url(); ?>Front/create_group"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Group Name</label>
			  <input type="text" name="group_name" class="form-control" placeholder="Enter Group Name">
		  </div>
          <div class="form-group">
		  	<label>Group Image</label>
			  <input type="file" name="group_img" class="form-control" placeholder="Enter Group Image">
		  </div>
          <div class="form-group">
		  	<label>Group Description</label>
			  <textarea type="text" name="group_desc" class="form-control" placeholder="Enter Group Description"></textarea>
		  </div>
          <div class="form-group">
		  	<label>Group Name</label>
			  <select  name="group_type" class="form-control" >
              <option value="public">Public</option>
              <option value="private">Private</option>
              </select>
		  </div>
        </div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-success btn-sm" >Create</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  	
<div class="main_content" >
<div class="new_icon">
        <a href="<?php echo base_url(); ?>View/front/chat" class="new_icon1">
        <i class="fa fa-user content_icon" aria-hidden="true"></i>
            <p class="icon_sub">MyConnect</p>
        </a>
        <a href="<?php echo base_url(); ?>View/front/nearby_chat" class="new_icon2">
            <i class="fa fa-map-marker content_icon" aria-hidden="true"></i>
            <p class="icon_sub">Nearby</p>
        </a>
        <a href="<?php echo base_url(); ?>View/front/group_chat"  class="new_icon3"  style="color:#000000;" >
            <i class="fa fa-users content_icon" aria-hidden="true"></i>
            <p class="icon_sub">Group</p>
        </a>
    </div>
<?php
        $k=1;
        if($user_plan == '1'){ ?>
        <div class="post_content">
        <?php 
        $ad_count = $this->Admin_model->table_column('ads');
        $random_number = mt_rand(1, count($ad_count));
        $ads = $this->Admin_model->table_column('ads');
        foreach($ads as $ad_row){ 
            if($k == $random_number){ ?>
    <div class="admin_ad">
        <div class="ad_top">
            <div class="title"><?php echo $ad_row['title'];?></div>
            <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
        </div>
        <div class="ad_img">
            <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $ad_row['img']; ?>" alt="">
        </div>
    </div>
            <?php } $k++;} ?>
    </div>
        <?php } ?>
    <?php $user_id = $this->session->userdata('user_id');
        $profile_list=$this->Admin_model->table_column_or('connect','user_id',$user_id,'connection_id',$user_id); ?>
    <div class="my_network_data"  <?php if(count($profile_list) < 10 ){ ?>style="height:600px;" <?php }else{ ?> style="height:auto;"<?php } ?>>
        <div class="my_network_path" style="height:50px;">
            <div class="head flex">
                <h6 class="primary six">Chat</h6>
                <div class="btn btn-sm btn-success six"  data-toggle="modal" data-target="#myModal" style="float:right;">Create Group</div>
            </div>
        </div>
            <div class="my_network_path" style="height:50px;">
            <div class="head flex">
                <h6 class="primary six">My Groups</h6>
            </div>
        </div>
            <?php $group = $this->Admin_model->table_column('groups','admin',$user_id);
            foreach($group as $grp_row){ ?>
             <div class="invitaion_content ">
            <div class="invite_profile">
                <div class="invite_profile_img">
                <?php if($grp_row['group_img'] != ''){ ?>
                    <img src="<?php echo base_url();?>assets/user/group_img/image/<?php echo $grp_row['group_img']; ?>" alt="img" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                <?php } ?>
                </div>
                <a class="invite_profile_name" href="<?php echo base_url(); ?>View/front/group_pad/<?php echo $grp_row['id']; ?>">
                    <div class="portfolio">
                        <b><?php echo $grp_row['group_name']; ?></b>
                        <p><?php echo $grp_row['group_desc']; ?></p>
                    </div>
                </a>
                <a class="invite_profile_btn" href="<?php echo base_url(); ?>View/front/group_pad/<?php echo $grp_row['id']; ?>">
                    <div class="profile_btn">
                    View
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php $group_list = $this->Admin_model->table_column('group_list','user_id',$user_id);
            foreach($group_list as $row_g){
            $group_on = $this->Admin_model->table_column('groups','id',$row_g['id']);
            foreach($group_on as $grp_row){ ?>
             <div class="invitaion_content ">
            <div class="invite_profile">
                <div class="invite_profile_img">
                <?php if($grp_row['group_img'] != ''){ ?>
                    <img src="<?php echo base_url();?>assets/user/group_img/image/<?php echo $grp_row['group_img']; ?>" alt="img" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                <?php } ?>
                </div>
                <a class="invite_profile_name" href="<?php echo base_url(); ?>View/front/group_pad/<?php echo $grp_row['id']; ?>">
                    <div class="portfolio">
                        <b><?php echo $grp_row['group_name']; ?></b>
                        <p><?php echo $grp_row['group_desc']; ?></p>
                    </div>
                </a>
                <a class="invite_profile_btn" href="<?php echo base_url(); ?>View/front/group_pad/<?php echo $grp_row['id']; ?>">
                    <div class="profile_btn">
                    View
                    </div>
                </a>
            </div>
            <?php } } ?>
            <div class="my_network_path" style="height:50px;">
            <div class="head flex">
                <h6 class="primary six">Public Groups</h6>
            </div>
        </div>
            <?php $group = $this->Admin_model->table_column('groups','group_type','public','admin !=',$user_id);
            foreach($group as $grp_row){ 
               $group_check = $this->Admin_model->table_column('group_list','group_id',$grp_row['id'],'user_id',$user_id);
               if(count($group_check) == 0){ ?>
             <div class="invitaion_content ">
            <div class="invite_profile">
                <div class="invite_profile_img">
                <?php if($grp_row['group_img'] != ''){ ?>
                    <img src="<?php echo base_url();?>assets/user/group_img/image/<?php echo $grp_row['group_img']; ?>" alt="img" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                <?php } ?>
                </div>
                <a class="invite_profile_name" href="<?php echo base_url(); ?>Front/join_group/<?php echo $grp_row['id']; ?>">
                    <div class="portfolio">
                        <b><?php echo $grp_row['group_name']; ?></b>
                        <p><?php echo $grp_row['group_desc']; ?></p>
                    </div>
                </a>
                <a class="invite_profile_btn" href="<?php echo base_url(); ?>Front/join_group/<?php echo $grp_row['id']; ?>">
                    <div class="profile_btn">
                    Join
                    </div>
                </a>
            </div>
            <?php } } ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php $this->load->view('front/include/footer.php'); ?>