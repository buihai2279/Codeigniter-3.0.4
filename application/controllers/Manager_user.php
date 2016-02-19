<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->has_userdata('login')==FAlSE) {
			$this->session->set_flashdata('message_tmp', 'Bạn CHƯA đăng nhập');
			redirect('Auth/login','refresh');
			die();
		}
		if ($this->session->has_userdata('level')==TRUE&&$this->session->userdata('level')==0) {
			$this->session->set_flashdata('message_tmp', 'Bạn KHÔNG	có quyền truy cập');
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
		$this->load->model('My_model');
		$data['result']=$this->My_model->get_all('user');
		$this->Load_view('manager_user/View_all',$data);
	}
	public function Edit_user()
	{
		$this->Load_view('manager_user/edit_user');
	}
	public function Block_user()
	{
		$this->Load_view('manager_user/Block_user');
	}
	public function Set_manager()
	{
		$this->Load_view('manager_user/Set_manager');
	}
	public function View_only()
	{
		$this->Load_view('manager_user/View_only');
	}
	public function index()
	{
		$this->Load_view('manager_user/index');
	}

}

/* End of file manager_user.php */
/* Location: ./application/controllers/manager_user.php */
