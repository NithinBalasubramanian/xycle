<?php $this->load->view('front/include/login_header.php'); ?>
<body>
<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>Front/otp_verification" method="post">
					<span class="login100-form-title p-b-26 primary" style="font-size:22px;">
						XYCLE 
					</span>
				<div class="container">
                <div class="row">
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
					<div class="wrap-input100 validate-input col-md-12" data-validate = "Enter OTP ">
						<input class="input100" type="text" name="otp">
						<span class="focus-input100" data-placeholder="Enter OTP "></span>
					</div>
                </div>
                </div>

					<div style="width: 100%;padding: 10%;">
                    <button type="submit" style="padding: 5px 30px; width:100%; background-color: #20BA1A;color: #fff;font-weight: 600;outline: none;border: none;text-align: center;">VERIFY</button>
                </div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
    <?php $this->load->view('front/include/login_footer.php'); ?>
