	<?php $this->load->view('front/include/login_header.php'); ?>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="padding-top:20px;">
				<form class="login100-form validate-form">
                 
					<span class="login100-form-title p-b-26" style="font-size:18px;">
                    <img src="<?php echo base_url(); ?>assets/admin/img/x.png" width="60px" height="60px" ><span class="primary"><h6>XYCLE</h6></span><br>
                     <br>
                     <?php if($this->session->flashdata('msg_success')){ ?>
					<div class="col-md-12">
						<p class="alert alert-success"><?php echo $this->session->flashdata('msg_success'); ?></p>
					</div>
                    <?php } ?>
                    <?php if($this->session->flashdata('msg_error')){ ?>
                        <div class="col-md-12">
                            <p class="alert alert-danger"><?php echo $this->session->flashdata('msg_error'); ?></p>
                        </div>
                    <?php } ?>
                     <div id="img_profile">
                     <?php $user_id=$this->session->userdata('user_id');
                            $profile=$this->Admin_model->table_column('profile','user_id',$user_id);
                            foreach($profile as $row){ 
                            if($row['img'] != ""){ ?>
                                <img class="profile"  id="profile_img" src="<?php echo base_url();?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" height="150px" width="150px">
                            <?php }else{ ?>
						        <img class="profile"  id="profile_img" src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" height="150px" width="150px">
                            <?php } ?>
                        </div>
                        <br>
                        Hello <span class="primary"><?php echo $row['user_name']; ?></span>
                        <?php } ?>
                       <!-- <br>
                        <br>
						How to use <span class="primary"> XYCLE </span>-->
					</span>
                    <?php $main_ad = $this->Admin_model->table_column_limit_desc('ads','1');
                    foreach($main_ad as $ad_row){ ?>
                     <div class="admin_ad">
                    <div class="ad_top">
                        <div class="title"><?php echo $ad_row['title'];?></div>
                        <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
                    </div>
                    <div class="ad_img">
                        <img src="<?php echo base_url(); ?>assets/admin/img/<?php echo $ad_row['img']; ?>" alt="">
                    </div>
                </div>
                    <?php } ?>
                <div class="set_button1">
                     <div class="buttons">
                        <button type="submit"><a style="color: #fff;" href="<?php echo base_url(); ?>View/front/home">Start</a></button>
                    </div>
                    </div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<?php $this->load->view('front/include/login_footer.php'); ?>
    <script>
        $(document).on('click','.close_ad',function(){
            $(this).parent().parent().parent().remove();
        });
    </script>