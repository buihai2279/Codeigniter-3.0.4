<?php
defined('BASEPATH') or exit('No direct script access allowed');
class manager_user extends CI_Controller
{
    /**
     * @var int
     */
    public $limit = 6;
    /**
     * @var string
     */
    public $table = 'user';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
        if ($this->My_model->check_guest() == true) {
            $this->Sent_message('Bạn CHƯA đăng nhập', 'Auth/login', 'danger');
        }
        if ($this->My_model->check_manager() == false) {
            $this->Sent_message('Bạn KHÔNG có quyền truy cập', 'Home', 'warning');
        }
    }
    /**
     * @param $view
     * @param $data
     */
    protected function Load_view($view, $data = null)
    {
        $this->load->view('back-end/header');
        $this->load->view($view, $data);
        $this->load->view('back-end/footer');
    }
    public function View_all()
    {
        $segment = (int) $this->uri->segment(3);
        $total   = $this->My_model->Count_table($this->table);
        if ($segment >= $total) {
            $segment = $total - $limit;
        }

        if ($segment < 0) {
            $segment = 0;
        }

        $link           = 'http://localhost/Codeigniter-Project/manager_user/view_all';
        $data['result'] = $this->My_model->get_limit($this->table, $this->limit, $segment);
        $data['pag']    = $this->My_model->create_pagination($link, $total, $segment);
        $this->Load_view('manager_user/View_all', $data);
    }
    /**
     * @param $id
     */
    public function Block_user($id = '')
    {
        $arrayName = array('status' => 2);
        $result    = $this->My_model->update($id, $arrayName, $this->table);
        if ($result == true) {
            $this->Sent_message('Thao tác thành công', 'manager_user/view_all', 'success');
        } else {
            $this->Sent_message('Thao tác Lỗi', 'manager_user/view_all', 'danger');
        }
    }
    /**
     * @param $id
     */
    public function Un_block_user($id = '')
    {
        if ($this->session->userdata('level') >= 1) {
            $arrayName = array('status' => 1);
            $result    = $this->My_model->update($id, $arrayName, $this->table);
            if ($result == true) {
                $this->Sent_message('Thao tác thành công', 'manager_user/view_all', 'success');
            } else {
                $this->Sent_message('Thao tác Lỗi', 'manager_user/view_all', 'danger');
            }
        }
    }
    /**
     * @param $id
     */
    public function Set_manager($id)
    {
        if ($this->My_model->check_admin()) {
            $arrayName = array('level' => 1);
            $result    = $this->My_model->update($id, $arrayName, $this->table);
            if ($result == true) {
                $this->Sent_message('Thao tác thành công', 'manager_user/view_all', 'success');
            } else {
                $this->Sent_message('Thao tác Lỗi', 'manager_user/view_all', 'danger');
            }
        }
    }
    /**
     * @param $id
     */
    public function Un_set_manager($id)
    {
        if ($this->My_model->check_admin()) {
            $arrayName = array('level' => 0);
            $result    = $this->My_model->update($id, $arrayName, $this->table);
            if ($result == true) {
                $this->Sent_message('Thao tác thành công', 'manager_user/view_all', 'success');
            } else {
                $this->Sent_message('Thao tác Lỗi', 'manager_user/view_all', 'danger');
            }
        }
    }
    /**
     * @param $id
     */
    public function Delete_user($id)
    {
        if ($this->My_model->check_admin()) {
            $result = $this->My_model->delete($id, $this->table);
            if ($result == true) {
                $this->Sent_message('Thao tác thành công', 'manager_user/view_all', 'success');
            } else {
                $this->Sent_message('Thao tác Lỗi', 'manager_user/view_all', 'danger');
            }
        }
    }
    public function Proccess()
    {
        if (!isset($_POST['submit']) || !isset($_POST['check'])) {
            $this->Sent_message('Có lỗi xảy ra', $_POST['uri_string'], 'danger');
        } else {
            $arrayName = $this->input->post('check');
            if (isset($_POST['uri_string']) || $this->input->post('uri_string') != '') {
                $uri_string = $_POST['uri_string'];
            } else {
                $uri_string = 'manager_user/view_all';
            }

            if ($this->input->post('edit') == 'delete') {
                foreach ($arrayName as $key => $value) {
                    $result = $this->My_model->delete($value, $this->table);
                }
                if ($result == true) {
                    $this->Sent_message('Thao tác thành công', $uri_string, 'success');
                } else {
                    $this->Sent_message('Thao tác Lỗi', $uri_string, 'danger');
                }
            } else if ($this->input->post('edit') == 'block') {
                foreach ($arrayName as $key => $value) {
                    $result = $this->My_model->block($value, $this->table);
                }
                if ($result == true) {
                    $this->Sent_message('Thao tác thành công', $uri_string, 'success');
                } else {
                    $this->Sent_message('Thao tác Lỗi', $uri_string, 'danger');
                }
            } else if ($this->input->post('edit') == 'un_block') {
                foreach ($arrayName as $key => $value) {
                    $result = $this->My_model->un_block($value, $this->table);
                }
                if ($result == true) {
                    $this->Sent_message('Thao tác thành công', $uri_string, 'success');
                } else {
                    $this->Sent_message('Thao tác Lỗi', $uri_string, 'danger');
                }
            }
        }
    }
    public function index()
    {
        redirect('manager_user/fillter', 'refresh');
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
    /**
     * @param $name
     * @param $sort
     */
    public function fillter($name = 'id', $sort = 'ASC')
    {
        if (isset($_POST['name']) && isset($_POST['sort_by'])) {
            redirect(base_url() . 'manager_user/fillter/' . $_POST['name'] . '/' . $_POST['sort_by']);
        }
        if ($sort != 'DESC') {
            $sort = 'ASC';
        }

        $query  = $this->db->query("SHOW columns FROM $this->table");
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $tmp[] = $value['Field'];
        }
        if (!in_array($name, $tmp)) {
            $name = 'id';
        }
        $link   = "http://localhost/Codeigniter-Project/manager_user/fillter/$name/$sort";
        $offset = (int) $this->uri->segment(5);
        $total  = $this->My_model->Count_table($this->table);
        if ($offset >= $total) {
            $offset = $total - $this->limit;
        }

        if ($offset < 0) {
            $offset = 0;
        }

        $tmp            = $this->db->query("SELECT * FROM user ORDER BY $name $sort LIMIT $offset , $this->limit");
        $data['result'] = $tmp->result();
        $data['pag']    = $this->My_model->create_pagination($link, $total, $offset, 5);
        $this->Load_view('manager_user/View_all', $data);
    }
    /**
     * @param $message
     * @param $link
     * @param $color
     */
    protected function Sent_message($message = 'Thao tác thành công', $link = 'home', $color = 'success')
    {
        $message = '<div class="alert alert-' . $color . '">' . $message . '</div>';
        $this->session->set_flashdata('message_tmp', $message);
        redirect($link, 'refresh');
        die();
    }
    /**
     * @param $id
     */
    public function test($id = '')
    {
        $tmp = $this->My_model->Get_user_by_id($id);
        echo "<pre>";
        print_r($tmp);
        echo "</pre>";
    }
    public function test2()
    {
        // $this->load->view('test');
    }
}
