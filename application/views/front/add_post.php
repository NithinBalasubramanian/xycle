<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan'); ?>

<div class="main_content" >
    <div class="post_content">
    <h4 class="text-center primary mt-2 mb-4">Create Post</h4>
    <hr>
    <div class="back_home" style="width:100%;height:60px;">
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 16px;color: #20BA1A;padding:20px 20px 20px 0px"></i>  
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 16px;color: #20BA1A;padding:20px 0px 20px 0px;"></i>  
    </div>
    <div class="list">
        <p>What would you like to create today ?</p>
        <ul>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="<?php echo base_url(); ?>View/front/e_cart">e-Business card</a></li>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="">e-Brochure</a></li>
            <?php
                $k=1;
                if($user_plan == '1'){ ?>
                <?php 
                $ad_count = $this->Admin_model->table_column('ads');
                $random_number = mt_rand(1, count($ad_count));
                $ads = $this->Admin_model->table_column('ads');
                foreach($ads as $ad_row){ 
                    if($k == $random_number){ ?>
            <div>
            <div class="admin_ad">
                <div class="ad_top">
                    <div class="title"><?php echo $ad_row['title'];?></div>
                    <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
                </div>
                <div class="ad_img">
                    <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $ad_row['img']; ?>" alt="">
                </div>
            </div>
            </div>
                    <?php } $k++;} ?>
                <?php } ?>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="<?php echo base_url(); ?>View/front/promo">Promo Video</a></li>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="<?php echo base_url(); ?>View/front/job_profile">Job Profile</a></li>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="<?php echo base_url(); ?>View/front/e_invoice">e-Invoice</a></li>
            <li><div><i class="fa fa-hand-o-right icon_2" aria-hidden="true"></i></div><a href="<?php echo base_url(); ?>View/front/create_meme">Meme</a></li>
        </ul>
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
    <div class="admin_ad_1">
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
</div>


<?php $this->load->view('front/include/footer.php'); ?>
