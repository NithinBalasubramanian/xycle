<?php $this->load->view('front/include/login_header.php'); ?>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>Front/userdata1">
					<span class="login100-form-title p-b-26" style="font-size:23px;">
                   
						Welcome to <span class="primary"> XYCLE </span>
					</span>
					<?php if($this->session->flashdata('msg_success')){ ?>
					<div class="col-md-12">
						<p class="alert alert-success"><?php echo $this->session->flashdata('msg_success'); ?></p>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('msg_error')){ ?>
					<div class="col-md-12">
						<p class="alert alert-danger"><?php echo $this->session->flashdata('msg_error'); ?></p>
					</div>
				<?php } ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Choose Username"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Your Name"></span>
					</div>
                    <p class="wrap-input100" style="font-family: Poppins-Regular;font-size: 15px;color: #555555;margin-bottom:20px;">Gender</p>
                    <div class="center">
                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" value="male" id="male" name="gender">
                        <label class="form-check-label radio" for="male" >Male</label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" value="female" id="female" name="gender">
                        <label class="form-check-label radio" for="female">Female</label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="radio" class="form-check-input" value="other" id="other" name="gender">
                        <label class="form-check-label radio" for="other" style="margin-bottom:34px;width: 337%;">Prefer Not To Say</label>
                    </div>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter DOB">
						<input class="input100" type="text" name="date">
						<span class="focus-input100" data-placeholder="Date Of Birth"></span>
					</div>
					<!--<div style="display:flex">
					<div class="wrap-input1001 validate-input "  style="width:20%;" >
						<input class="input100 " type="text" name="code">
						<span class="focus-input100" data-placeholder="Code"></span>
					</div>
					<div class="wrap-input100 validate-input " style="width:70%;margin-left:10px;" data-validate = "Enter mobile number">
						<input class="input100" type="tel" name="phone">
						<span class="focus-input100" data-placeholder="Enter Mobile Number"></span>
					</div>
					</div>-->
                    
                     <div class="wrap-input100 validate-input" data-validate = "Select a language">
						<select class="input100" type="text" name="language" style="border:none;outline:none;-ms-outline:none;"> 
                         <option></option>
                            <option value="english">English</option>
                            <option value="hindi">Hindi</option>
                        </select>
						<span class="focus-input100" data-placeholder="Choose Language"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
                    <div style="width: 100%;padding: 10%;">
                    <button type="submit" style="padding: 5px 30px; width:100%; background-color: #20BA1A;color: #fff;font-weight: 600;outline: none;border: none;text-align: center;">Next</button>
                </div>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<?php $this->load->view('front/include/login_footer.php'); ?>