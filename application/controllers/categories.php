<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $table = 'category';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('My_model');
	}
	public function index()
	{
		$data['result']=$this->My_model->get_all($this->table);
		$this->load->view('back-end/header');	
		$this->load->view('back-end/breadcrumb');	
		$this->load->view('categories/list',$data);	
		$this->load->view('back-end/footer');	
	}
	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if (isset($_POST)) {
		  	$this->form_validation->set_rules('txt-name', 'name', 'required');
		    $this->form_validation->set_rules('txt-tittle', 'tittle', 'required');
	      	$this->form_validation->set_rules('txt-description', 'description', 'required');
	      	if ($this->form_validation->run() == TRUE)
            {
            	$data = array('name' => $this->input->post('txt-name'), 
            					'tittle' => $this->input->post('txt-tittle'),
            					'description' => $this->input->post('txt-description'),
            					'parrent_id' => $this->input->post('parrent_id'),
								);
                $result=$this->db->insert('category', $data);
                if (isset($result)&&$result!='') {
                	$message = '<div class="alert alert-success">Them Du lieu thanh cong</div>';
					$this->session->set_flashdata('message_tmp', $message);
                	redirect('categories','refresh');
                }
            }
		}
		$data['data1']=$this->My_model->Get_col('id,name','category');
		$this->load->view('back-end/header');	
		$this->load->view('categories/add',$data);	
		$this->load->view('back-end/footer');	
	}

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */