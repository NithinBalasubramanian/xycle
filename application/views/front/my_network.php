<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan'); ?>

<div class="main_content" >
    <div class="my_network_data">
        <a class="my_network_path" href="<?php echo base_url(); ?>View/front/my_network_list">
            <div class="head">
                <h6 class="primary">Manage My Networks</h6>
            </div>
            <div class="icon_path">
                <i class="fa fa-chevron-right " aria-hidden="true"></i>
            </div>
        </a>
    </div>
    <?php $profile_list=$this->Admin_model->table_column('profile'); ?>
<div class="my_network_data" <?php if(count($profile_list) < 3 ){ ?>style="height:600px;" <?php }else{ ?> style="height:auto;"<?php } ?>>
        <div class="my_network_path">
            <div class="head">
                <h6 class="primary">Connection Requests</h6>
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
        <?php    foreach($profile_list as $row){
            $user_id = $this->session->userdata('user_id');
            $profile_list_check=$this->Admin_model->table_column('connect','user_id',$row['user_id'],'connection_id',$user_id);
            if(count($profile_list_check) != 0){
                foreach($profile_list_check as $check){
                    if($check['confirm'] == '0' && $check['deny'] == '1' ){ ?>
        <div class="invitaion_content invitaion_content_<?php echo $row['user_id']; ?> " >
            <div class="invite_profile" style="height:80px;">
                <a class="invite_profile_img" href="<?php echo base_url(); ?>View/front/profile_view/<?php echo $row['user_id']; ?>" style="height:60px;">
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
                <div class="invite_profile_btn">
                    <div class="profile_btn connect_btn profile_btn_<?php echo $row['user_id']; ?> mb-2" data-user_id="<?php echo $row['user_id']; ?>" data-con_id="<?php echo $check['id']; ?>">
                        Connect
                    </div>
                    <div class="profile_btn deny_btn profile_btn_<?php echo $check['id']; ?>" data-user_id="<?php echo $row['user_id']; ?>" data-con_id="<?php echo $check['id']; ?>">
                        Deny
                    </div>
                </div>
            </div>
        </div>
            <?php } } } }   ?>
            </div>
        <?php $profile_list=$this->Admin_model->table_column('profile'); ?>
<div class="my_network_data" <?php if(count($profile_list) < 5 ){ ?>style="height:600px;" <?php }else{ ?> style="height:auto;"<?php } ?>>
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
        <?php    foreach($profile_list as $row){
            $user_id = $this->session->userdata('user_id');
            $profile_list_check=$this->Admin_model->table_column('connect','user_id',$user_id,'connection_id',$row['user_id']);
            $profile_rev_check=$this->Admin_model->table_column('connect','user_id',$row['user_id'],'connection_id',$user_id);
            if(count($profile_list_check) == 0){ 
            if(count($profile_rev_check) == 0 ) { 
            if($row['user_id'] != $user_id){ ?>
        <div class="invitaion_content invitaion_content_<?php echo $row['user_id']; ?> " >
            <div class="invite_profile" >
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
                <div class="invite_profile_btn">
                    <div class="profile_btn send_conn profile_btn_<?php echo $row['user_id']; ?>" data-user_id="<?php echo $row['user_id']; ?>">
                        Connect
                    </div>
                </div>
            </div>
        </div>
            <?php } } } } ?>
        </div>
    </div>
</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.send_conn',function(){
        var user_id = $(this).data('user_id');
        var my_id = "<?php echo $this->session->userdata('user_id'); ?>";
        var tablename = 'connect';
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/connect',
            type: 'POST',
            dataType: "json",
            data: "user_id=" + user_id +"&my_id="+my_id+"&tablename="+tablename ,
            beforeSend: function(){
                $('.profile_btn_'+user_id).html('connecting...');
            },
            success: function(data) {
                if(data == 1){
                    $('.profile_btn_'+user_id).html('Sent');
                    $('.profile_btn_'+user_id).css('color','#fff');
                    $('.profile_btn_'+user_id).css('background-color','#20BA1A');
               }
            }
        });
    });
</script>
<script>
    $(document).on('click','.connect_btn',function(){
        var user_id = $(this).data('user_id');
        var con_id = $(this).data('con_id');
        var my_id = "<?php echo $this->session->userdata('user_id'); ?>";
        var tablename = 'connect';
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/con_connect',
            type: 'POST',
            dataType: "json",
            data: "con_id=" + con_id +"&tablename="+tablename ,
            beforeSend: function(){
                $('.profile_btn_'+user_id).html('Confirming...');
            },
            success: function(data) {
                if(data == 1){
                    $('.profile_btn_'+user_id).html('Connected');
                    $('.profile_btn_'+user_id).css('color','#fff');
                    $('.profile_btn_'+user_id).css('background-color','#20BA1A');
                    $('.profile_btn_'+con_id).css('display','none');
               }
            }
        });
    });
    $(document).on('click','.deny_btn',function(){
        var user_id = $(this).data('user_id');
        var con_id = $(this).data('con_id');
        var my_id = "<?php echo $this->session->userdata('user_id'); ?>";
        var tablename = 'connect';
        var base_url = "<?php echo base_url(); ?>";
		$.ajax({
            url: base_url+'Front/deny_connect',
            type: 'POST',
            dataType: "json",
            data: "con_id=" + con_id +"&tablename="+tablename ,
            beforeSend: function(){
                $('.profile_btn_'+con_id).html('Denying...');
            },
            success: function(data) {
                if(data == 1){
                    $('.profile_btn_'+con_id).html('Denied');
                    $('.profile_btn_'+con_id).css('color','#fff');
                    $('.profile_btn_'+con_id).css('background-color','#20BA1A');
                    $('.profile_btn_'+user_id).css('display','none');
               }
            }
        });
    });
</script>