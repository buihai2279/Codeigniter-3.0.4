<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_product extends CI_Controller {

	public function index()
	{
		$this->load->view('back-end/header');
		$this->load->view('back-end/breadcrumb');
		$this->load->view('manager_product/list');
		$this->load->view('back-end/footer');
	}
	public function test()
	{
	// 	$this->load->library('simple_html_dom');
	// 	// Create DOM from URL or file
	// 	$html = file_get_html('https://hoanghamobile.com/iphone-6s-plus-c2114.html');

	// // Find all images 
	// foreach($html->find('div') as $element) 
	// 	$tmp=$element->find('img');
 //       	echo "<pre>";
 //       	print_r($tmp);
 //       	echo "</pre>";
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		if ( ! $foo = $this->cache->get('foo'))
		{
			echo 'Saving to the cache!<br />';
			$foo = 'foobarbdddaz!';
			 $this->cache->save('foo', $foo, 300);
		}
			echo $foo;
		}
}

/* End of file manager_product.php */
/* Location: ./application/controllers/manager_product.php */