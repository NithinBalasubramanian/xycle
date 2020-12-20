<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php $user_plan = $this->session->userdata('plan'); ?>

<div class="main_content">
    <div class="e_card_disp">
    <?php $user_id=$this->session->userdata('user_id');
    $card_data=$this->Admin_model->table_column('ecard','id',$data);
    foreach($card_data as $row){ 
    $pro_data=$this->Admin_model->table_column('profile','user_id',$row['user_id']);
        foreach($pro_data as $row1){ ?>
        <div class="top_part">
            <div class="post_profile">
                <div class="post_profile_img">
                    <?php if($row1['img'] != ''){ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/<?php echo $row1['img']; ?>" alt="img" >
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" >
                    <?php } ?>
                </div>
                <div class="post_profile_name">
                    <div class="name" style="text-transform:uppercase;"><?php echo $row1['user_name']; ?>
                    <p><?php echo $row1['designation']; ?></p></div>
                </div>
            </div>
            <div class="post_drop">
                <i class="fa fa-ellipsis-v icon_2 drop_on" aria-hidden="true"></i>
            <div class="over_icon none" >
                <p>Save</p>
                <p>Share</p>
                <p>Copy link</p>
                <?php  $user_id=$this->session->userdata('user_id');
                if($row['user_id'] == $user_id){ ?>
                <p><a href="<?php echo base_url(); ?>View/front/e_cart_edit/<?php echo $row['id'];?>">Edit</a></p>
                <p>Analytics</p>
                <p>Promote</p>
                <p><a href="<?php echo base_url(); ?>Front/delete_data/<?php echo $row['id'];?>/home">Delete</a></p>
                <?php } ?>
            </div>
            </div>
        </div>
        <?php } ?>
        <?php 
            $user_plan_get_id = $this->Admin_model->table_column('user','user_id',$row['user_id']);
            foreach($user_plan_get_id as $plan_row){
                $plan= $plan_row['plan_type'];
            }
            ?>
        <div class="main_e_card" id="page_pdf">
            <div class="buisness_pic">
            <?php if($plan == 1){ ?>
                <div class="sub_img" style="background-image:url('<?php echo base_url(); ?>assets/admin/img/x_green.png');"></div>
                <div class="sub_img" style="background-image:url('<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['logo']; ?>');"></div>
            <?php }else{ ?>
            <div class="main_img" style="background-image:url('<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['logo']; ?>');">
            </div>
            <?php } ?>
            </div>
            <div class="ecart_profile"  style="background-color:<?php echo $row['color']; ?>;">
                <div class="post_profile_img">
                <img src="<?php echo base_url(); ?>assets/user/ecard/profile/<?php echo $row['profile_img']; ?>" alt="img" style ="width:90%;height:120px;border-radius:20px;margin-top:-30px;padding:10px;">
                </div>
                <div class="post_profile_name1" style="width:60%;height:100%;">
                    <div class="name" style=" padding:5px;width:95%;height:90%;text-transform:uppercase; "><p style="color:white;"><?php echo $row['person_name']; ?></p>
                    <i style="color:white;"><?php echo $row['designation']; ?></i>
                </div>
            </div>
        </div>
         <div class="ecart_content_main" style="color:<?php echo $row['color']; ?>;">
            <div class="name" style=" padding:5px;width:95%;height:90%; "><h5><?php echo $row['buisness_name']; ?></h5>
            <p><?php echo $row['address']; ?></p>
            <p><?php echo $row['description']; ?></p>
            <h6 class="num" style=" font-weight: bold;margin-top: 25px;color:black;">Contact</h6>
            <p><i class="fa fa-phone phone" aria-hidden="true"></i> <?php echo $row['mobile']; ?></p>
            <p><i class="fa fa-envelope phone" aria-hidden="true"></i> <?php echo $row['email']; ?></p>
            <p><i class="fa fa-chevron-circle-up phone" aria-hidden="true"></i> <?php echo $row['website']; ?></p>
        </div>
</div>
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
    </div>
        <?php } ?>
        <div class="set_button">
                <div class="buttons">
                    <div class="reset" onclick="printDiv('page_pdf')">Save </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="send_this">Send</button>
                </div>
            </div>
            <div class="send_div">
            <form method="post" id="send_on">
            <input type="text" maxlength="10" name="send" class="col-md-10 send " row="4" placeholder="Phone number">
            <button type="submit" id="send" data-url="<?php echo base_url(); ?>View/front/e_card_disp/<?php echo $row['id'];?>"><i class="fa fa-paper-plane icon_send" aria-hidden="true"></i></button>
        </form>
        </div>
</div>
</div>

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<?php $this->load->view('front/include/footer.php'); ?>

<script>
     $(document).on('click','.send_this',function(){
        $(this).parent().parent().next().toggleClass('view_this');
    });
    $(document).on('click','#send',function(){
      var num=$(this).prev().val();
      if(num.length == 10){
       var url=$(this).data('url');
      window.open("whatsapp://send?phone=91"+num+"&text=please check this "+url);
      }else{
        alert("Recheck The Number ");
      }
    });
</script>