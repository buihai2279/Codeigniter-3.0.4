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
		$data['result']=$this->My_model->get_row_by_id($id);
		if ($data['result']!=false) {
			$this->My_model->Load_front_end('info',$data);
		}else $this->My_model->Sent_message('Bạn đang truy cập vào đường link không tồn tại','user/index','danger');
		
	}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */