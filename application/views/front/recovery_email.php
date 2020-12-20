<?php $this->load->view('front/include/login_header.php'); ?>
<body>
	<div class="loader_bg">
		<div class="loader"></div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url(); ?>Front/recovery">
					<span class="login100-form-title p-b-26 primary" >
						 <img src="<?php echo base_url(); ?>assets/admin/img/x.png" width="60px" height="60px" ><span><h6>XYCLE</h6></span>
					</span>
                    <h6 style="font-weight:bold;text-align:center;">Recovery Account</h6>
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
				<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Enter Email"></span>
				</div>
                </div>
                </div>
				<div style="width: 100%;padding: 10%;">
                    <button type="submit" style="padding: 5px 30px; width:100%; background-color: #20BA1A;color: #fff;font-weight: 600;outline: none;border: none;text-align: center;">SUBMIT</button>
                </div>
				<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account ,
						</span>

						<a class="txt2" href="<?php echo base_url(); ?>View/front/login">
							Sign In
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
    <?php $this->load->view('front/include/login_footer.php'); ?>
   
