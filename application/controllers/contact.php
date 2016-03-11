<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contact extends CI_Controller
{
    public $table = 'contact';
    public $limit = 10;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
    }
    public function index()
    {
        $data['result'] = $this->My_model->get_all($this->table);
        $this->My_model->Load_view('contact/list', $data);
    }
    public function edit($id = '')
    {
        $this->load->helper('form');
        $result                = $this->db->get_where('category', array('id' => $id));
        $data['result']        = $result->row_array();
        $query                 = $this->db->select('id, name')->where('id !=', $id)->get('category');
        $data['list_category'] = $query->result_array();
        if (isset($_POST['submit']) && $_POST['submit'] == 'ok') {
            $data = array(
                'name'        => $_POST['txt-name'],
                'title'       => $_POST['txt-title'],
                'description' => $_POST['txt-description'],
                'parrent_id'  => $_POST['parrent_id'],
            );
            $tmp = $this->My_model->Update($id, $data, $this->table);
            if ($tmp == 1) {
                $this->My_model->Sent_message('Thao tác thành công', 'categories', 'success');
            } else {
                $this->My_model->Sent_message('Thao tác lỗi', 'categories', 'danger');
            }

        }

        $this->My_model->Load_view('categories/edit', $data);
    }
    public function delete($id = '')
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'categories', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'categories', 'danger');
        }
    }
    public function read($id = '')
    {
        $result = $this->My_model->delete($id, $this->table);
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'categories', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'categories', 'danger');
        }
    }
    public function reply($id = '')
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $data['result']=$this->My_model->Get_row_by_id($id);
        $data['id']=$id;
        if (isset($_POST['submit'])&&$_POST['submit']='ok') {
            $mail=$this->input->post('txt-mail');
            $bbc=$this->input->post('txt-bbc');
            $content=$this->input->post('txt-content');
            $this->load->library('Demo_library');
            $this->demo_library->reply_mail($mail,$bbc,$content);
        }
        $this->My_model->Load_view('contact/reply',$data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if (isset($_POST['submit'])&&$_POST['submit']=='ok') {
            $this->form_validation->set_rules('txt-name', 'Name', 'required');
            $this->form_validation->set_rules('txt-mail', 'Mail', 'required');
            $this->form_validation->set_rules('txt-content', 'Content', 'required');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date_time = date('Y-m-d H:i:s');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'name'        => $this->input->post('txt-name'),
                    'mail'       => $this->input->post('txt-mail'),
                    'content' => $this->input->post('txt-content'),
                    'status'=>0,
                    'info'=>$this->input->post('txt-info'),
                    'date_created'=>$date_time
                );
                $result = $this->db->insert('contact', $data);
                if (isset($result) && $result != '') {
                    $this->My_model->Sent_message('Them Du lieu thanh cong', 'contact', 'success');
                }
            }
        }
        $this->My_model->Load_view('contact/add');
    }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
