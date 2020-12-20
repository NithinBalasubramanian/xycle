<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
    <div class="post_content">
    <h4 class="text-center primary mt-2 mb-4">Promo Video</h4>
    <hr>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>front/promo"  enctype="multipart/form-data">
            
            <div class="col-sm-12 form-group">
                <label for="look">Title</label>
                <input type="text" class="form-control input_box title" name="title"  placeholder="Enter Title">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Description</label>
                <textarea type="text" class="form-control input_box description" row="3"name="description"  placeholder="Enter Description"></textarea>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Upload Video</label>
                <input type="file" class="form-control input_box promo_video" name="video" placeholder="Upload Video">
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
        $('.promo_video').val('');
        $('.description').val('');
        $('.title').val('');
    });
</script>