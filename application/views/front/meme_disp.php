<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content">
    <div class="e_card_disp">
    <?php $user_id=$this->session->userdata('user_id');
    $pro_data=$this->Admin_model->table_column('profile','user_id',$user_id);
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
                if($row1['user_id'] == $user_id){ ?>
                <p><a href="<?php echo base_url(); ?>View/front/meme_edit/<?php echo $data;?>">Edit</a></p>
                <p>Analytics</p>
                <p>Promote</p>
                <p><a href="<?php echo base_url(); ?>Front/delete_data/<?php echo $data;?>/home">Delete</a></p>
                <?php } ?>
            </div>
            </div>
        </div>
        <?php } ?>
        <?php $card_data=$this->Admin_model->table_column('ecard','id',$data);
        foreach($card_data as $row){ ?>
        <div class="main_e_card" id="page_pdf">
            <div class="promo_cont meme_cont" style="<?php if($row['mode'] == 'light'){ ?>background-color:#fff <?php }else{ ?>background-color:black;color:#fff; <?php } ?>">
                <h5><?php echo $row['meme_top']; ?></h5>
                <div class="meme_img">
                    <img src="<?php echo base_url(); ?>assets/user/ecard/image/<?php echo $row['meme_img']; ?>" alt="" width="100%" height="100%">
                </div>
                <p><?php echo $row['meme_bottom']; ?></p>
           </div>
        </div>
        <?php } ?>
        <div class="set_button">
                <div class="buttons">
                    <div class="reset" onclick="printDiv('page_pdf')">Save </div>
                </div>
                <div class="buttons">
                    <button type="submit">Share</button>
                </div>
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