<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

    public $table = 'slide';
	public function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
        $query=$this->db->order_by('top')->get($this->table);
        $data['result'] =$query->result_array(); 
        $this->My_model->Load_view('slide/list',$data);
    }
    public function edit($id='')
    {
        $this->load->helper('form');
        $result=$this->db->get_where('slide',array('id'=>$id));
        $data['result'] = $result->row_array();
        if (isset($_POST['submit'])&&$_POST['submit']=='ok') {
            $data=array(
                    'caption'=>$_POST['caption'],
                    'link'=>$_POST['link'],
                    'img'=>$_POST['img'],
                );
            $tmp=$this->My_model->Update($id,$data,$this->table);
            if ($tmp==1) {
                $this->My_model->Sent_message('Thao tác thành công','slide','success');
            }else $this->My_model->Sent_message('Thao tác lỗi','slide','danger');
        }
        $this->My_model->Load_view('slide/edit',$data);
    }
    public function delete($id='')
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'slide', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'slide', 'danger');
        }
    }
    public function chang_top()
    {
        $array=$_POST['array'];
        foreach ($array as $key => $value) {
            $this->My_model->Update($value,array('top'=>$key+1),$this->table);
        }
        $this->My_model->Sent_message('Thao tác thành công','slide','success');
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if (isset($_POST['submit'])&&$_POST['submit']=='ok') {
            $this->form_validation->set_rules('caption', 'Caption', 'required');
            $this->form_validation->set_rules('img', 'Image', 'required');
            $this->form_validation->set_rules('link', 'Link', 'required');
            if ($this->form_validation->run() == true) {
            	date_default_timezone_set('Asia/Ho_Chi_Minh');
            	$date_time = date('Y-m-d H:i:s');
                $data = array(
                	'caption' => $this->input->post('caption'),
                    'img'             => $this->input->post('img'),
                    'link'        => $this->input->post('link'),
                    'date_created'         => $date_time
                );
                $result = $this->db->insert('slide', $data);
                if (isset($result) && $result != '') {
                    $this->My_model->Sent_message('Them Du lieu thanh cong','slide','success');
                }
            }
        }
        $this->My_model->Load_view('slide/add');
    }

}

/* End of file slide.php */
/* Location: ./application/controllers/slide.php */