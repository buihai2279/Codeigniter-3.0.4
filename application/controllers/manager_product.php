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
	public function test()
	{
		$this->load->library('simple_html_dom');
		// 1. Write a function with parameter "$element"
		function my_callback($element) {
		    if ($element->tag=='input')
		        $element->outertext = 'input';
		    if ($element->tag=='img')
		        $element->outertext = 'img';
		    if ($element->tag=='a')
		        $element->outertext = 'a';
		}
		// 2. create HTML Dom
		$html = file_get_html('http://www.google.com/');
		// 3. Register the callback function with it's function name
		$html->set_callback('my_callback');
		// 4. Callback function will be invoked while dumping
		echo $html;
	}

}

/* End of file manager_product.php */
/* Location: ./application/controllers/manager_product.php */