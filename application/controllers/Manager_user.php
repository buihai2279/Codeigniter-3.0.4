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
		$limit=5;
		$table='user';
		$segment=$this->uri->segment(3);
		if($segment>$this->My_model->Cout_table($table)-1||$segment<0)
			$segment=$this->My_model->Cout_table($table)-1;
		$link='http://localhost/Codeigniter-Project/manager_user/view_all';
		$data['result'] = $this->My_model->get_limit($table,$limit,$segment);
		$data['pag']=$this->create_pagination($link,$table,$limit,$segment);
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
	public function Create_pagination($link,$table,$limit=15,$offset=1)
	{

		$this->load->library('pagination');
		$config['base_url'] = $link;
		$config['total_rows'] = $this->My_model->Cout_table($table);
		$config['per_page'] = $limit;
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
