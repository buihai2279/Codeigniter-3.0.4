<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public $table = 'category';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
    }
    public function index()
    {
        $data['result'] = $this->My_model->get_all($this->table);
        $this->My_model->Load_view('categories/list',$data);
    }
    public function edit($id='')
    {
        $this->load->helper('form');
        $result=$this->db->get_where('category',array('id'=>$id));
        $data['result'] = $result->row_array();

        $query = $this->db->select('id, name')->where('id !=', $id)->get('category');
        $data['list_category'] = $query->result_array();

        if (isset($_POST['submit'])&&$_POST['submit']=='ok') {
            $data=array(
                    'name'=>$_POST['txt-name'],
                    'title'=>$_POST['txt-title'],
                    'description'=>$_POST['txt-description'],
                    'parrent_id'=>$_POST['parrent_id'],
                );
            $tmp=$this->My_model->Update($id,$data,$this->table);
            if ($tmp==1) {
                $this->My_model->Sent_message('Thao tác thành công','categories','success');
            }else $this->My_model->Sent_message('Thao tác lỗi','categories','danger');
        }

        $this->My_model->Load_view('categories/edit',$data);
    }
    public function delete($id='')
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'categories', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'categories', 'danger');
        }
    }
    public function get_slug()
    {
       echo $this->My_model->utf8_to_url($_POST['slug']);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if (isset($_POST)) {
            $this->form_validation->set_rules('txt-name', 'name', 'required');
            $this->form_validation->set_rules('txt-title', 'title', 'required');
            $this->form_validation->set_rules('txt-description', 'description', 'required');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'name' => $this->input->post('txt-name'),
                    'title'             => $this->input->post('txt-title'),
                    'description'        => $this->input->post('txt-description'),
                    'parrent_id'         => $this->input->post('parrent_id'),
                    'slug' => $this->input->post('txtslug'), 
                );
                $result = $this->db->insert('category', $data);
                if (isset($result) && $result != '') {
                    $this->My_model->Sent_message('Them Du lieu thanh cong', 'categories', 'success');
                }
            }
        }
        $data['data1'] = $this->My_model->Get_col('id,name', 'category');
        $this->My_model->Load_view('categories/add',$data);
    }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
