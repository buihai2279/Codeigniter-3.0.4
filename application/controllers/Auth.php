<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }
    /**
     * @param $view
     * @param $data
     */
    public function Load_view($view, $data = null)
    {
//Hàm load
        $this->load->view('back-end/header-normal');
        // $this->load->view('back-end/breadcrumb');
        $this->load->view($view, $data);
        $this->load->view('back-end/footer-normal');
    }
    /**
     * @param $message
     * @param $link
     * @param $color
     */
    public function Sent_message($message = 'Thao tác thành công', $link = 'home', $color = 'success')
    {
        $message = '<div class="alert alert-' . $color . '">' . $message . '</div>';
        $this->session->set_flashdata('message_tmp', $message);
        redirect($link, 'refresh');
        die();
    }
    public function register()
    {
        if ($this->check_login()) {
//kiểm tra người dùng đang đăng nhập chuyển hướng về home
            $this->Sent_message('Bạn đang đăng nhập', 'Home', 'danger');
        }
        $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('re-password', 'Re-Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
        } else {
            $mail = $this->input->post('mail');
            if ($this->My_model->Check_user_by_mail($mail) == false) {
                $code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                $mail = $this->input->post('mail');
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_time = date('Y-m-d H:i:s');
                $level     = 0;
                if ($this->My_model->Count_table('user') == 0) {
                    $level = 2;
                }
                $data = array(
                    'mail'         => $mail,
                    'password'     => md5($this->input->post('password')),
                    'code'         => $code,
                    'level'        => $level,
                    'date_created' => $date_time,
                    'status'       => 0,
                );
                $this->db->insert('user', $data);
                $this->load->library('demo_library');
                if ($this->demo_library->sent_mail_active_user($mail, $code) == true) {
                    $message = 'Đăng ký thành công Check mail để kích hoạt.Hoặc nhập mã kích hoạt tại đây';
                    $this->Sent_message($message, 'auth/active', 'success');
                } else {
                    $this->Sent_message('Có lỗi xảy ra', 'auth/register', 'danger');
                }
            } else {
                $message = 'Mail đã này đã DK!!! <a href="login">Login tại đây<a>';
                $this->Sent_message($message, 'auth/register', 'danger');
            }
        }
        $this->Load_view('auth_view/register', $data);
    }
    public function Login()
    {
//kiểm tra nếu người dùng đang đăng nhập thì đẩy về trang chủ
        if ($this->check_login()) {
            $this->Sent_message('Bạn đang đăng nhập', 'Home', 'danger');
        }
        $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|max_length[12]');
        if ($this->form_validation->run() == false) {
//validate dữ liệu nếu sai thì gửi thông báo lỗi
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->Load_view('auth_view/login', $data);
        } else {
//validate dữ liệu đúng thì bắt đầu kiểm tra tài khoản có tồn tại hay chưa
            $mail   = $this->input->post('mail', true);
            $pass   = md5($this->input->post('password', true));
            $result = $this->My_model->Check_login($mail, $pass);
            if ($result == false) {
                $this->Sent_message('Mật khẩu hoặc Mail vừa nhập không đúng', 'auth/login', 'danger');
            }
            if ($result->status == 1) {
//đă nhập thành công
                $level = $result->level;
                $array = array(
                    'mail'  => $mail,
                    'login' => true,
                    'level' => $level,
                );
                $this->session->set_userdata($array);
                if ($level == 1 || $level == 2) //kiểm tra tài khoản đăng nhập là user hay admin
                {
//nếu là admin thì chuyển hướng về trang quản trị
                    $this->Sent_message('Đăng nhập trang quản trị thành công.', 'Admin', 'info');
                } else {
//nếu là user thì chuyển hướng về trang home
                    $this->Sent_message('Đăng nhập trang người dùng thành công.', 'Home', 'success');
                }
            } else if ($result->status == 0) {
                $data['message'] = '<div class="alert alert-danger">Tài khoản chưa kích hoạt</div>';
                $this->Load_view('auth_view/login', $data);
            } else if ($result->status == 2) {
                $data['message'] = '<div class="alert alert-danger">Tài khoản đang bị khóa liên hệ admin</div>';
                $this->Load_view('auth_view/login', $data);
            }
        }
    }
    public function logout()
    {
        if ($this->check_login() == false) {
            $this->Sent_message('Chưa đăng nhập!!!', 'Home', 'warning');
        }
        $this->session->sess_destroy();
        redirect('Home', 'refresh');die();
    }
    public function recover_password()
    {
        if ($this->check_login()) {
//kiểm tra người dùng đã đăng nhập hay chưa
            $this->Sent_message('Bạn đang đăng nhập', 'Home', 'warning');
        }
        $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email|trim');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->Load_view('auth_view/recover_password', $data);
        } else {
            $mail   = $this->input->post('mail');
            $result = $this->My_model->Get_user_by_mail($mail);
            if ($result->mail == $mail) {
                $code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                $this->load->library('demo_library');
                if ($this->demo_library->mail_recover_password($mail, $code) == true) {
                    $id   = $result->id;
                    $data = array('password' => md5(123456), 'code' => $code);
                    $this->My_model->Update($id, $data, 'user');
                    $this->Sent_message('Đã gửi mail vui lòng check mail vaf kich hoat lai tai khoan', 'auth/active', 'success');
                } else {
                    $this->Sent_message('Có lỗi xảy ra', 'auth/recover_password', 'danger');
                }
            } else {
                $data['message'] = '<div class="alert alert-danger">Không tồn tại mail</div>';
            }

            $this->Load_view('auth_view/recover_password', $data);
        }

    }
    public function change_password()
    {
        if ($this->check_login() == false) {
//kiểm tra người dùng đã đăng nhập hay chưa
            $this->Sent_message('Bạn chưa đăng nhập', 'auth/login', 'warning');
        }
        $this->form_validation->set_rules('old-password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new-password', 'new-password', 'required|trim');
        $this->form_validation->set_rules('re-new-password', 'Re-new-password', 'required|trim|matches[new-password]');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->Load_view('auth_view/change_password', $data);
        } else {
            $mail         = $this->session->userdata('mail');
            $result       = $this->My_model->Get_user_by_mail($mail);
            $old_password = md5($this->input->post('old-password'));
            if ($old_password != $result->password) {
                $this->Sent_message('mật khẩu bạn vừa nhập không đúng', 'auth/change_password', 'warning');
            }
            $new_password = md5($this->input->post('new-password'));
            if ($old_password == $new_password) {
                $this->Sent_message('Mật khẩu mới phải khác mật khẩu cũ', 'auth/change_password', 'warning');
            } else {
                $id   = $result->id;
                $data = array('password' => $new_password);
                $this->My_model->Update($id, $data, 'user');
                $this->Sent_message('Đổi mật khẩu thành công!!!', 'home', 'success');
            }
        }
    }

    /**
     * @param $code
     */
    public function active($code = null)
    {
        if ($this->check_login()) {
//kiểm tra nếu người dùng đăng nhập rồi thì chuyển hướng
            $this->Sent_message('Bạn đang đăng nhập', 'Home', 'warning');
        }
        if ($this->uri->segment(3) != '') {
            $code   = $this->uri->segment(3);
            $result = $this->My_model->Get_user_by_code($code);
            if ($result == false) {
                $this->Sent_message('Code sai !!!', 'auth/active', 'danger');
            } else {
                $arrayName = array('status' => 1, 'code' => '');
                $this->My_model->Update($result->id, $arrayName, 'user');
                $array = array(
                    'mail'  => $result->mail,
                    'login' => true,
                    'level' => $result->level,
                );
                $this->session->set_userdata($array);
                $message = 'Active tài khoản thành công. Đăng nhập thành công với tài khoản: ' . $result->mail;
                $this->Sent_message($message, 'home', 'success');
            }
        }
        $this->form_validation->set_rules('code', 'Code', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->Load_view('auth_view/active', $data);
        } else {
            $code   = $this->input->post('code');
            $result = $this->My_model->Get_user_by_code($code);
            if ($result == false) {
                $this->Sent_message('Code sai !!!', 'auth/active', 'danger');
            } else {
                $arrayName = array('status' => 1, 'code' => '');
                $this->My_model->Update($result->id, $arrayName, 'user');
                $array = array(
                    'mail'  => $result->mail,
                    'login' => true,
                    'level' => $result->level,
                );
                $this->session->set_userdata($array);
                $message = 'Active tài khoản thành công' . $result->mail . ' Đăng nhập thành công với tài khoản: ' . $result->mail;
                $this->Sent_message($message, 'home', 'success');
            }
        }
    }
    public function Re_active()
    {
        if ($this->check_login()) {
//kiểm tra nếu người dùng đăng nhập rồi thì chuyển hướng
            $this->Sent_message('Bạn đang đăng nhập', 'Home', 'warning');
        }
        $this->form_validation->set_rules('mail', 'Mail', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['message'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->Load_view('auth_view/re_active', $data);
        } else {
            $mail   = $this->input->post('mail');
            $result = $this->My_model->Get_user_by_mail($mail);
            if ($result->code != '') {
                $this->load->library('demo_library');
                $this->demo_library->sent_mail_active_user($mail, $result->code);
                $this->Sent_message('Gửi mã thành công kiểm tra lại tài khoản', 'auth_view/re_active', 'danger');
            } else {
                $this->Sent_message('Mã kích hoạt không tồn tại!!', 'auth_view/re_active', 'danger');
            }
        }
    }
    public function index()
    {
        redirect('Auth/login', 'refresh');
    }
    public function check_login()
    {
        if ($this->session->has_userdata('login') == true) {
            return true;
        } else {
            return false;
        }

    }
}
/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
