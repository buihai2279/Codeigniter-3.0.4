<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('level')==0) {
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
	public function Edit_user()
	{
		$this->Load_view('manager_user/edit_user');
	}
	public function index()
	{
		$this->Load_view('manager_user/index');
	}

}

/* End of file manager_user.php */
/* Location: ./application/controllers/manager_user.php */
