<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan'); ?>

<?php $e_inv_data = $this->Admin_model->table_column('ecard','id',$data);
    foreach($e_inv_data as $row){ 
      $e_data = $this->Admin_model->table_column('job_profile','ecart_id',$data);
      foreach($e_data as $row_1){  ?>
      <div class="e_inv">
<div class="main_content">
    <div class="post" style="height:auto;">
    <div class="flex">
    <div class="set_button" style="width:50%;">
    <div class="buttons">
        <a href="<?php echo base_url(); ?>View/front/job_profile_edit/<?php echo $data; ?>" class="reset">Edit</a>
    </div>
    </div>
    <div class="back_home" style="width:50%;height:60px;">
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 20px 20px 0px"></i>  
        <i class="fa fa-chevron-left" aria-hidden="true" style="float:right;font-size: 20px;color: #20BA1A;padding:20px 0px 20px 0px;"></i>  
    </div>
      </div>
        <div class="container">
            <div class="main_e_invoice row ">
                <div class="flex">
                <div class="col-md-6 one">
                <div class="profile_logo">
                    <img src="<?php echo base_url(); ?>assets/user/job_profile/image/<?php echo $row_1['header_img']; ?>" width="100%" height="100%" alt="">
                </div>
                </div>
                <div class="col-md-6 two">
               <div class="invoice_number">
                   <h5> <?php echo $row_1['header_title']; ?></h5>
               </div>
                </div>
            </div>
                <hr>
            
                <div class="col-md-12">
                    <?php $sub_cont = $this->Admin_model->table_column('job_profile_sub','job_profile_id',$row_1['id']);
                    foreach($sub_cont as $row_3){ ?>
                <div class="amount_cont">
                            <h3 class="amt"><?php echo $row_3['sub_heading']; ?></h3>
                            <p class="amt"><?php echo $row_3['sub_description']; ?></p>
                            <div class="sub_img_profile">
                                <img src="<?php echo base_url(); ?>assets/user/job_profile/image/<?php echo $row_3['sub_image']; ?>" width="100%" height="100%" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </div>
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
    <?php } } ?>

<?php $this->load->view('front/include/footer.php'); ?>