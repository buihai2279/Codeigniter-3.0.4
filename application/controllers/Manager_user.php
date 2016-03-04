<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class manager_user extends CI_Controller {
	public $limit = 6;
	public $table = 'user';
	public function __construct() {
		parent::__construct();
		$this->load->model('My_model');
		if ($this->session->has_userdata('login') == FAlSE) {
			$message = 'Bạn CHƯA đăng nhập';
			$this->Sent_message($message,'Auth/login','danger');
		}
		if ($this->session->has_userdata('level') == TRUE&&$this->session->userdata('level') == 0){
			$message = 'Bạn KHÔNG có quyền truy cập';
			$this->Sent_message($message,'Home','warning');
		}
	}
	protected function Load_view($view, $data = NULL) {
		$this->load->view('back-end/header');
		$this->load->view('back-end/breadcrumb');	
		$this->load->view($view, $data);
		$this->load->view('back-end/footer');
	}
	public function View_all() {
		$segment = (int) $this->uri->segment(3);
		$total   = $this->My_model->Count_table($this->table);
		if ($segment >= $total)
			$segment = $total - $limit;
		if ($segment < 0)
			$segment = 0;
		$link           = 'http://localhost/Codeigniter-Project/manager_user/view_all';
		$data['result'] = $this->My_model->get_limit($this->table, $this->limit, $segment);
		$data['pag']    = $this->My_model->create_pagination($link, $total, $segment);
		$this->Load_view('manager_user/View_all', $data);
	}
	public function Block_user($id = '') {
		$arrayName = array('status' => 2);
		$result    = $this->My_model->update($id, $arrayName, $this->table);
		if ($result == TRUE) {
			$message = 'Thao tác thành công';
			$this->Sent_message($message,'manager_user/view_all','success');
		} else {
			$message = 'Thao tác Lỗi';
			$this->Sent_message($message,'manager_user/view_all','danger');
		}
	}
	public function Un_block_user($id = '') {
		if ($this->session->userdata('level') >= 1) {
			$arrayName = array('status' => 1);
			$result    = $this->My_model->update($id, $arrayName, $this->table);
			if ($result == TRUE) {
				$message = 'Thao tác thành công';
				$this->Sent_message($message,'manager_user/view_all','success');
			} else {
				$message = 'Thao tác Lỗi';
				$this->Sent_message($message,'manager_user/view_all','danger');
			}
		}
	}
	public function Set_manager($id) {
		if ($this->My_model->check_admin()) {
			$arrayName = array('level' => 1);
			$result    = $this->My_model->update($id, $arrayName, $this->table);
			if ($result == TRUE) {
				$message = 'Thao tác thành công';
				$this->Sent_message($message,'manager_user/view_all','success');
			} else {
				$message = 'Thao tác Lỗi';
				$this->Sent_message($message,'manager_user/view_all','danger');
			}
		}
	}
	public function Un_set_manager($id) {
		if ($this->My_model->check_admin()) {
			$arrayName = array('level' => 0);
			$result    = $this->My_model->update($id, $arrayName, $this->table);
			if ($result == TRUE) {
				$message = 'Thao tác thành công';
				$this->Sent_message($message,'manager_user/view_all','success');
			} else {
				$message = 'Thao tác Lỗi';
				$this->Sent_message($message,'manager_user/view_all','danger');
			}
		}
	}
	public function Delete_user($id) {
		if ($this->My_model->check_admin()) {
			$result = $this->My_model->delete($id, $this->table);
			if ($result == TRUE) {
				$message = 'Thao tác thành công';
				$this->Sent_message($message,'manager_user/view_all','success');
			} else {
				$message = 'Thao tác Lỗi';
				$this->Sent_message($message,'manager_user/view_all','danger');
			}
		}
	}
	public function Proccess() {
		if (!isset($_POST['submit']) || !isset($_POST['check'])) {
			$message = 'Có lỗi xảy ra';
			$this->Sent_message($message,'manager_user/view_all','danger');
		} else {
			$arrayName = $this->input->post('check');
			if ($this->input->post('edit') == 'delete') {
				foreach ($arrayName as $key => $value) {
					$result = $this->My_model->delete($value, $this->table);
				}
				if ($result == TRUE) {
					$message = 'Thao tác thành công';
					$this->Sent_message($message,'manager_user/view_all','success');
				} else {
					$message = 'Thao tác Lỗi';
					$this->Sent_message($message,'manager_user/view_all','danger');
				}
			} else if ($this->input->post('edit') == 'block') {
				foreach ($arrayName as $key => $value) {
					$result = $this->My_model->block($value, $this->table);
				}
				if ($result == TRUE) {
					$message = 'Thao tác thành công';
					$this->Sent_message($message,'manager_user/view_all','success');
				} else {
					$message = 'Thao tác Lỗi';
					$this->Sent_message($message,'manager_user/view_all','danger');
				}
			} else if ($this->input->post('edit') == 'un_block') {
				foreach ($arrayName as $key => $value) {
					$result = $this->My_model->un_block($value, $this->table);
				}
				if ($result == TRUE) {
					$message = 'Thao tác thành công';
					$this->Sent_message($message,'manager_user/view_all','success');
				} else {
					$message = 'Thao tác Lỗi';
					$this->Sent_message($message,'manager_user/view_all','danger');
				}
			}
		}
	}
	public function index() {
		redirect('manager_user/fillter','refresh');
		$segment = (int) $this->uri->segment(3);
		$total   = $this->My_model->Count_table($this->table);
		if ($segment >= $total) {
			$segment = $total - $limit;
		}
		if ($segment < 0) {
			$segment = 0;
		}
		$link           = 'http://localhost/Codeigniter-Project/manager_user/index';
		$tmp            = $this->db->query('SELECT * FROM user ORDER BY mail DESC LIMIT 5');
		$data['result'] = $tmp->result();
		$data['pag']    = $this->My_model->create_pagination($link, $total, $segment);
		$this->Load_view('manager_user/View_all', $data);
	}
	public function fillter($name='id',$sort='ASC') {
		if (isset($_POST['name'])&&isset($_POST['sort_by'])) {
			redirect(base_url().'manager_user/fillter/'.$_POST['name'].'/'.$_POST['sort_by']);
		}
		if ($sort!='DESC')
			$sort='ASC';
		$query=$this->db->query("SHOW columns FROM $this->table");
		$result=$query->result_array();
		foreach ($result as $key => $value) {
			$tmp[]=$value['Field'];
		}
		if (!in_array($name, $tmp)) {
			$name='id';
		}
		$link  	= "http://localhost/Codeigniter-Project/manager_user/fillter/$name/$sort";
		$offset = (int) $this->uri->segment(5);
		$total   = $this->My_model->Count_table($this->table);
		if ($offset >= $total)
			$offset = $total - $this->limit;
		if ($offset < 0)
			$offset = 0;
		$tmp= $this->db->query("SELECT * FROM user ORDER BY $name $sort LIMIT $offset , $this->limit");
		$data['result'] = $tmp->result();
		$data['pag']    = $this->My_model->create_pagination($link, $total, $offset,5);
		$this->Load_view('manager_user/View_all', $data);
	}
	protected function Sent_message($message='Thao tác thành công',$link='home',$color='success') {
		$message = '<div class="alert alert-'.$color.'">'.$message.'</div>';
		$this->session->set_flashdata('message_tmp', $message);
		redirect($link, 'refresh');
		die();
	}
	public function test()
	{
		
	}
}
/* End of file manager_user.php */
/* Location: ./application/controllers/manager_user.php */
