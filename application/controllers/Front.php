<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
    }
	public function index()
	{
        // if($this->session->userdata('user_id')){
        //     redirect('View/front/video');
        // }else{
            $this->load->view('front/signup');
        // }
    }
    public function View_init($foldername,$file,$edit=FALSE)
    {
        if($edit != FALSE){
                $data['data']=$edit;
                $this->load->view($foldername.'/'.$file,$data);
            }else{
                $this->load->view($foldername.'/'.$file);
            }
    }
    public function View($foldername,$file,$edit=FALSE)
    {
        if($file == 'signup'){
            if($this->session->userdata('email_now')){
                $this->load->view($foldername.'/otp');
            }else{
                $this->load->view($foldername.'/'.$file);
            }
        }else{
        if($this->session->userdata('user_id')){
            $this->session->set_userdata('user_id',$this->session->userdata('user_id'));
            $this->session->set_userdata('user_type',$this->session->userdata('user_type'));
            $this->session->set_userdata('plan',$this->session->userdata('plan'));
            if($edit != FALSE){
                $data['data']=$edit;
                $this->load->view($foldername.'/'.$file,$data);
            }else{
                $this->load->view($foldername.'/'.$file);
            }
        }else{
            redirect();
        }
    }
        
    }

    public function sign_in()
    {
        $email=$this->input->post('email');
        $pass=sha1($this->input->post('pass'));
        $val_check=$this->Admin_model->table_column('user','email',$email,'pass',$pass);
        if(count($val_check)>0){
            foreach($val_check as $row){
                $user_id=$row['user_id'];
                $user_type=$row['user_type'];
                $plan=$row['plan_type'];
                $status=$row['status'];
            }
            if($status == '1'){
                $this->session->set_userdata('user_id',$user_id);
                $this->session->set_userdata('user_type',$user_type);
                $this->session->set_userdata('plan',$plan);
                redirect('View/front/profile_entry');
            }else{
                $this->session->set_flashdata('msg_error','Account has been blocked');
                redirect('View_init/front/login');
            }
        }else{
            $this->session->set_flashdata('msg_error','Incorrect email or password');
            redirect('View_init/front/login');
        }
    }
    
    public function phone_verification()
    {
        // require 'textlocal.class.php';
        // $textlocal=new textlocal('nithinmigo1@gmail.com','ghfE1FS9TFA-HG82WYeE1LQwWJgka7vXnYQWFKG1D4'); 
        // $textlocal->sendSms(['918838825568'],'Welcome to XYCLE','XYCLE'); 
                
        $email = $this->input->post('email');
        $otp = mt_rand(100000, 999999);
        $this->load->helper('string');
        $user_id=random_string('alnum',6);
        $val_check = $this->Admin_model->table_column('verification','user_id',$user_id);
        if(count($val_check)>0){
            $user_id=random_string('alnum',6);
        }
        $val_check = $this->Admin_model->table_column('verification','email',$email,'status','1');
        if(count($val_check)>0){
            $this->session->set_flashdata('msg_error','Email is already taken');
            redirect('View/front/signup');
        }else{
            $this->session->set_userdata('email_now',$email);
            $data = array(
                'user_id'=>$user_id,
                'email'=>$email,
                'otp'=>$otp,
                'status'=>'0',
                'date'=>date('d-m-Y'),
            );
            $insert = $this->Admin_model->create('verification',$data);
            $subject="Verify your password";
			$from_email ="nithinmigo1@gmail.com";
			$to_email = $email;
			//Load email library
	        $email_config = Array(
			    'smtp_crypto'=>'ssl', //add this one
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'nithinmigo1@gmail.com',
				'smtp_pass' => '711015Nithin@1',
				'mailtype'  => 'html',
				'starttls'  => true,
				'newline'   => "\r\n",
				'charset' => 'utf-8',
				'wordwrap' => TRUE,
				
			);
			
			$message='<div class="main" style="width:100%;margin:0 auto;"><div style="width:100%;height:80px;background-color:rgba(21, 34, 43, 0.85);"><h1 style="color:#fff;margin-left:50px;padding:20px;">Welcome To <span style="color:#2AC37D;"> XYCLE</span></h1></div><div style="width:100%;height:200px;background-color:#f5f5f5;"><br><p style="margin-left:40px;">Hello , Welcome to XYCLE  .Verify your account .Your OTP is <b>'.$otp.'</b></p></div>';
		    $message.='<footer style="width:100%;height:40px;color:#fff;background-color:rgba(21, 34, 43, 0.85);padding:20px;">&copy; '.date('Y').'- XYCLE <span style="float:right;padding-right:40px;> Pingifinit Software technologies</span></footer></div>';
			$this->load->library('email', $email_config);
			$this->email->set_newline("\r\n");
			
			// $this->email->initialize($config);
            $this->email->from('nithinmigo1@gmail.com','nithin');
            $this->email->to($to_email); 
            $this->email->subject($subject);

           $this->email->message($message);  
			//Send mail
		//Send mail
			if($this->email->send()){
                $this->session->set_flashdata('msg_success','OTP Sent successfully');
                redirect('View_init/front/otp');
			}else{
                $this->session->set_flashdata('msg_error','Email send unsuccessful');
                redirect('View_init/front/signup');
			}
			
        }
    }
    public function otp_verification()
    {
        $otp=$this->input->post('otp');
        $date=date('d-m-Y');
        $data = array();
        $val_check = $this->Admin_model->table_column('verification','otp',$otp,'date',$date,'status','0');
        if(count($val_check)>0){
            foreach($val_check as $val_row){
                $user_id = $val_row['user_id'];
                $where['user_id']= $user_id;
                $this->session->set_userdata('user_id',$val_row['user_id']);
                $this->session->set_userdata('user_type','user');
                $this->session->set_userdata('plan','1');
                $data['status']='1';
            }
            $update_status=$this->Admin_model->edit('verification',$data,$where);
            $data_not = array(
                'note_from' => 'admin',
                'note_to' => $user_id,
                'note' => 'Email verified Successfully',
                'date' => date('d-m-Y')
            );
            $this->Admin_model->create('notification',$data_not);
            $this->session->set_flashdata('msg_success','Contact verified successfully');
            redirect('View/front/choose_language');
        }else{
            $this->session->set_flashdata('msg_error','OTP Entered is incorrect');
            redirect('View_init/front/otp');
        }
    }

    public function recovery()
    {
        $email_id = $this->input->post('email');
        $check = $this->Admin_model->table_column('user','email',$email_id);
        if(count($check)>0){
            $otp = mt_rand(100000, 999999);
                $this->session->set_userdata('email_now',$email_id);
                foreach($check as $row){
                    $user_id = $row['user_id'];
                }
                $data = array(
                    'user_id'=>$user_id,
                    'email'=>$email_id,
                    'otp'=>$otp,
                    'status'=>'0',
                    'date'=>date('d-m-Y'),
                );
                $insert = $this->Admin_model->create('recovery',$data);
                $subject="Recover Your Account";
                $from_email ="nithinmigo1@gmail.com";
                $to_email = $email_id;
                //Load email library
                $email_config = Array(
                    'smtp_crypto'=>'ssl', //add this one
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'nithinmigo1@gmail.com',
                    'smtp_pass' => '711015Nithin@1',
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n",
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE,
                    
                );
                
                $message='<div class="main" style="width:100%;margin:0 auto;"><div style="width:100%;height:80px;background-color:rgba(21, 34, 43, 0.85);"><h1 style="color:#fff;margin-left:50px;padding:20px;">Welcome To <span style="color:#2AC37D;"> XYCLE</span></h1></div><div style="width:100%;height:200px;background-color:#f5f5f5;"><br><p style="margin-left:40px;">Hello , Welcome to XYCLE  .Recover your account .Your OTP is <b>'.$otp.'</b></p></div>';
                $message.='<footer style="width:100%;height:40px;color:#fff;background-color:rgba(21, 34, 43, 0.85);padding:20px;">&copy; '.date('Y').'- XYCLE <span style="float:right;padding-right:40px;> Pingifinit Software technologies</span></footer></div>';
                $this->load->library('email', $email_config);
                $this->email->set_newline("\r\n");
                
                // $this->email->initialize($config);
                $this->email->from('nithinmigo1@gmail.com','nithin');
                $this->email->to($to_email); 
                $this->email->subject($subject);
    
               $this->email->message($message);  
                //Send mail
            //Send mail
                if($this->email->send()){
                    $this->session->set_flashdata('msg_success','OTP Sent successfully');
                    redirect('View_init/front/recovery_otp');
                }else{
                    $this->session->set_flashdata('msg_error','OTP send unsuccessful');
                    redirect('View_init/front/recovery_email');
                }
        }else{
            $this->session->set_flashdata('msg_error','Email Id is not Registered');
            redirect('View_init/front/recovery_email');
        }
    }

    public function recovery_otp()
    {
        $otp=$this->input->post('otp');
        $email = $this->session->userdata('email_now');
        $date=date('d-m-Y');
        $data = array();
        $val_check = $this->Admin_model->table_column('recovery','otp',$otp,'email',$email,'status','0');
        if(count($val_check)>0){
            foreach($val_check as $row){
                if($row['date'] == $date){
                    $user_id = $row['user_id'];
                    $get_user = $this->Admin_model->table_column('user','user_id',$user_id);
                    foreach($get_user as $user_row){
                        $this->session->set_userdata('user_id',$user_row['user_id']);
                        $this->session->set_userdata('user_type',$user_row['user_type']);
                        $this->session->set_userdata('plan',$user_row['plan_type']);
                    }
                    $this->session->set_flashdata('msg_success','Verified Successfully');
                    redirect('View_init/front/reset_pass');
                }else{
                    $this->session->set_flashdata('msg_error','OTP has been Expired');
                    redirect('View_init/front/recovery_email');
                }
            }
        }
    }

    public function reset_password()
    {
        $pass = sha1($this->input->post('pass'));
        $data['pass'] = $pass;
        $where['user_id'] = $this->session->userdata('user_id');
        $this->Admin_model->edit('user',$data,$where);
        $data_not = array(
            'note_from' => 'admin',
            'note_to' => $this->session->userdata('user_id'),
            'note' => 'Password Changed Successfully',
            'date' => date('d-m-Y')
        );
        $this->Admin_model->create('notification',$data_not);
        $this->session->set_flashdata('msg_success','Password Reset Successfully');
        redirect('View_init/front/video');
    }

    public function userdata1()
    {
        $user_id=$this->session->userdata('user_id');
        $get_email=$this->Admin_model->table_column('verification','user_id',$user_id);
        foreach($get_email as $row){
            $email=$row['email'];
        }
        $username=$this->input->post('username');
        $name=$this->input->post('name');
        // $country_code=$this->input->post('code');
        // $phone=$this->input->post('phone');
        $gender = $this->input->post('gender');
        $pass=sha1($this->input->post('pass'));
        $language=$this->input->post('language');
        $dob = $this->input->post('date');
        $data=array(
            'user_id'=>$user_id,
            'username'=>$username,
            'email'=>$email,
            // 'country_code'=>$country_code,
            // 'phone'=>$phone,
            'pass'=>$pass,
            'language'=>$language,
            'status'=>'1',
            'date'=>date('d-m-Y'),
        );
        $data_profile=array(
            'user_id'=>$user_id,
            'user_name'=>$username,
            'name'=>$name,
            'email'=>$email,
            'gender'=>$gender,
            'dob'=>$dob,
        );
        $insert = $this->Admin_model->create('user',$data);
        $insert_profile = $this->Admin_model->create('profile',$data_profile);
        redirect('View/front/profile_entry');
    }
   
    public function profile()
    {
        $fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $output='';
		    $imgname=time().'_user.'.$fileExt;
            $config['upload_path']='./assets/user/profile/'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
            $this->load->library('upload',$config);
            $this->upload->do_upload('img');
            $data['img']=$imgname;
            $user_id=$this->session->userdata('user_id');
            $data['user_id']=$user_id;
            $val_check=$this->Admin_model->table_column('profile','user_id',$user_id);
            if(count($val_check)>0){
                 $where['user_id']=$user_id;
                $this->Admin_model->edit('profile',$data,$where);
                $result=TRUE;
            }else{
                $result= $this->Admin_model->create('profile',$data);
            }
        if ($result == TRUE) {
            $url=''.base_url().'assets/user/profile/'.$imgname.'';
            $output.='<img class="profile"  id="profile_img" src="'.base_url().'assets/user/profile/'.$imgname.'" alt="img" height="150px" width="150px" style="margin-left: 100px;margin-top: 20px;">';
            echo $output;
        }
    }
    public function cover()
    {
        $fileExt = pathinfo($_FILES["cov_img"]["name"], PATHINFO_EXTENSION);
        $output='';
		    $imgname=time().'_cover.'.$fileExt;
            $config['upload_path']='./assets/user/cover/'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
            $this->load->library('upload',$config);
            $this->upload->do_upload('cov_img');
            $data['cover_img']=$imgname;
            $user_id=$this->session->userdata('user_id');
            $data['user_id']=$user_id;
            $val_check=$this->Admin_model->table_column('profile','user_id',$user_id);
            if(count($val_check)>0){
                 $where['user_id']=$user_id;
                $this->Admin_model->edit('profile',$data,$where);
                $result=TRUE;
            }else{
                $result= $this->Admin_model->create('profile',$data);
            }
    }
    public function load_ads()
    {
        $k=1;
        $output = '';
        $ad_count = $this->Admin_model->table_column('ads');
        $random_number = mt_rand(1, count($ad_count));
        $ads = $this->Admin_model->table_column('ads');
        foreach($ads as $ad_row){ 
            if($k == $random_number){ 
            $output .='
        <div class="ad_top">
            <div class="title">'.$ad_row["title"].'</div>
            <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
        </div>
        <div class="ad_img">
            <img src="'.base_url().'assets/admin/img/'.$ad_row['img'].'" alt="">
        </div>';
         } $k++;} 
         echo $output;
    }
    public function load_ads_2()
    {
        $k=1;
        $output = '';
        $ad_count = $this->Admin_model->table_column('ads');
        $random_number = mt_rand(1, count($ad_count));
        $ads = $this->Admin_model->table_column('ads');
        foreach($ads as $ad_row){ 
            if($k == $random_number){ 
            $output .='
        <div class="ad_top">
            <div class="title">'.$ad_row["title"].'</div>
            <div class="close_ad"><i class="fa fa-window-close" aria-hidden="true"></i></div>
        </div>
        <div class="ad_img">
            <img src="'.base_url().'assets/admin/img/'.$ad_row['img'].'" alt="">
        </div>';
         } $k++;} 
         echo $output;
    }
    public function profile_data()
    {
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'profile_title'=>$this->input->post('profile_title'),
            'about'=>$this->input->post('description'),
            'hobbie'=>$this->input->post('hobbie'),
            'interest'=>$this->input->post('interest'),
            // 'social'=>$this->input->post('social'),
        );
        
        $data_loc=array(
            'city'=>$this->input->post('city'),
            'state'=>$this->input->post('state'),
            'country'=>$this->input->post('country'),
            'zip'=>$this->input->post('zip'),
            'phone'=>$this->input->post('contact'),
        );
        $where['user_id'] = $user_id;
        $this->Admin_model->edit('user',$data_loc,$where);
        $val_check=$this->Admin_model->table_column('profile','user_id',$user_id);
        if(count($val_check) > 0){
            $where['user_id']=$user_id;
            $this->Admin_model->edit('profile',$data,$where);
        }else{
            $data['user_id']=$user_id;
            $result= $this->Admin_model->create('profile',$data);
        }
        redirect('View/front/profile_entry_profession');
    }
    public function profile_data_2()
    {
        $user_id=$this->session->userdata('user_id');

        if($this->input->post('social') == 'yes'){
            $data['fb']=$this->input->post('fb');
            $data['insta']=$this->input->post('insta');
            $data['twitter']=$this->input->post('twitter');
            $data['linkedin']=$this->input->post('linkedin');
            $data['watsapp']=$this->input->post('watsapp');
            $data['youtube']=$this->input->post('youtube');
        }
        $data=array(
            'social'=>$this->input->post('social'),
            'type'=>$this->input->post('type'),
            'school'=>$this->input->post('school'),
            'college'=>$this->input->post('college'),
            'qualification'=>$this->input->post('qualification'),
            'passed_out'=>$this->input->post('passed_out'),
            'company'=>$this->input->post('company'),
            'skills'=>$this->input->post('skills'),
            'designation'=>$this->input->post('designation'),
            'expertise'=>$this->input->post('expertise'),
            'description'=>$this->input->post('description'),
        );
            $where['user_id']=$user_id;
            $this->Admin_model->edit('profile',$data,$where);
        redirect('View/front/video');
    }
    public function ecart()
    {
            $data = array();
            $user_id=$this->session->userdata('user_id');
            if($_FILES["profile_img"]["name"]){
            $fileExt = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);
		    $imgname=time().'_ecard.'.$fileExt;
            $config['upload_path']='./assets/user/ecard/profile/'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
            $this->load->library('upload',$config);
            $this->upload->do_upload('profile_img');
            $data['profile_img']=$imgname;
            }
              if($_FILES["logo"]["name"]){
                $fileExt1 = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                $imgname1=time().'_ecard1.'.$fileExt1;
                $config['upload_path']='./assets/user/ecard/profile/'; 
                $config['allowed_types']='png|jpg|jpeg|gif';
                $config['encrypt_name']=FALSE;
                $config['file_name']=$imgname1;
                $this->load->library('upload',$config);
                $this->upload->do_upload('logo');
                $data['logo']=$imgname1;
                }
                
        $data['look']=$this->input->post('look');
        $data['user_id']=$user_id;
        $data['buisness_name']=$this->input->post('buisness_name');
        $data['designation']=$this->input->post('designation');
        $data['mobile']=$this->input->post('mobile');
        $data['email']=$this->input->post('email');
        $data['website']=$this->input->post('website');
        $data['address']=$this->input->post('address');
        $data['color']=$this->input->post('color');
        $data['description']=$this->input->post('description');
        $data['status']='1';
        $data['post_type']='e_card';
        $data['date']=date('d-m-Y');
        $data['person_name']=$this->input->post('person_name');

        $edit_id=$this->input->post('edit_id');
        if($edit_id != ""){
            $where=array(
                'id'=>$edit_id,
            );
            $this->Admin_model->edit('ecard',$data,$where);
            redirect('View/front/e_cart1_edit/'.$edit_id.'');
        }else{
            $insert_id= $this->Admin_model->create('ecard',$data);
        $data1=array();
        $data1['update_id']=$insert_id;
        redirect('View/front/e_cart1/'.$insert_id.'');
        }
    }
    public function ecart_1()
    {
        $id=$this->input->post('id');
        $where['id']=$id;
        $data=array(
            'fb'=>$this->input->post('fb'),
            'insta'=>$this->input->post('insta'),
            'twitter'=>$this->input->post('twitter'),
            'youtube'=>$this->input->post('youtube'),
            'linkedin'=>$this->input->post('linkedin'),
            'watsapp'=>$this->input->post('watsapp'),
        );
        $this->Admin_model->edit('ecard',$data,$where);
        redirect('View/front/e_card_disp/'.$id.'');
    }
    public function promo()
    {
            $fileExt1 = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
            $video=time().'_promo.'.$fileExt1;
            $config['upload_path']='./assets/user/ecard/video/'; 
            $config['allowed_types']='mp4|gif|webm';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$video;
            $this->load->library('upload',$config);
            $this->upload->do_upload('video');
            $user_id=$this->session->userdata('user_id');
            $data=array(
                'buisness_name'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'promo_video'=>$video,
                'user_id'=>$user_id,
                'post_type'=>'promo',
                'date'=>date('d-m-Y'),
            );
            $insert_id=$this->Admin_model->create('ecard',$data);
            redirect('View/front/promo_disp/'.$insert_id.'');
    }
    public function promo_edit($id)
    {
        $where['id']=$id;
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'buisness_name'=>$this->input->post('buisness_name'),
            'description'=>$this->input->post('description'),
            'user_id'=>$user_id,
            'post_type'=>'promo',
            'date'=>date('d-m-Y'),
        );
        if($_FILES["video"]["name"] != ''){
        $fileExt1 = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
        $video=time().'_promo.'.$fileExt1;
        $config['upload_path']='./assets/user/ecard/video/'; 
        $config['allowed_types']='mp4|gif|webm';
        $config['encrypt_name']=FALSE;
        $config['file_name']=$video;
        $this->load->library('upload',$config);
        $this->upload->do_upload('video');
        $data['promo_video']=$video;
        }
        $this->Admin_model->edit('ecard',$data,$where);
        redirect('View/front/promo_disp/'.$id.'');
    }
    public function meme()
    {
        $fileExt1 = pathinfo($_FILES["meme_img"]["name"], PATHINFO_EXTENSION);
            $video=time().'_meme.'.$fileExt1;
            $config['upload_path']='./assets/user/ecard/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$video;
            $this->load->library('upload',$config);
            $this->upload->do_upload('meme_img');
            $user_id=$this->session->userdata('user_id');
            $data=array(
                'meme_top'=>$this->input->post('title_top'),
                'meme_img'=>$video,
                'meme_bottom'=>$this->input->post('title_bottom'),
                'mode'=>$this->input->post('mode'),
                'user_id'=>$user_id,
                'post_type'=>'meme',
                'date'=>date('d-m-Y'),
            );
        $insert_id=$this->Admin_model->create('ecard',$data);
        redirect('View/front/meme_disp/'.$insert_id.'');
    }
    public function meme_edit($id)
    {
            $where['id']=$id;
            $user_id=$this->session->userdata('user_id');
            $data=array(
                'meme_top'=>$this->input->post('title_top'),
                'meme_bottom'=>$this->input->post('title_bottom'),
                'mode'=>$this->input->post('mode'),
                'user_id'=>$user_id,
                'post_type'=>'meme',
                'date'=>date('d-m-Y'),
            );
            if($_FILES["meme_img"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["meme_img"]["name"], PATHINFO_EXTENSION);
            $video=time().'_meme.'.$fileExt1;
            $config['upload_path']='./assets/user/ecard/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$video;
            $this->load->library('upload',$config);
            $this->upload->do_upload('meme_img');
            $data['meme_img'] = $video;
            }
            $this->Admin_model->edit('ecard',$data,$where);
            redirect('View/front/meme_disp/'.$id.'');
    }
    public function job_profile()
    {
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'user_id'=>$user_id,
            'post_type'=>'job_profile',
            'date'=>date('d-m-Y'),
        );
        $insert_id=$this->Admin_model->create('ecard',$data);
        $data_job_data = array(
            'ecart_id'=>$insert_id,
            'header_title'=>$this->input->post('title'),
            'notes'=>$this->input->post('note'),
            'terms'=>$this->input->post('term'),
        );
        if($_FILES["profile_img"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);
            $logo=time().'_e_inv_logo.'.$fileExt1;
            $config['upload_path']='./assets/user/job_profile/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$logo;
            $this->load->library('upload',$config);
            $this->upload->do_upload('profile_img');
            $img_name =$this->upload->data();
            $data_job_data['header_img'] = $img_name['file_name'];
            }
        
        $job_profile_main =$this->Admin_model->create('job_profile',$data_job_data);
        $sub_heading=$this->input->post('sub_head');
        $sub_description = $this->input->post('sub_description');

        for($i=0;$i<count($sub_heading);$i++)
        {
            $data_sub_job_profile = array(
                'sub_heading'=>$sub_heading[$i],
                'sub_description'=>$sub_description[$i],
                'job_profile_id'=>$job_profile_main,
            );
            if($_FILES["sub_img"]["name"][$i] != ''){
                $fileExt1 = pathinfo($_FILES["sub_img"]["name"][$i], PATHINFO_EXTENSION);
                $logo=time().'_job_logo_'.$i.'.'.$fileExt1;
                $config['upload_path']='./assets/user/job_profile/image/'; 
                $config['allowed_types']='jpg|png|jpeg|gif';
                $config['encrypt_name']=FALSE;
                $config['file_name']=$logo;
                $this->load->library('upload',$config);
                $sub_img_on = 'sub_img['.$i.']';
                $this->upload->do_upload($sub_img_on);
                $img_name =$this->upload->data();
                $data_sub_job_profile['sub_image'] = $img_name['file_name'];
                }
            $this->Admin_model->create('job_profile_sub',$data_sub_job_profile);
        }
    redirect('View/front/job_profile_disp/'.$insert_id.'');
    }
    public function job_profile_edit($id,$id_1)
    {
        
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'user_id'=>$user_id,
            'post_type'=>'job_profile',
            'date'=>date('d-m-Y'),
        );
        $insert_id=$this->Admin_model->create('ecard',$data);
        $data_job_data = array(
            'ecart_id'=>$insert_id,
            'header_title'=>$this->input->post('title'),
            'notes'=>$this->input->post('note'),
            'terms'=>$this->input->post('term'),
        );
        if($_FILES["profile_img"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION);
            $logo=time().'_e_inv_logo.'.$fileExt1;
            $config['upload_path']='./assets/user/job_profile/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$logo;
            $this->load->library('upload',$config);
            $this->upload->do_upload('profile_img');
            $img_name =$this->upload->data();
            $data_job_data['header_img'] = $img_name['file_name'];
            }
        
        $job_profile_main =$this->Admin_model->create('job_profile',$data_job_data);
        $sub_heading=$this->input->post('sub_head');
        $sub_description = $this->input->post('sub_description');

        for($i=0;$i<count($sub_heading);$i++)
        {
            $data_sub_job_profile = array(
                'sub_heading'=>$sub_heading[$i],
                'sub_description'=>$sub_description[$i],
                'job_profile_id'=>$job_profile_main,
            );
            if($_FILES["sub_img"]["name"][$i] != ''){
                $fileExt1 = pathinfo($_FILES["sub_img"]["name"][$i], PATHINFO_EXTENSION);
                $logo=time().'_job_logo_'.$i.'.'.$fileExt1;
                $config['upload_path']='./assets/user/job_profile/image/'; 
                $config['allowed_types']='jpg|png|jpeg|gif';
                $config['encrypt_name']=FALSE;
                $config['file_name']=$logo;
                $this->load->library('upload',$config);
                $sub_img_on = 'sub_img['.$i.']';
                $this->upload->do_upload($sub_img_on);
                $img_name =$this->upload->data();
                $data_sub_job_profile['sub_image'] = $img_name['file_name'];
                }
            $this->Admin_model->create('job_profile_sub',$data_sub_job_profile);
        }
        $data_id = $id;
        $data_id_2 = $id_2;
        $this->Admin_model->delete('ecard',$data_id);
        $this->Admin_model->delete('job_profile',$data_id_2); 
    redirect('View/front/job_profile_disp/'.$insert_id.'');
    }
    public function invoice()
    {
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'user_id'=>$user_id,
            'post_type'=>'e_invoice',
            'date'=>$this->input->post('date'),
        );
        $insert_id=$this->Admin_model->create('ecard',$data);
        $data_invoice_data = array(
            'ecard_id'=>$insert_id,
            'file_name'=>$this->input->post('file_name'),
            'inv_from'=>$this->input->post('inv_from'),
            'from_email'=>$this->input->post('from_email'),
            'from_address'=>$this->input->post('from_address'),
            'from_phone'=>$this->input->post('from_phone'),
            'from_bus_phone'=>$this->input->post('from_bus_phone'),
            'inv_to'=>$this->input->post('inv_to'),
            'to_email'=>$this->input->post('to_email'),
            'to_address'=>$this->input->post('to_address'),
            'to_phone'=>$this->input->post('to_phone'),
            'invoice'=>$this->input->post('invoice'),
            'payment_terms'=>$this->input->post('payment_terms'),
            'other_charges'=>$this->input->post('other_charges'),
            'total'=>$this->input->post('total'),
            'amount_paid'=>$this->input->post('amount_paid'),
            'due'=>$this->input->post('due'),
        );
        if($_FILES["logo_pic"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["logo_pic"]["name"], PATHINFO_EXTENSION);
            $logo=time().'_e_inv_logo.'.$fileExt1;
            $config['upload_path']='./assets/user/e_invoice/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$logo;
            $this->load->library('upload',$config);
            $this->upload->do_upload('logo_pic');
            $data_invoice_data['logo_pic'] = $logo;
            }
        $invoice_main =$this->Admin_model->create('e_invoice',$data_invoice_data);
        $item_detail = $this->input->post('item_details');
        $rate = $this->input->post('rate');
        $qty = $this->input->post('qty');
        $amount = $this->input->post('amount');
        for($i=0;$i<count($item_detail);$i++)
        {
            $data_sub_inv = array(
                'item_detail'=>$item_detail[$i],
                'rate'=>$rate[$i],
                'qty'=>$qty[$i],
                'amount'=>$amount[$i],
                'inv_id'=>$invoice_main,
            );
            $this->Admin_model->create('invoice_sub',$data_sub_inv);
        }
        redirect('View/front/e_invoice_disp/'.$insert_id.'');
    }
    public function invoice_edit($id,$id_2)
    {
        
        $user_id=$this->session->userdata('user_id');
        $data=array(
            'user_id'=>$user_id,
            'post_type'=>'e_invoice',
            'date'=>$this->input->post('date'),
        );
        $insert_id=$this->Admin_model->create('ecard',$data);
        $data_invoice_data = array(
            'ecard_id'=>$insert_id,
            'file_name'=>$this->input->post('file_name'),
            'inv_from'=>$this->input->post('inv_from'),
            'from_email'=>$this->input->post('from_email'),
            'from_address'=>$this->input->post('from_address'),
            'from_phone'=>$this->input->post('from_phone'),
            'from_bus_phone'=>$this->input->post('from_bus_phone'),
            'inv_to'=>$this->input->post('inv_to'),
            'to_email'=>$this->input->post('to_email'),
            'to_address'=>$this->input->post('to_address'),
            'to_phone'=>$this->input->post('to_phone'),
            'invoice'=>$this->input->post('invoice'),
            'payment_terms'=>$this->input->post('payment_terms'),
            'other_charges'=>$this->input->post('other_charges'),
            'total'=>$this->input->post('total'),
            'amount_paid'=>$this->input->post('amount_paid'),
            'due'=>$this->input->post('due'),
        );
        if($_FILES["logo_pic"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["logo_pic"]["name"], PATHINFO_EXTENSION);
            $logo=time().'_e_inv_logo.'.$fileExt1;
            $config['upload_path']='./assets/user/e_invoice/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$logo;
            $this->load->library('upload',$config);
            $this->upload->do_upload('logo_pic');
            $data_invoice_data['logo_pic'] = $logo;
            }
        $invoice_main =$this->Admin_model->create('e_invoice',$data_invoice_data);
        $item_detail = $this->input->post('item_details');
        $rate = $this->input->post('rate');
        $qty = $this->input->post('qty');
        $amount = $this->input->post('amount');
        for($i=0;$i<count($item_detail);$i++)
        {
            $data_sub_inv = array(
                'item_detail'=>$item_detail[$i],
                'rate'=>$rate[$i],
                'qty'=>$qty[$i],
                'amount'=>$amount[$i],
                'inv_id'=>$invoice_main,
            );
            $this->Admin_model->create('invoice_sub',$data_sub_inv);
        }
        $data_id = $id;
        $data_id_2 = $id_2;
        $this->Admin_model->delete('ecard',$data_id);
        $this->Admin_model->delete('e_invoice',$data_id_2);
        redirect('View/front/e_invoice_disp/'.$insert_id.'');
    }
    public function create_group()
    {
        $user_id=$this->session->userdata('user_id');
        $group_name=$this->input->post("group_name");
        $group_type=$this->input->post("group_type");
        $data = array(
            'group_name' => $group_name,
            'group_type' => $group_type,
            'group_desc' => $this->input->post('group_desc'),
            'date'=>date('d-m-Y'),
            'admin'=>$user_id,
        );
        if($_FILES["group_img"]["name"] != ''){
            $fileExt1 = pathinfo($_FILES["group_img"]["name"], PATHINFO_EXTENSION);
            $logo=time().'_group_logo.'.$fileExt1;
            $config['upload_path']='./assets/user/group_img/image/'; 
            $config['allowed_types']='jpg|png|jpeg|gif';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$logo;
            $this->load->library('upload',$config);
            $this->upload->do_upload('group_img');
            $data['group_img'] = $logo;
            }
            $this->Admin_model->create('groups',$data);
            redirect('View/front/group_chat');
    }
    public function connect()
    {
        $user_id=$this->input->post('user_id');
        $my_id=$this->input->post('my_id');
        $tablename=$this->input->post('tablename');
        $data =array(
            'user_id'=>$my_id,
            'connection_id'=>$user_id,
            'date'=>date('d-m-Y'),
        );
        $inserted_id = $this->Admin_model->create($tablename,$data);
        if($inserted_id){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function con_connect()
    {
        $con_id=$this->input->post('con_id');
        $where['id']=$con_id;
        $tablename=$this->input->post('tablename');
        $data =array(
            'confirm'=>'1',
        );
        $this->Admin_model->edit($tablename,$data,$where);
            echo '1';
    }
    public function deny_connect()
    {
        $con_id=$this->input->post('con_id');
        $where['id']=$con_id;
        $tablename=$this->input->post('tablename');
        $data =array(
            'deny'=>'0',
        );
        $this->Admin_model->edit($tablename,$data,$where);
            echo '1';
    }
    public function save()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $data = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'saved_id' => $this->input->post('cont_id'),
            'date' => date('d-m-Y')
        );
        $inserted_id = $this->Admin_model->create($tablename,$data);
        if($inserted_id){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function remove()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $where = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'saved_id' => $this->input->post('cont_id'),
        );
        $this->Admin_model->delete_where($tablename,$where);
            echo '1';
    }
    public function like()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $data = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'like_id' => $this->input->post('cont_id'),
            'date' => date('d-m-Y')
        );
        $inserted_id = $this->Admin_model->create($tablename,$data);
        if($inserted_id){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function dislike()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $where = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'like_id' => $this->input->post('cont_id'),
        );
        $this->Admin_model->delete_where($tablename,$where);
            echo '1';
    }
    public function share()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $data = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'shared_id' => $this->input->post('cont_id'),
            'date' => date('d-m-Y')
        );
        $inserted_id = $this->Admin_model->create($tablename,$data);
        if($inserted_id){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function disshare()
    {
        $user_id = $this->session->userdata('user_id');
        $tablename = $this->input->post('tablename');
        $where = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'shared_id' => $this->input->post('cont_id'),
        );
        $this->Admin_model->delete_where($tablename,$where);
            echo '1';
    }
    public function comment()
    {
        $tablename = 'comment';
        $user_id=$this->input->post('user_id');
        $data = array(
            'user_id'=>$user_id,
            'own_id' => $this->input->post('own_id'),
            'comment_on' => $this->input->post('comment_id'),
            'comment' => $this->input->post('comment'),
            'date' => date('d-m-Y')
        );
        $inserted_id = $this->Admin_model->create($tablename,$data);
        if($inserted_id){
            $data1 = array(
                'comment' => $this->input->post('comment'),
            );
            echo json_decode($data1);
        }else{
            echo '0';
        }
    }
    public function chat()
    {
        $user_id = $this->session->userdata('user_id');
        $chat = $this->input->post('chat');
        $data = array(
            'chat_from' => $user_id,
            'chat_to' => $this->input->post('chat_to'),
            'chat_data' => $chat,
            'state' => '0',
            'date' => date("d-m-Y H:i"),
        );
        if($_FILES['file']['name']){
            $fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $file_name=time().'_at.'.$fileExt;
            $config['upload_path']='./assets/user/chat/attach/'; 
            $config['allowed_types']='jpg|png|jpeg|doc|docx|pdf|txt';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$file_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('file');
            if($fileExt == 'jpg' || $fileExt == 'png' || $fileExt == 'jpeg' ){
            $data['chat_img'] = $file_name;
            }else{
            $data['chat_attach_doc'] = $file_name;
            }
        }
        $inserted_id = $this->Admin_model->create('chat',$data);
    }
    public function promote()
    {
        $user_id = $this->session->userdata('user_id');
        $data=array(
            'post_id'=>$this->input->post('post_data'),
            'duration'=>$this->input->post('duration'),
            'state'=>$this->input->post('state'),
            'city'=>$this->input->post('city'),
            'amount'=>$this->input->post('amount'),
            'tax'=>$this->input->post('tax'),
            'payable_amount'=>$this->input->post('payable'),
            'user_id'=>$user_id,
            'status'=>'0',
        );
        $inserted_id = $this->Admin_model->create('promote',$data);
        redirect('View/front/promote');
    }
    public function group_chat()
    {
        $user_id = $this->session->userdata('user_id');
        $chat = $this->input->post('chat');
        $data = array(
            'chat_from' => $user_id,
            'group_to' => $this->input->post('group_to'),
            'chat' => $chat,
            'state' => '0',
            'date' => date("d-m-Y H:i"),
        );
        if($_FILES['file']['name']){
            $fileExt = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            $file_name=time().'_at.'.$fileExt;
            $config['upload_path']='./assets/user/chat/attach/'; 
            $config['allowed_types']='jpg|png|jpeg|doc|docx|pdf|txt';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$file_name;
            $this->load->library('upload',$config);
            $this->upload->do_upload('file');
            if($fileExt == 'jpg' || $fileExt == 'png' || $fileExt == 'jpeg' ){
            $data['chat_img'] = $file_name;
            }else{
            $data['chat_attach_doc'] = $file_name;
            }
        }
        $inserted_id = $this->Admin_model->create('group_chat',$data);
    }
    public function join_group($id)
    {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'group_id'=>$id,
            'user_id'=>$user_id,
            'status'=>'1',
        );
        $inserted_id = $this->Admin_model->create('group_list',$data);
        redirect('View/front/group_pad/'.$id.'');
    }
    public function load_chat()
    {
        $chat_from = $this->input->post('receiver_id');
        $chat_to = $this->input->post('sender_id');
        $tablename = $this->input->post('tablename');
        $output = '';
        $chat_list = $this->Admin_model->table_column_or_chat($tablename,'chat_from',$chat_from,'chat_to',$chat_from);
        if(count($chat_list) > 0){
            foreach($chat_list as $row){
                if($row['chat_from'] == $chat_to || $row['chat_to'] == $chat_to){
                if($row['chat_to'] == $chat_from ){
                    $output .= '<div class="time_right">'.$row['date'].'</div>
                    <div class="chatt_chi1">
                    <div class="post_profile_img11">';
                    $pro_data=$this->Admin_model->table_column('profile','user_id',$chat_to);
                    foreach($pro_data as $row1){ 
                    if($row1['img'] != ''){
                    $output .=' <img src="'.base_url().'assets/user/profile/'.$row1['img'].'" class="p_img" alt="img" >';
                    }else{ 
                    $output .='<img src="'.base_url().'assets/user/profile/default.png" alt="img" class="p_img" >';
                    } 
                    }
                    $output .='</div>
                    <div class="textt" style="background-color:#eeeeee;">';
                    if($row['chat_data'] != ''){
                    $output .='<h6 class="hi"> '.$row['chat_data'].'</h6>';
                    }else if($row['chat_img'] != ''){
                    $output .='<img class="hi" src="'.base_url().'assets/user/chat/attach/'.$row['chat_img'].'" width="100%" height="200px"/>';
                    }else{
                    $output .='<a href="'.base_url().'assets/user/chat/attach/'.$row['chat_attach_doc'].'" download class="hi"  style="color:black"><i class="fa fa-arrow-circle-down icon_2" aria-hidden="true"></i>Document<i class="fa fa-file-o icon_2" aria-hidden="true"></i></a>';
                    }
                    $output.='</div>
                </div>';
                }else{
                    $output .='<div class="time_left">'.$row['date'].'</div>
                    <div class="chatt_chi2" >
                <div class="textt" style="margin-left:40px;background-color:#5499C7 ;margin-top:7px;">';
                if($row['chat_data'] != ''){
                    $output .='<h6 class="hi"> '.$row['chat_data'].'</h6>';
                    }else if($row['chat_img'] != ''){
                    $output .='<img class="hi" src="'.base_url().'assets/user/chat/attach/'.$row['chat_img'].'" width="100%" height="200px"/>';
                    }else{
                    $output .='<a href="'.base_url().'assets/user/chat/attach/'.$row['chat_attach_doc'].'" download class="hi" style="color:black"><i class="fa fa-file-o icon_2" aria-hidden="true"></i>Document<i class="fa fa-arrow-circle-down icon_2" aria-hidden="true"></i></a>';
                    }
                    $output.='
                </div>
                <div class="post_profile_img112">';
                    $profile=$this->Admin_model->table_column('profile','user_id',$chat_from);
                    foreach($profile as $row1){ 
                    if($row1['img'] != ""){ 
                        $output .='<img src="'.base_url().'assets/user/profile/'.$row1['img'].'" alt="img" class="p_img" style="margin-left:8px;margin-top:19px;">';
                        }else{ 
                        $output .='<img src="'.base_url().'assets/user/profile/default.png" alt="img"  class="p_img" style="margin-left:8px;margin-top:19px;">';
                        }  }
                        $output .='</div>
                                </div>';
                }
            }}
        }
        echo $output;
        
    }
    public function load_group_chat()
    {
        $chat_from = $this->input->post('receiver_id');
        $chat_to = $this->input->post('group_id');
        $tablename = $this->input->post('tablename');
        $output = '';
        $chat_list = $this->Admin_model->table_column_or_chat($tablename,'group_to',$chat_to);
        if(count($chat_list) > 0){
            foreach($chat_list as $row){
                if($row['chat_from'] != $chat_from ){
                    $output .= '<div class="time_right">'.$row['date'].'</div>
                    <div class="chatt_chi1">
                    <div class="post_profile_img11">';
                    $pro_data=$this->Admin_model->table_column('profile','user_id',$row['chat_from']);
                    foreach($pro_data as $row1){ 
                    if($row1['img'] != ''){
                    $output .=' <img src="'.base_url().'assets/user/profile/'.$row1['img'].'" class="p_img" alt="img" >';
                    }else{ 
                    $output .='<img src="'.base_url().'assets/user/profile/default.png" alt="img" class="p_img" >';
                    } 
                    }
                    $output .='</div>
                    <div class="textt" style="background-color:#eeeeee;">';
                    if($row['chat'] != ''){
                    $output .='<h6 class="hi"> '.$row['chat'].'</h6>';
                    }else if($row['chat_img'] != ''){
                    $output .='<img class="hi" src="'.base_url().'assets/user/chat/attach/'.$row['chat_img'].'" width="100%" height="200px"/>';
                    }else{
                    $output .='<a href="'.base_url().'assets/user/chat/attach/'.$row['chat_attach_doc'].'" download class="hi"  style="color:black"><i class="fa fa-arrow-circle-down icon_2" aria-hidden="true"></i>Document<i class="fa fa-file-o icon_2" aria-hidden="true"></i></a>';
                    }
                    $output.='</div>
                </div>';
                }else{
                    $output .='<div class="time_left">'.$row['date'].'</div>
                    <div class="chatt_chi2" >
                <div class="textt" style="margin-left:40px;background-color:#5499C7 ;margin-top:7px;">';
                if($row['chat'] != ''){
                    $output .='<h6 class="hi"> '.$row['chat'].'</h6>';
                    }else if($row['chat_img'] != ''){
                    $output .='<img class="hi" src="'.base_url().'assets/user/chat/attach/'.$row['chat_img'].'" width="100%" height="200px"/>';
                    }else{
                    $output .='<a href="'.base_url().'assets/user/chat/attach/'.$row['chat_attach_doc'].'" download class="hi" style="color:black"><i class="fa fa-file-o icon_2" aria-hidden="true"></i>Document<i class="fa fa-arrow-circle-down icon_2" aria-hidden="true"></i></a>';
                    }
                    $output.='
                </div>
                <div class="post_profile_img112">';
                    $profile=$this->Admin_model->table_column('profile','user_id',$chat_from);
                    foreach($profile as $row1){ 
                    if($row1['img'] != ""){ 
                        $output .='<img src="'.base_url().'assets/user/profile/'.$row1['img'].'" alt="img" class="p_img" style="margin-left:8px;margin-top:19px;">';
                        }else{ 
                        $output .='<img src="'.base_url().'assets/user/profile/default.png" alt="img"  class="p_img" style="margin-left:8px;margin-top:19px;">';
                        }  }
                        $output .='</div>
                                </div>';
                }
            }
        }
        echo $output;
    }
    public function search()
    {
        $search = $this->input->post('search');
        $net_like = $this->Admin_model->table_like('profile','user_name',$search);
        $data['list'] = $net_like;
        $this->load->view('front/search_list',$data);
    }
    public function delete_data($id,$page)
    {
        $this->Admin_model->delete('ecard',$id);
        redirect('View/front/'.$page.'');
    }

    public function logout_front()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
?>