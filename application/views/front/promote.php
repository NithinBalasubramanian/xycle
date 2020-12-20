<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
<div class="post_content" style="height:600px;">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">Promote</h4>
    <hr>
    
    <div class="list">
        <div class="promote_cont">
            <p>Thanks for chossing our platform for promotional activities !!</p>
           <br>
            <p>Please share your proposal in detail with budjet on infometry@gmail.com or whatsapp on <b> 9210926751</b></p>
        </div>
    </div>
    </div>

</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.reset',function(){
        $('.buisness').val('');
    });
   
</script>