
    
    <?php $this->load->view('front/include/login_header.php'); ?>


	<div class="limiter">
		<div class="container-login100">
       
			<div class="wrap-login100">
            <a href="<?php echo base_url(); ?>View/front/video" class="btn btn-success btn-sm success" style="margin-top:-55px;float: right;">Skip
                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 14px;color: #fff;margin-left:10px;"></i>  
                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 14px;color: #fff;"></i>  
            </a>
            <div class="new_icon">
            <div class="about_you">
                <a href="<?php echo base_url(); ?>View/front/profile_entry" class="about_you_p" style="color:#000000;" >About You</a>
            </div>
            <div class="profession">
                <a href="<?php echo base_url(); ?>View/front/profile_entry_profession" class="profession_p" style="background-color:#20BA1A;color:#fff;">Profession</a>
            </div>
       
    </div>
            
            <?php $user_id = $this->session->userdata('user_id');
            $get_data = $this->Admin_model->table_column('profile','user_id',$user_id);
            foreach($get_data as $row){ ?>    
            <form class="login100-form" action="<?php echo base_url(); ?>Front/profile_data_2" method="post">
					
					<div class="wrap-input100 validate-input" >
                        <label for="">Occupation</label>
						<input class="input100" type="text" name="type"  <?php if($row['type'] != ''){ ?>value="<?php echo $row['type']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 validate-input" >
                        <label for="">School Name</label>
						<input class="input100" type="text" name="school"  <?php if($row['school'] != ''){ ?>value="<?php echo $row['school']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 validate-input ">
                        <label for="">College Name</label>
						<input class="input100 " type="text" name="college"  <?php if($row['college'] != ''){ ?>value="<?php echo $row['college']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="wrap-input100 validate-input ">
                        <label for="">Highest Qualification</label>
						<input class="input100" type="tel" name="qualification"  <?php if($row['qualification'] != ''){ ?>value="<?php echo $row['qualification']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
                    <div class="wrap-input100 validate-input" >
                        <label for="">Passed Out In Year"</label>
						<input class="input100" type="text" name="passed_out"  <?php if($row['passed_out'] != ''){ ?>value="<?php echo $row['passed_out']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

                    <div class="wrap-input100 validate-input" >
                        <label for="">Company Name</label>
						<input class="input100" type="text" name="company"  <?php if($row['company'] != ''){ ?>value="<?php echo $row['company']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 validate-input" >
                        <label for="">Skills</label>
						<input class="input100" type="text" name="skills"  <?php if($row['skills'] != ''){ ?>value="<?php echo $row['skills']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 validate-input" >
                        <label for="">Designation</label>
						<input class="input100" type="text" name="designation"  <?php if($row['designation'] != ''){ ?>value="<?php echo $row['designation']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

                    <div class="wrap-input100 validate-input" >
                        <label for="">Expertise</label>
						<input class="input100" type="text" name="expertise"  <?php if($row['expertise'] != ''){ ?>value="<?php echo $row['expertise']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div> 

                    <div class="wrap-input100 validate-input" >
                        <label for="">description</label>
						<input class="input100" type="text" name="description"  <?php if($row['description'] != ''){ ?>value="<?php echo $row['description']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
                    <div class="col-sm-12 form-group">
                        <label for="social">Add Social Media Profile</label><br>
                        <input type="radio" id="yes" name="social" value="yes"> Yes
                        <input type="radio" id="no" name="social" style="margin-left:30px;" value="no"> NO
                    </div>
            <div id="link" style="display:none;">
            <div class="col-sm-12 form-group">
                <label for="look">FaceBook Profile Link (optional)</label>
                <input type="text" class="form-control input_box fb" name="fb" placeholder="Enter FaceBook Profile Link"  <?php if($row['fb'] != ''){ ?>value="<?php echo $row['fb']; ?>"<?php } ?>>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Twitter Profile Link (optional)</label>
                <input type="text" class="form-control input_box tw" name="twitter" placeholder="Enter Twitter Profile Link"  <?php if($row['twitter'] != ''){ ?>value="<?php echo $row['twitter']; ?>"<?php } ?>>
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Youtube Link (optional)</label>
                <input type="text" class="form-control input_box yo" name="youtube" placeholder="Enter Youtube Link"  <?php if($row['youtube'] != ''){ ?>value="<?php echo $row['youtube']; ?>"<?php } ?>>
            </div>
             <div class="col-sm-12 form-group">
                <label for="look">Linkedin Link (optional)</label>
                <input type="text" class="form-control input_box li" name="linkedin" placeholder="Enter Linkedin Link"  <?php if($row['linkedin'] != ''){ ?>value="<?php echo $row['linkedin']; ?>"<?php } ?>>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Instagram Link (optional)</label>
                <input type="text" class="form-control input_box in" name="insta" placeholder="Enter Instagram Link"  <?php if($row['insta'] != ''){ ?>value="<?php echo $row['insta']; ?>"<?php } ?>>
            </div>
            <div class="col-sm-12 form-group">
                <label for="look">Whatsapp Number (optional)</label>
                <input type="text" class="form-control input_box wa" name="watsapp" placeholder="Enter Whatsapp Number"  <?php if($row['watsapp'] != ''){ ?>value="<?php echo $row['watsapp']; ?>"<?php } ?>>
            </div>
            </div> 

                    <div class="set_button1">
                     <div class="buttons">
                        <button type="submit">Done</button>
                    </div>
                    </div>
					
				
                </form>
            <?php } ?>
			</div>
		</div>
	</div>
	<?php $this->load->view('front/include/login_footer.php'); ?>
    <script>
    $(document).on('click','#yes',function(){
        $('#link').css("display","block");
    });
	$(document).on('click','#no',function(){
        $('#link').css("display","none");
    });
    </script>
	<script>
	 $(document).on('submit','#profile_upload',function(e){
        e.preventDefault();
        var formData = new FormData(this);
		var url= "<?php echo base_url(); ?>Front/profile";
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#img_profile').html(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    });
	</script>