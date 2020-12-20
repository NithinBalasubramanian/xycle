<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php $user_plan = $this->session->userdata('plan'); ?>
<div class="main_content" >
    <div class="my_network_data">
        <a class="my_network_path" href="<?php echo base_url(); ?>View/front/my_network">
            <div class="head">
                <h6 class="primary">New Networks</h6>
            </div>
            <div class="icon_path">
                <i class="fa fa-chevron-left " aria-hidden="true"></i>
            </div>
        </a>
    </div>
    <?php $user_id = $this->session->userdata('user_id');
        $profile_list=$this->Admin_model->table_column_or('connect','user_id',$user_id,'connection_id',$user_id); ?>
    <div class="my_network_data"  <?php if(count($profile_list) < 3 ){ ?>style="height:600px;" <?php }else{ ?> style="height:auto;"<?php } ?>>
        <div class="my_network_path">
            <div class="head">
                <h6 class="primary">Invitation</h6>
            </div>
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
       <?php foreach($profile_list as $row1){
           if($row1['connection_id'] == $user_id){
               $data_of=$row1['user_id']; 
           }else{
                $data_of=$row1['connection_id'];
           }
           if($row1['confirm'] == '1'){
            $con_pro = $this->Admin_model->table_column('profile','user_id',$data_of); 
            foreach($con_pro as $row){ ?>
        <div class="invitaion_content ">
            <div class="invite_profile">
                <a class="invite_profile_img" href="<?php echo base_url(); ?>View/front/profile_view/<?php echo $row['user_id']; ?>">
                <?php if($row['img'] != ''){ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                <?php } ?>
                </a>
                <a class="invite_profile_name" href="<?php echo base_url(); ?>View/front/profile_view/<?php echo $row['user_id']; ?>">
                    <div class="portfolio">
                        <b><?php echo $row['user_name']; ?></b>
                        <p><?php echo $row['profile_title']; ?></p>
                    </div>
                </a>
                <a class="invite_profile_btn" href="<?php echo base_url(); ?>View/front/profile_view/<?php echo $row['user_id']; ?>">
                    <div class="profile_btn">
                    View
                    </div>
                </a>
            </div>
            <?php } } } ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('front/include/footer.php'); ?>