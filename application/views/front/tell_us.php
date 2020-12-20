	<?php $this->load->view('front/include/login_header.php'); ?>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>Front/profile_2" method="post">
					<span class="login100-form-title p-b-26" style="font-size:18px;">
						Tell us little more about you
					</span>
					
                   
					<div class="wrap-input100 validate-input" data-validate = "Enter your name">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Yourname"></span>
					</div>
                    <p class="wrap-input100" style="font-family: Poppins-Regular;font-size: 15px;color: #555555;margin-bottom:20px;">Gender</p>
                    <div class="center">
                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" id="male" name="gender">
                        <label class="form-check-label radio" for="male" >Male</label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" id="female" name="gender">
                        <label class="form-check-label radio" for="female">Female</label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" id="other" name="gender">
                        <label class="form-check-label radio" for="other" style="margin-bottom:34px;width: 337%;">Prefer Not To Say</label>
                    </div>
                    </div>
                    <div class="wrap-input100 validate-input " data-validate ="Enter DOB ">
						<input class="input100 date_place" type="text" name="dob">
						<span class="focus-input100" data-placeholder="Date of Birth"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Select a Profile Type">
						<select class="input100" type="text" name="type" style="border:none;outline:none;"> 
                            <option></option>
                            <option>Profile Type</option>
                            <option>Job Seeker</option>
                            <option>Business</option>
                            <option>Promotor</option>
                            <option>Student</option>
                            <option>Professional</option>
                            <option>Publicity</option>
                            <option>Emergency series</option>
                            <option>Leisurer</option>
                        </select>
						<span class="focus-input100" data-placeholder="Choose Profile Type"></span>
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
	

	<div id="dropDownSelect1"></div>
	<?php $this->load->view('front/include/login_footer.php'); ?>