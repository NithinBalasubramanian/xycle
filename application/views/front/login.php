	<?php $this->load->view('front/include/login_header.php'); ?>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>Front/sign_in" method="post">
					<span class="login100-form-title p-b-26" style="font-size:22px;">
                     <img src="<?php echo base_url(); ?>assets/admin/img/x.png" width="60px" height="60px" ><span class="primary"><h6>XYCLE</h6></span><br>
						Login to <span class="primary">XYCLE </span>
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

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					
							
                <div style="width: 100%;padding: 10%;">
                    <button type="submit" style="padding: 5px 30px; width:100%; background-color: #20BA1A;color: #fff;font-weight: 600;outline: none;border: none;text-align: center;">Log In</button>
                </div>
                         
                    <div class="text-center" style="padding-top:57px";>
						<a href="<?php echo base_url(); ?>View_init/front/recovery_email">
                       
							Forgot Password?
						
                        </a>
                    </div>
					<div class="text-center">
						<span class="txt1">
							Don't have an account?
						</span>

						<a class="txt2" href="<?php echo base_url(); ?>View/front/signup">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<?php $this->load->view('front/include/login_footer.php'); ?>