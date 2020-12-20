<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php  $user_id=$this->session->userdata('user_id'); 
$user_plan = $this->session->userdata('plan'); ?>
<div class="main_content">
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
<div class="notification_cont">
    <h4 class="text-center primary mt-2">Notification</h4>
    <hr>
    <?php $notify = $this->Admin_model->table_column_or('notification','note_to',$user_id,'note_to','all','note_to',$user_plan);
    if(count($notify) >0){
    foreach($notify as $not_row){ ?>
    <p class="notify_date"><?php echo  date("d M Y", strtotime($not_row['date'])); ?> </p>
    <div class="notification">
        <div class="notification_profile">
        <?php $pro_data=$this->Admin_model->table_column('profile','user_id',$not_row['note_from']);
        if(count($pro_data) > 0){
        foreach($pro_data as $row1){ ?>
             <?php if($row1['img'] != ''){ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row1['img']; ?>" alt="img" >
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                    <?php } ?>
        <?php } ?>
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                    <?php } ?>
        </div>
        <div class="notification_main">
            <?php $from = $this->Admin_model->table_column('user','user_id',$not_row['note_from']);
            if(count($from)>0){
            foreach($from as $from_row){ ?>
            <p><a href="<?php echo base_url();?>View/front/profile/<?php echo $not_row['note_from']; ?>"><b style="text-transform:uppercase;"><?php echo $from_row['username']; ?> </b></a>
            <?php } }else{ ?>
            <p><b style="text-transform:uppercase;">Xycle </b>
            <?php } ?>
            <?php echo $not_row['note'];?></p>
        </div>
    </div>
    <hr>
    <?php } }else{ ?>
        <p style="text-align:center;">Notification is Empty</p>
    <?php } ?>
</div>
</div>


<?php $this->load->view('front/include/footer.php'); ?>