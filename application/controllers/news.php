<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public $table = 'news';
	public function index()
	{
		$data['result'] = $this->My_model->get_all($this->table);
        $this->My_model->Load_view('news/list',$data);
	}
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if (isset($_POST)) {
            $this->form_validation->set_rules('txt-title', 'title', 'required');
            $this->form_validation->set_rules('txt-description', 'description', 'required');
            $this->form_validation->set_rules('txt-content', 'Content', 'required');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d H:i:s');
            $content=$this->input->post('txt-content');
            $content=str_replace('<img ','<img class="img-responsive" style="max-width:100%"', $content);
            if ($this->form_validation->run() == true) {
                $data = array(
                    'title'             => $this->input->post('txt-title'),
                    'description'        => $this->input->post('txt-description'),
                    'content'         => $content,
                    'date_created'         => $time,
                    'last_update'         => $time
                );
                $result = $this->db->insert('news', $data);
                if (isset($result) && $result != '') {
                    $this->My_model->Sent_message('Them Du lieu thanh cong', 'news', 'success');
                }
            }
        }
        $this->My_model->Load_view('news/add');
    }
    public function delete($id='')
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'news', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'news', 'danger');
        }
    }
	public function edit($id='')
	{
        $this->load->helper('form');
        $result=$this->db->get_where('news',array('id'=>$id));
        $data['result'] = $result->row_array();
        if (isset($_POST['submit'])) {
            $data = array(
                    'title'             => $this->input->post('txt-title'),
                    'description'        => $this->input->post('txt-description'),
                    'content'         => $this->input->post('txt-content'),
                );
            $tmp=$this->My_model->Update($id,$data,$this->table);
            if ($tmp==1) {
                $this->My_model->Sent_message('Thao tác thành công','news','success');
            }else $this->My_model->Sent_message('Thao tác lỗi','news','danger');
        }
        $this->My_model->Load_view('news/edit',$data);
	}

	public function view($id='')
	{
		if ($id=='') {
			$id=$_POST['id'];
		}
        $result=$this->db->get_where('news',array('id'=>$id));
        $data['result'] = $result->row_array();
        $this->load->view('news/view', $data);
	}

}

/* End of file news.php */
/* Location: ./application/controllers/news.php */