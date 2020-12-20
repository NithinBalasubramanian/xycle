<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
<div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    <h4 class="text-center primary mt-2 mb-4">Promo Video</h4>
    <hr>
    <p style="text-align:center;margin-top: 8px;">Video allowed format <span style="color:#20BA1A;">MP4,Webm<span></p>
    
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/promo"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">Title</label>
                <input type="text" class="form-control input_box buisness" name="title"  placeholder="Enter Title">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Description</label>
                <textarea type="text" class="form-control input_box buisness" row="3"name="description"  placeholder="Enter Description"></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Upload Video</label>
                <input type="file" class="form-control input_box profile_img" name="video" placeholder="Upload Video">
            </div>
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Send</button>
                </div>
            </div>
        </form>
    </div>
    </div>

</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
    $(document).on('click','.reset',function(){
        $('.buisness').val('');
        $('.person').val('');
        $('.profile_img').val('');
        $('.designation').val('');
        $('.mobile').val('');
        $('.email').val('');
        $('.address').val('');
        $('.logo').val('');
        $('.color').val('');
        $('.description').val('');
    });
</script>