<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if ($this->session->userdata('level')==0) {
			$message='<div class="alert alert-danger">Bạn KHÔNG	có quyền truy cập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();
		}
	}
	public function Load_view($view,$data=NULL)
	{
        $this->load->view('auth_view/header');
        $this->load->view($view,$data);
        $this->load->view('auth_view/footer');
	}
	public function index()
	{
		$this->Load_view('auth_view/index');
	}

}

/* End of file back-end.php */
/* Location: ./application/controllers/back-end.php */