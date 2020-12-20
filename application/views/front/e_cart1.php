<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
    <div class="post_content">
    <h4 class="text-center primary mt-2 mb-4">Add Your Social Media Business Pages</h4>
    <hr>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>Front/ecart_1"  enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data; ?>">
            <div class="col-sm-12 form-group">
                <label for="look">FaceBook Profile Link</label>
                <input type="text" class="form-control input_box fb" name="fb" placeholder="Enter FaceBook Profile Link">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Twitter Profile Link</label>
                <input type="text" class="form-control input_box tw" name="twitter" placeholder="Enter Twitter Profile Link">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Youtube Link</label>
                <input type="text" class="form-control input_box yo" name="youtube" placeholder="Enter Youtube Link">
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Linkedin Link</label>
                <input type="text" class="form-control input_box li" name="linkedin" placeholder="Enter Linkedin Link">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Instagram Link</label>
                <input type="text" class="form-control input_box in" name="insta" placeholder="Enter Instagram Link">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Whatsapp Number</label>
                <input type="text" class="form-control input_box wa" name="watsapp" placeholder="Enter Whatsapp Number">
            </div>
            
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Done</button>
                </div>
            </div>
        </form>
    </div>
    </div>

</div>


<?php $this->load->view('front/include/footer.php'); ?>
<script>
 $(document).on('click','.reset',function(){
        $('.fb').val('');
        $('.tw').val('');
        $('.in').val('');
        $('.li').val('');
        $('.wa').val('');
        $('.yo').val('');
    });
</script>