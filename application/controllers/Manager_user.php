<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_user extends CI_Controller {
	public $limit=10;
	public $table='user';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->has_userdata('login')==FAlSE) {
			$message='<div class="alert alert-danger">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Auth/login','refresh');
			die();
		}
		if ($this->session->has_userdata('level')==TRUE&&$this->session->userdata('level')==0) {
			$message='<div class="alert alert-danger">Bạn KHÔNG	có quyền truy cập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();
		}
	}
	protected function Load_view($view,$data=NULL)
	{
        $this->load->view('manager_user/header');
        $this->load->view($view,$data);
        $this->load->view('manager_user/footer');
	}
	public function View_all()
	{
		$segment=(int)$this->uri->segment(3);
		$total=$this->My_model->Count_table($this->table);
		if($segment>=$total)
			$segment=$total-$limit;
		if ($segment<0) {
			$segment=0;
		}
		$link='http://localhost/Codeigniter-Project/manager_user/view_all';
		$data['result'] = $this->My_model->get_limit($this->table,$this->limit,$segment);
		$data['pag']=$this->create_pagination($link,$total,$segment);
		$this->Load_view('manager_user/View_all',$data);
	}
	public function Block_user($id='')
	{
		$arrayName = array('status' => 2);
		$result=$this->My_model->update($id,$arrayName,$this->table);
		if ($result==TRUE) {
			$message='<div class="alert alert-danger">Thao tác thành công</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Manager_user/view_all','refresh');
			die();
		}else{
			$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Manager_user/view_all','refresh');
			die();
		}
	}
	public function Un_block_user($id='')
	{
		if ($this->session->userdata('level')>=1) {
			$arrayName = array('status' => 1);
			$result=$this->My_model->update($id,$arrayName,$this->table);
			if ($result==TRUE) {
				$message='<div class="alert alert-danger">Thao tác thành công</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}else{
				$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}
		}
	}
	public function Set_manager($id)
	{
		if ($this->session->userdata('level')==2) {
			$arrayName = array('level' => 1);
			$result=$this->My_model->update($id,$arrayName,$this->table);
			if ($result==TRUE) {
				$message='<div class="alert alert-danger">Thao tác thành công</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}else{
			$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}
		}
	}
	public function Un_set_manager($id)
	{
		if ($this->session->userdata('level')==2) {
			$arrayName = array('level' => 0);
			$result=$this->My_model->update($id,$arrayName,$this->table);
			if ($result==TRUE) {
			$message='<div class="alert alert-danger">Thao tác thành công</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}else{
			$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}
		}
	}
	public function Delete_user($id)
	{
		if ($this->session->userdata('level')==2) {
			$result=$this->My_model->delete($id,$this->table);
			if ($result==TRUE) {
			$message='<div class="alert alert-danger">Thao tác thành công</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}else{
			$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('Manager_user/view_all','refresh');
				die();
			}
		}
	}
	public function Proccess()
	{
		if (!isset($_POST['submit'])||!isset($_POST['check'])) {
			$message='<div class="alert alert-danger">Có lỗi xảy ra</div>';
			$this->session->set_flashdata('message_tmp', $message);
			redirect('Manager_user/view_all','refresh');
		}else {
			$arrayName=$this->input->post('check');
			if ($this->input->post('edit')=='delete') {
				foreach ($arrayName as $key => $value) {
					$result=$this->My_model->delete($value,$this->table);
				}
				if ($result==TRUE) {
					$message='<div class="alert alert-danger">Thao tác thành công</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}else{
					$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}
			}else if($this->input->post('edit')=='block'){
				foreach ($arrayName as $key => $value) {
					$result=$this->My_model->block($value,$this->table);
				}
				if ($result==TRUE) {
					$message='<div class="alert alert-danger">Thao tác thành công</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}else{
					$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}
			}else if($this->input->post('edit')=='un_block'){
				foreach ($arrayName as $key => $value) {
					$result=$this->My_model->un_block($value,$this->table);
				}
				if ($result==TRUE) {
					$message='<div class="alert alert-danger">Thao tác thành công</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}else{
					$message='<div class="alert alert-danger">Thao tác Lỗi</div>';
					$this->session->set_flashdata('message_tmp', $message);
					redirect('Manager_user/view_all','refresh');
					die();
				}
			}
		}
	}
	public function index()
	{
		$this->Load_view('manager_user/index');
	}
	protected function Create_pagination($link,$total,$offset=1)
	{
		$this->load->library('pagination');
		$config['base_url'] = $link;
		$config['total_rows'] = $total;
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<nav><ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fa fa-caret-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-caret-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
/* End of file manager_user.php */
/* Location: ./application/controllers/manager_user.php */
