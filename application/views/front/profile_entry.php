
    
    <?php $this->load->view('front/include/login_header.php'); ?>
	
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Choose Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<form id="profile_upload"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Choose Profile Image</label>
			  <input type="file" name="img" class="form-control">
			  
		  </div>
        </div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-success btn-sm" >Upload</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  	
	<div class="modal fade" id="cover" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Choose cover Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<form id="cover_upload"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Choose cover Image</label>
			  <input type="file" name="cov_img" class="form-control">
			  
		  </div>
        </div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-success btn-sm" >Upload</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>

	<div class="limiter">
		<div class="container-login100">
       
			<div class="wrap-login100">
            <a href="<?php echo base_url(); ?>View/front/profile_entry_profession" class="btn btn-success btn-sm success" style="margin-top:-55px;float: right;">Skip
                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 14px;color: #fff;margin-left:10px;"></i>  
                <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 14px;color: #fff;"></i>  
            </a>
            <div class="new_icon">
            <div class="about_you">
                <a href="<?php echo base_url(); ?>View/front/profile_entry" class="about_you_p"  style="background-color:#20BA1A;">About You</a>
            </div>
            <div class="profession">
                <a href="<?php echo base_url(); ?>View/front/profile_entry_profession" class="profession_p" style="color:#000000;">Profession</a>
            </div>
       
    </div>
        <?php $user_id = $this->session->userdata('user_id');
            $get_data = $this->Admin_model->table_column('profile','user_id',$user_id);
            $get_loc = $this->Admin_model->table_column('user','user_id',$user_id);
            foreach($get_data as $row){ ?>
             <div id="img_profile">
                <?php if($row['img']!=''){ ?>
			        <img class="profile"  id="profile_img" src="<?php echo base_url();?>assets/user/profile/<?php echo $row['img']; ?>" alt="img" height="150px" width="150px" style="margin-left: 100px;margin-top: 20px;">      
                <?php }else{ ?>
			        <img class="profile"  id="profile_img" src="<?php echo base_url();?>assets/user/profile/default.png" alt="img" height="150px" width="150px" style="margin-left: 100px;margin-top: 20px;">       
                <?php } ?>
            </div>
                <button type="button" class="btn btn-success btn-sm success" data-toggle="modal" data-target="#myModal">Choose Profile</button>
                <button type="button" class="btn btn-success btn-sm success" data-toggle="modal" data-target="#cover">Choose Cover Image</button>
				<form class="login100-form validate-form" action="<?php echo base_url(); ?>Front/profile_data" method="post">
					<span class="login100-form-title p-b-26" style="font-size:20px;">
						Create Your Profile
					</span>
					<div class="wrap-input100" >
                        <label for="">Profile Title</label>
						<input class="input100 profile_title" type="text" name="profile_title" <?php if($row['profile_title'] != ''){ ?>value="<?php echo $row['profile_title']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 " >
                        <label for="">About You</label>
						<input class="input100 about" type="text" name="description" <?php if($row['about'] != ''){ ?>value="<?php echo $row['about']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
                    </div>  
                    <?php foreach($get_loc as $row_loc){ ?>
                    <div style="display:flex">
					<div class="wrap-input100 "  style="width:50%;" >
                        <label for="">City</label>
						<input class="input100 city" type="text" name="city"  <?php if($row_loc['city'] != ''){ ?>value="<?php echo $row_loc['city']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="wrap-input100  " style="width:50%;margin-left:10px;" data-validate = "Enter State">
                        <label for="">State</label>
						<input class="input100 state" type="text" name="state" <?php if($row_loc['state'] != ''){ ?>value="<?php echo $row_loc['state']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					</div>

                    <div style="display:flex">
					<div class="wrap-input100"  style="width:50%;" >
                        <label for="">Country</label>
						<input class="input100 country" type="text" name="country" <?php if($row_loc['country'] != ''){ ?>value="<?php echo $row_loc['country']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					<div class="wrap-input100  " style="width:50%;margin-left:10px;" data-validate = "Enter Zip Code">
                        <label for="">Zip Code</label>
						<input class="input100" type="text" name="zip" <?php if($row_loc['zip'] != ''){ ?>value="<?php echo $row_loc['zip']; ?>"<?php } ?>>
						<span class="focus-input100" data-placeholder=""></span>
					</div>
					</div>

                    <div class="wrap-input100 " >
                        <label for="">Contact</label>
						<input class="input100" type="text" name="contact" <?php if($row_loc['phone'] != ''){ ?>value="<?php echo $row_loc['phone']; ?>"<?php } ?>>
						<span class="" data-placeholder=""></span>
					</div>
                    <?php } ?>
                    <div class="wrap-input100" >
                        <label for="">Hobbies</label>
						<input class="input100" type="text" name="hobbie" <?php if($row['hobbie'] != ''){ ?>value="<?php echo $row['hobbie']; ?>"<?php } ?>>
						<span class="" data-placeholder=""></span>
					</div>

					<div class="wrap-input100 " >
                        <label for="">Interest</label>
						<input class="input100" type="text" name="interest" <?php if($row['interest'] != ''){ ?>value="<?php echo $row['interest']; ?>"<?php } ?>>
						<span class="" data-placeholder=""></span>
					</div>

					
            <div class="set_button">
                <div class="buttons">
                    <div class="reset">Reset</div>
                </div>
                <div class="buttons">
                    <button type="submit">Next</button>
                </div>
            </div>
                <?php } ?>
					
				
				</form>
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
            $('#myModal').modal('hide');
    });
    $(document).on('submit','#cover_upload',function(e){
        e.preventDefault();
        var formData = new FormData(this);
		var url= "<?php echo base_url(); ?>Front/cover";
        $.ajax({
            type:'POST',
            url: url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            },
            error: function(data){
            }
        });
            $('#cover').modal('hide');
    });
	</script>
    <script>
    $(document).on('click','.reset',function(){
        $('.interest').val('');
        $('.hobbies').val('');
        $('.contact').val('');
        $('.profile_title').val('');
        $('.zip').val('');
        $('.country').val('');
        $('.state').val('');
        $('.city').val('');
        $('.about').val('');
    });
</script>