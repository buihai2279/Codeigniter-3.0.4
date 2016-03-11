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
        if ($this->My_model->check_user('level')) {
            $this->My_model->Sent_message('Bạn KHÔNG có quyền truy cập','home','danger');
        }
    }
    public function index()
    {
        $this->My_model->Load_view('auth_view/index');
    }

}

/* End of file back-end.php */
/* Location: ./application/controllers/back-end.php */
