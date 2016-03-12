<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public $table='product';
	public function index($id='')
	{
		$this->My_model->Load_front_end('home');
	}
	public function view($id='')
	{
		$result=$this->My_model->get_row_by_id($id);
		if ($result!=false) {
			print_r($result);
		}else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','user/index','danger');
	}
	public function info($id='')
	{
		$this->load->library('cart');
		$data['result']=$this->My_model->get_row_by_id($id);
		if ($data['result']!=false) {
			$this->My_model->Load_front_end('info',$data);
		}else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','user/index','danger');
	}
	public function Add_to_cart()
	{
		$this->load->library('cart');
		$data = array(
			        'id'      => $_POST['id'],
			        'qty'     => $_POST['qty'],
			        'price'   => $_POST['price'],
			        'name'    => $_POST['name']
				);
		$this->cart->insert($data);
		echo "<pre>";
		print_r($this->cart->contents());
		echo "</pre>";
	}
	public function slug($slug)
	{
		$this->load->library('cart');
		$data['result']=$this->My_model->get_row_by_slug($slug);
		if ($data['result']!=false) {
			$this->My_model->Load_front_end('info',$data);
		}else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','user/index','danger');
	}
	public function display_cart()
	{
		$this->load->library('cart');
		print_r($this->cart->contents());
	}
	public function add_cart()
	{
		
	}
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */