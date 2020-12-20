<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>
<?php 
$user_plan = $this->session->userdata('plan'); ?>


<div class="main_content">
<?php $profile_plan2=$this->Admin_model->table_column('plan');
    if(count($profile_plan2) > 0)
    {
        foreach($profile_plan2 as $row_plan2)
        {
            if($row_plan2['id'] != 1){ ?>
        <div class="post bellow" style="padding:20px;">
        <h6>Plan Type  <span style="color:#20BA1A;margin-left: 34px; " >:
        <?php echo $row_plan2['plan']; ?></span></h6>
        <?php if($row_plan2['discount'] !='0'){ ?>
        <h6>Amount  <span style="color:#20BA1A;margin-left: 46px; " >: RS <del><?php echo $row_plan2['amount']; ?></del></span></h6>
        <h6>Discount  <span style="color:#20BA1A;margin-left: 42px; " >: <?php echo $row_plan2['discount']; ?> %</span></h6>
        <?php } ?>
        <h6>Final Amount  <span style="color:#20BA1A;margin-left: 11px; " >: Rs <?php echo $row_plan2['final']; ?></span></h6>
        <h6>Valid Month  <span style="color:#20BA1A;margin-left: 19px; " >: <?php echo $row_plan2['valid']; ?></span></h6>
        <button class="btn btn-sm btn-success" style="width:100%;margin-top:10px;">Checkout</button>
        </div>
    <?php } }
    } ?>

</div>

<?php $this->load->view('front/include/footer.php'); ?>