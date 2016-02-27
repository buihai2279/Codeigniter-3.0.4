<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_user extends CI_Controller {
	public $limit=5;
	public $table='user';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
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
		$data['pag']=$this->My_model->create_pagination($link,$total,$segment);
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
		if ($this->My_model->check_admin()) {
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
		if ($this->My_model->check_admin()) {
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
		if ($this->My_model->check_admin()) {
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
		print_r($_GET);
		$segment=(int)$this->uri->segment(3);
		$total=$this->My_model->Count_table($this->table);
		if($segment>=$total)
			$segment=$total-$limit;
		if ($segment<0) {
			$segment=0;
		}
		$link='http://localhost/Codeigniter-Project/manager_user/index';
		$tmp=$this->db->query('SELECT * FROM user ORDER BY mail DESC LIMIT 5');
		$data['result'] = $tmp->result();
		$data['pag']=$this->My_model->create_pagination($link,$total,$segment);
		$this->Load_view('manager_user/View_all',$data);
	}
}
/* End of file manager_user.php */
/* Location: ./application/controllers/manager_user.php */
