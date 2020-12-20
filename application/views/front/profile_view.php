<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
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
    <div class="post" style="height:auto;">
    <div class="back_home" style="width:100%;height:60px;">
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 20px 20px 0px"></i>  
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 0px 20px 0px;"></i>  
    </div>
   <?php $profile_data=$this->Admin_model->table_column('profile','user_id',$data);
        foreach($profile_data as $row){ ?>
        <div class="top_part1" <?php if($row['cover_img'] != ''){ ?>style="background-image:url('<?php echo base_url();?>assets/user/cover/<?php echo $row['cover_img'];?>');background-size:cover;background-repeat:no-repeat;" <?php } ?>>
            <div  style="color:#fff;text-transform:uppercase;float:right;margin-right:10px;padding:10px;width:60%;">
        </div>
            <div class="post_profile_img">
            <?php if($row['img'] != ''){ ?>
                <img src="<?php echo base_url(); ?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" style="width:97%;height:95px;border-radius: 60px;margin-top: 73px;">
            <?php }else{ ?>
                <img src="<?php echo base_url(); ?>assets/user/profile/default.png" alt="img" style="width:97%;height:95px;border-radius: 60px;margin-top: 73px;">
            <?php } ?>
            </div>
            <!-- <a href="<?php echo base_url(); ?>View/front/profile_edit">
                <i class="fa fa-pencil" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:10px;"></i>  
            </a>   -->
        </div>
       
        <div class="post_middle_part" style="padding-top: 10px;">
            <div class="main_e_card1">
                <div class="buisness_pic">
                    <div class="name" style="padding: 5px;width: 100%;margin-top: 33px;">
                        <h5><?php echo $row['user_name']; ?></h5>
                        <?php $user_data=$this->Admin_model->table_column('user','user_id',$data);
                        foreach($user_data as $row_1){ ?>
                        <h6 style="font-size:12px;"><?php echo $row['profile_title']; ?></h6>
                        <p class="notify_date"> ( Member Since <?php echo  date("d M,Y", strtotime($row_1['date'])); ?> ) </p>
                        <?php } ?>
                        <h5>Company : <span style="color:#20BA1A; " ><?php echo $row['company']; ?></span></h5>
                        <h6>Designation : <span style="color:#20BA1A; " ><?php echo $row['designation']; ?></span></h6>
                        <h6>Bio : <span style="color:#20BA1A; " ><?php echo $row['description']; ?></span></h6>
                        <table class="table table-bordered" style="margin-top: 17px;">
                            <tr>
                                <th>
                                    <p style="font-size:bold">Skills : <?php echo $row['skills']; ?></p>
                                </th>
                            <tr>
                            <tr>
                                <th>
                                    <p style="font-size:bold">Expertise : <?php echo $row['expertise']; ?></p>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <p style="font-size:bold">Type : <?php echo $row['type']; ?></p>
                                </th>
                            </tr>
                        </table>
                        <?php if($row['social']=='yes'){ ?>
                        <p>Follow Me On</p>
                        <div class="links">
                            <?php if( $row['insta'] != ""){ ?>
                            <a class="insta icons" href="<?php echo $row['insta']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <?php } 
                            if( $row['fb'] != ""){ ?>
                            <a class="fb icons"  href="<?php echo $row['fb']; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <?php } 
                            if( $row['twitter'] != ""){ ?>
                            <a class="twitter icons"  href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            <?php } 
                            if( $row['watsapp'] != ""){ ?>
                            <a class="watsapp icons" href="<?php echo $row['watsapp']; ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            <?php } 
                            if( $row['youtube'] != ""){ ?>
                            <a class="youtube icons" href="<?php echo $row['youtube']; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <?php } 
                            if( $row['linkedin'] != ""){ ?>
                            <a class="linked icons" href="<?php echo $row['linkedin']; ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            <?php }  ?>
                        </div>
                            <?php } ?>
                    </div>
                </div>
            <!--<div class="ecart_profile"  style="background-color:red;">
               
                <div class="post_profile_name1" style="width:60%;height:100%;">
                    <div class="name" style=" padding:5px;width:95%;height:90%;text-transform:uppercase; "><p style="color:white;"></p>
                    <i style="color:white;font-size:13px;"></i>
                </div>-->
            <?php } ?>
            </div>
        </div>
</div>

<?php $profile_plan2=$this->Admin_model->table_column('plan');
    if(count($profile_plan2) > 0)
    {
        foreach($profile_plan2 as $row_plan2)
        { ?>
        <div class="post bellow" style="padding:20px;display:none;">
        <h6>Plan Type  <span style="color:#20BA1A;margin-left: 34px; " >:
        <?php echo $row_plan2['plan']; ?></span></h6>
        <h6>Amount  <span style="color:#20BA1A;margin-left: 46px; " >: RS <?php echo $row_plan2['amount']; ?></span></h6>
        <h6>Discount  <span style="color:#20BA1A;margin-left: 42px; " >: <del><?php echo $row_plan2['discount']; ?></del> %</span></h6>
        <h6>Final Amount  <span style="color:#20BA1A;margin-left: 11px; " >: Rs <?php echo $row_plan2['final']; ?></span></h6>
        <h6>Valid Month  <span style="color:#20BA1A;margin-left: 19px; " >: <?php echo $row_plan2['valid']; ?></span></h6>
        <button class="btn btn-sm btn-success" style="width:100%;margin-top:10px;">Checkout</button>
        </div>
    <?php }
    } ?>
</div>

<?php $this->load->view('front/include/footer.php'); ?>
<script>
$(document).on('click','.upgrade',function(){
    $('.bellow').css({'display':'block'});
});
</script>