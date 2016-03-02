<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_product extends CI_Controller {

	public function index()
	{
		$this->load->view('manager_user/header');
		$this->load->view('categories/breadcrumb');
		$this->load->view('manager_product/list');
		$this->load->view('manager_user/footer');
	}

}

/* End of file manager_product.php */
/* Location: ./application/controllers/manager_product.php */