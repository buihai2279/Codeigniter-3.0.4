<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{

		$this->load->view('categories/header');	
		$this->load->view('categories/add');	
		$this->load->view('categories/footer');	
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */