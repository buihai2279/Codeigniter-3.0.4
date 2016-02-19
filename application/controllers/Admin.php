<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
	public function Load_view($view,$data=NULL)
	{
        $this->load->view('back-end/header');
        $this->load->view($view,$data);
        $this->load->view('back-end/footer');
	}
	public function index()
	{
		$this->Load_view('back-end/index');
	}

}

/* End of file back-end.php */
/* Location: ./application/controllers/back-end.php */