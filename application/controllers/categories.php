<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $limit = 3;
	public $table = 'category';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
		//Do your magic here
	}
	public function index()
	{
		$data['result']=$this->My_model->get_all($this->table);
		$this->load->view('categories/header');	
		$this->load->view('categories/list',$data);	
		$this->load->view('categories/footer');	
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */