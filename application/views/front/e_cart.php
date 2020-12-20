<?php $this->load->view('front/include/header.php'); ?>
<?php $this->load->view('front/include/header_menu.php'); ?>

<div class="main_content" >
    <div class="post_content">
    <a href="<?php echo base_url(); ?>View/front/add_post"><i class="fa fa-backward" aria-hidden="true" style="font-size:20px;color:#20BA1A;float:right;"></i>
    <p style="float:right;margin-top: -3px;    margin-right: 3px;font-size: 15px;">Back</p></a>
    
    <h4 class="text-center primary mt-2 mb-4">E-Buisness Card</h4>
    <hr>
    <div class="list">
        <form class="row cart" method="post" action="<?php echo base_url(); ?>Front/ecart"  enctype="multipart/form-data">
            <div class="col-sm-12 form-group">
                <label for="look">Select Look</label><br>
                <input type="radio" name="look" checked value="portrait"> Portrait
                <input type="radio" name="look" style="margin-left:30px;" value="Landscape"> Landscape
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Buisness Name</label>
                <input type="text" class="form-control input_box buisness"name="buisness_name"  placeholder="Enter Buisness Name" required>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Person Name</label>
                <input type="text" class="form-control input_box person" name="person_name" placeholder="Enter Person Name">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">My Profile</label><span style="margin-left:20px;">(Choose a profile)</span>
                <input type="file" class="form-control input_box profile_img" name="profile_img" placeholder="Choose Profile">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Designation</label>
                <input type="text" class="form-control input_box designation" name="designation" placeholder="Enter Designation">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Mobile No</label>
                <input type="text" class="form-control input_box mobile" name="mobile" placeholder="Enter Mobile No">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Email Id</label>
                <input type="text" class="form-control input_box email" name="email" placeholder="Enter Email Id">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Website</label>
                <input type="text" class="form-control input_box email" name="website" placeholder="Enter website">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Address</label>
                <input type="text" class="form-control input_box address" name="address" placeholder="Enter Address">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Buisness Logo</label><span style="margin-left:20px;">(Choose a logo)</span>
                <input type="file" class="form-control input_box logo" name="logo" placeholder="Choose Buisness Logo">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Background Color  </label><span style="margin-left:20px;">(Select a color)</span>
                <input type="color" class="form-control input_box color" name="color" placeholder="Select Background Color">
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Description</label>
                <textarea type="text" class="form-control input_box description" name="description" placeholder="Enter Description" row="10"></textarea>
            </div>
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Next</button>
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