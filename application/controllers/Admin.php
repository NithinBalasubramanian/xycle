

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('email');
        $this->load->library('email');
    }
	public function index()
	{
		$this->load->view('admin/index');
    }
    public function View($foldername,$file)
    {
        $this->load->view($foldername.'/'.$file);
	}
	public function View_admin($foldername,$filename,$edit_id=FALSE)
	{
		if($this->session->userdata('user_id')){
		if($edit_id != FALSE)
		{
			$data['edit_id']=$edit_id;
			$this->load->view('admin/'.$foldername.'/'.$filename.'',$data);
		}
		else{
			$this->load->view('admin/'.$foldername.'/'.$filename);
		}
		}else{
			redirect('View/front/signin');
		}
	}

	public function Insert($tablename, $folder, $current_page, $page)
	{
		if($_FILES["img"]["name"]){
		$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$imgname=time().'_a.'.$fileExt;
		
            $config['upload_path']='./assets/admin/img'; 
            $config['allowed_types']='png|jpg|jpeg';
            $config['encrypt_name']=FALSE;
            $config['file_name']=$imgname;
			$this->load->library('upload',$config);
			$this->upload->do_upload('img');
		}
				
		$columns = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if($columns[$i]!="id")
						{
						   if($columns[$i]=="date_created") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}else if($columns[$i]=="date") {
								$date = date('d-m-Y');
								$data[$columns[$i]] = $date;
							}
							else if($columns[$i]=="status") {
								$data[$columns[$i]] = '1';
							}
							else if($columns[$i] == "img"){
								$img = $imgname;
								$data[$columns[$i]] = $img;
							}
                            else if($columns[$i] == "user_id")
                            {
                                $user_id = $this->session->userdata('user_id');
                                $data[$columns[$i]] = $user_id;
                            }
							else {
							$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
					// if($this->input->post('password')){
					//     $data['password']=sha1($this->input->post('password'));
					// }
					$insert = $this->Admin_model->create($tablename,$data);
					if(isset($insert)){
						redirect('View_admin/'.$folder.'/'.$page.'');
					} else {
						redirect('View_admin/'.$folder.'/'.$current_page.'');
					}
	}
	public function status()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$status=$row['status'];
			if($status == 1)
			{
				$data['status'] = 0;
				$where['id'] = $id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
			if($status == 0 || $status == '')
			{
				$data['status'] = 1;
				$where['id']=$id;
				$this->Admin_model->edit($tablename,$data,$where);
			}
		}
	}
	
	public function Delete($tablename,$foldername,$filename,$delete_id)
	{
		$where['id']=$delete_id;
		$insert=$this->Admin_model->delete($tablename,$delete_id);
		if(isset($insert))
		{
			redirect('View_admin/'.$foldername.'/'.$filename);
		}
		else{
			redirect('View_admin/'.$foldername.'/'.$filename);
		}
	}
	public function Update_all($tablename, $folder, $edit_id, $current_page, $page)
        {
			if($_FILES["img"]["name"]){
				$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
				$imgname=time().'_a.'.$fileExt;
				$config['upload_path']='./assets/admin/img'; 
				$config['allowed_types']='png|jpg|jpeg';
				$config['encrypt_name']=FALSE;
				$config['file_name']=$imgname;
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('img')) {
				$error = array('error' => $this->upload->display_errors());
				} 
				else {
					$data = array('img' => $this->upload->data());
				}
			}

			$where = array();
					$columns = $fields['columns'] = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if(($columns[$i]!="id")&&($columns[$i]!="status")&&($columns[$i]!="date_created")&&($columns[$i]!="user_id"))
						{
							if($columns[$i]=="date_modified") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}else if($columns[$i]=="date") {
								$date = date('d-m-Y');
								$data[$columns[$i]] = $date;
							}else if($columns[$i] == "img"){
								if($_FILES["img"]["name"]){
								$img = $imgname;
								$data[$columns[$i]] = $img;
								}
							}
							 else{
								$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
				
				
						$where['id'] = $edit_id;
						$update_all = $this->Admin_model->edit($tablename,$data,$where);
					
					
					if(isset($update_all)){
						redirect('View_admin/'.$folder.'/'.$page.'');
					} else {
						redirect('View_admin/'.$folder.'/'.$current_page.'');
					}
		}
	public function insert_notify($tablename,$foldername,$prev_file,$next_file)
	{
		$notify_to = $this->input->post('plan');
		$data = array(
			'note_from' => 'admin',
			'note_to' => $notify_to,
			'note' => $this->input->post('notification'),
			'status' => '1',
			'date' => date('d-m-Y'),
		);
		$insert = $this->Admin_model->create($tablename,$data);
		if($insert){
			redirect('View_admin/'.$foldername.'/'.$next_file.'');
		}else{
			redirect('View_admin/'.$foldername.'/'.$prev_file.'');
		}
	}
	public function verify()
		{
            
			$where = array();
			$data = array();
			$val=$this->input->post('val');
			$tablename=$this->input->post('tablename');
			$where['id']=$this->input->post('id');
			if($val == '1'){
				$data['status']='0';
			}else{
				$data['status']='1';
			}
			$update_all = $this->Admin_model->edit($tablename,$data,$where);
			echo json_encode($data);
		}
	public function make_admin($user_id)
	{
		$where['user_id'] = $user_id;
		$data['user_type'] = 'admin';
		$tablename = 'user';
		$update_all = $this->Admin_model->edit($tablename,$data,$where);
		redirect('View_admin/user/list_user');
	}
	public function remove_admin($user_id)
	{
		$where['user_id'] = $user_id;
		$data['user_type'] = 'user';
		$tablename = 'user';
		$update_all = $this->Admin_model->edit($tablename,$data,$where);
		redirect('View_admin/user/list_admin_user');
	}
    public function Edit_access($tablename,$folder,$filename)
    {
        $where['id']='1';
        $data=array(
            'plan'=>$this->input->post('plan'),
            'count'=>$this->input->post('count'),
            'fields'=>$this->input->post('fields'),
        );
        $this->Admin_model->edit($tablename,$data,$where);
        redirect('View_admin/'.$folder.'/'.$filename.'');
    }
	public function logout_front()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
