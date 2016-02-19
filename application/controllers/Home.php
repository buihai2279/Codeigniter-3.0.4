<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function Load_view($view,$data=NULL)
	{
        $this->load->view('front-end/header');
        $this->load->view($view,$data);
        $this->load->view('front-end/footer');
	}
	public function index()
	{
		$this->Load_view('front-end/index');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */