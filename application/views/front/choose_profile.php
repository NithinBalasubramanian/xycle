	  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
    <?php $this->load->view('front/include/login_header.php'); ?>
    <div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
       
			<div class="wrap-login100">
             <div id="img_profile">
			<img class="profile"  id="profile_img" src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" height="150px" width="150px" style="margin-left: 100px;margin-top: -38px;">       
            </div>
            <button type="button" class="btn btn-success btn-sm success" data-toggle="modal" data-target="#myModal">Choose Profile</button>
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>Front/sign_in" method="post">
					<span class="login100-form-title p-b-26" style="font-size:20px;">
						Create Your Profile
					</span>
					
				

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="profile">
						<span class="focus-input100" data-placeholder="Profile Title"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="description">
						<span class="focus-input100" data-placeholder="Description"></span>
					</div>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="designation">
						<span class="focus-input100" data-placeholder="Designation"></span>
					</div>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="company">
						<span class="focus-input100" data-placeholder="Profile/Company Name"></span>
					</div>

                    <div class="col-sm-12 form-group">
                        <label for="look">Social</label><br>
                        <input type="radio" id="yes" name="yes" value="yes"> Yes
                        <input type="radio" name="no" style="margin-left:30px;" value="no"> NO
                    </div>
            <div id="link" style="display:none;">
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
            </div>

                    <div class="set_button1">
                     <div class="buttons">
                        <button type="submit">Next</button>
                    </div>
                    </div>
					
				
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('front/include/login_footer.php'); ?>
    <script>
    $(document).on('click','#yes',function(){
        $('#link').css("display","block");
    });
    </script>