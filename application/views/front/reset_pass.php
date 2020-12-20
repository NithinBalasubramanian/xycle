<?php $this->load->view('front/include/login_header.php'); ?>
<body>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>Front/reset_password">
					<span class="login100-form-title p-b-26 primary" >
						 <img src="<?php echo base_url(); ?>assets/admin/img/x.png" width="60px" height="60px" ><span><h6>XYCLE</h6></span>
					</span>
                    <h6 style="font-weight:bold;text-align:center;">Reset Password</h6>
					<br>
				<div class="container mt-2">
                <div class="row" style="display:flex;">
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
				<br>
				<div class="container mt-2">
                <div class="row" style="display:flex;">
				
				<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Reset Password"></span>
					</div>
                </div>
                </div>
				<div style="width: 100%;padding: 10%;">
                    <button type="submit" style="padding: 5px 30px; width:100%; background-color: #20BA1A;color: #fff;font-weight: 600;outline: none;border: none;text-align: center;">RESET PASSWORD</button>
                </div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
    <?php $this->load->view('front/include/login_footer.php'); ?>
   
