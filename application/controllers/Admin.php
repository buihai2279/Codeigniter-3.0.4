<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  Module quản Admin
 *
 *
 *
 *
 */
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == 0) {
            $message = '<div class="alert alert-danger">Bạn KHÔNG	có quyền truy cập</div>';
            $this->session->set_flashdata('message_tmp', $message);
            redirect('Home', 'refresh');
            die();
        }
    }
    public function Load_view($view, $data = null)
    {
        $this->load->view('back-end/header');
        $this->load->view($view, $data);
        $this->load->view('back-end/footer');
    }
    public function index()
    {
        $this->Load_view('auth_view/index');
    }

}

/* End of file back-end.php */
/* Location: ./application/controllers/back-end.php */
