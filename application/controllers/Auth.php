<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    	$this->load->model('My_model');
    	$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	public function Load_view($view,$data=NULL)
	{//Hàm load 
        $this->load->view('back-end/header');
        $this->load->view($view,$data);
        $this->load->view('back-end/footer');
	}
	public function register()
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra người dùng đang đăng nhập chuyển hướng về home
			$this->session->set_flashdata('message_tmp', 'Bạn đang đăng nhập');
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('mail','Mail','required|valid_email|trim');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('re-password','Re-Password','required|trim|matches[password]');
		if ($this->form_validation->run() == FALSE)
			$data['message']=validation_errors('<div class="alert alert-danger">','</div>');
		else {
			$mail=$this->input->post('mail');
			if ($this->My_model->Check_user_by_mail($mail)==FALSE){
				$code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,8);
				$mail=$this->input->post('mail');
				$data = array(
			        'mail' => $mail,
			        'password' => md5($this->input->post('password')),
			        'code' => $code,
			        'status' => 0
				);
				$this->db->insert('user', $data);
				$this->load->library('My_sentmail');
				if ($this->my_sentmail->sent_mail_active_user($mail,$code)==TRUE) {
					$this->session->set_flashdata('message_tmp', 'Đăng ký thành công Check mail để kích hoạt.Hoặc nhập mã kích hoạt tại đây');
					redirect('auth/active','refresh');
					die();
				}else {
					$this->session->set_flashdata('message_tmp', 'Có lỗi xảy ra');
					redirect('auth/register','refresh');
					die();
				}
			}
			else {
				$this->session->set_flashdata('message_tmp','Mail đã này đã DK!!! <a href="login">Login tại đây<a>');
				redirect('auth/register','refresh');
				die();
			}
		}
		$this->Load_view('back-end/register',$data);
	}
	public function Login()
	{
		//kiểm tra nếu người dùng đang đăng nhập thì đẩy về trang chủ
		if ($this->session->has_userdata('login')&&$this->session->userdata('login')==TRUE) {
			$this->session->set_flashdata('message_tmp', 'Bạn đang đăng nhập');
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('mail','Mail','required|valid_email|trim');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[4]|max_length[12]');
		if ($this->form_validation->run() == FALSE)
		{//validate dữ liệu nếu sai thì gửi thông báo lỗi 
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
            $this->Load_view('back-end/login',$data);
        }
        else
        {//validate dữ liệu đúng thì bắt đầu kiểm tra tài khoản có tồn tại hay chưa
			$mail=$this->input->post('mail',TRUE);
			$pass=$this->input->post('password',TRUE);
        	$result = $this->My_model->Get_user_by_mail($mail);
        	if(isset($result)&&$mail==$result->mail && md5($pass)==$result->password && $result->status==1)
        	{//đă nhập thành công
        		$level=$result->level;
        		$array = array(
        			'mail' => $mail,
        			'login' => TRUE,
        			'level' => $level
        		);
        		$this->session->set_userdata( $array );
        		if ($level==1||$level==2) //kiểm tra tài khoản đăng nhập là user hay admin
        		{//nếu là admin thì chuyển hướng về trang quản trị 
        			$this->session->set_flashdata('message_tmp', 'Đăng nhập trang quản trị thành công.');
        			redirect('Admin','refresh');
        		}
        		else{//nếu là user thì chuyển hướng về trang home
        			$this->session->set_flashdata('message_tmp', 'Đăng nhập trang người dùng thành công.');
        			redirect('Home','refresh');
        		}
        	}
        	else if(isset($result)&&$mail==$result->mail && md5($pass)==$result->password && $result->status==0){
        		$data['message']='<div class="alert alert-danger">Tài khoản chưa kích hoạt</div>';
        		$this->Load_view('back-end/login',$data);
        	}
        	else if(isset($result)&&$mail==$result->mail && md5($pass)==$result->password && $result->status==2){
        		$data['message']='<div class="alert alert-danger">Tài khoản đang bị khóa liên hệ admin</div>';
        		$this->Load_view('back-end/login',$data);
        	}
        	else{//nếu tài khoản và mật khẩu sai trả về thông báo lỗi
        		$data['message']='<div class="alert alert-danger">Mật khẩu hoặc Mail vừa nhập không đúng</div>';
        		$this->Load_view('back-end/login',$data);
        	}
        }
	}
	public function logout()
	{
		if ($this->session->userdata('login')==FALSE) {
			$this->session->set_flashdata('message_tmp', 'Chưa đăng nhập!!!');
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->session->sess_destroy();
		$this->session->set_flashdata('message_tmp', 'Đăng xuất thành công!!!');
		redirect('Home','refresh');die();
	}
	public function recover_password()
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra người dùng đã đăng nhập hay chưa
			$this->session->set_flashdata('message_tmp', 'Bạn đang đăng nhập');
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('mail','Mail','required|valid_email|trim');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('back-end/recover_password',$data);
		} else {
			$mail=$this->input->post('mail');
			if($this->My_model->Check_user_by_mail($mail)==TRUE)
				$data['message']='<div class="alert alert-success">Đã gửi mail vui lòng check mail</div>';
			else
				$data['message']='<div class="alert alert-danger">Không tồn tại mail</div>';
			$this->Load_view('back-end/recover_password',$data);
		}
		
	}
	public function change_password()
	{
		if ($this->session->has_userdata('login')==FALSE) {//kiểm tra người dùng đã đăng nhập hay chưa
			$this->session->set_flashdata('message_tmp', 'Bạn chưa đăng nhập');
			redirect('Auth/login','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('old-password','Password','required|trim');
		$this->form_validation->set_rules('new-password','new-password','required|trim');
		$this->form_validation->set_rules('re-new-password','Re-new-password','required|trim|matches[new-password]');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('back-end/change_password',$data);
		} else {
			$mail=$this->session->userdata('mail');
			$result=$this->My_model->Get_user_by_mail($mail);
			$old_password=md5($this->input->post('old-password'));
			if ($old_password!=$result->password) {
				$this->session->set_flashdata('message_tmp', 'mật khẩu bạn vừa nhập không đúng');
				redirect('auth/change_password','refresh');
				die();
			}
			$new_password=md5($this->input->post('new-password'));
			if ($old_password==$new_password) {
				$this->session->set_flashdata('message_tmp', 'Mật khẩu mới phải khác mật khẩu cũ');
				redirect('auth/change_password','refresh');
				die();
			}else {
				$id=$result->id;
				$data=array('password'=>$new_password);
				$this->My_model->Update($id,$data,'user');
				$this->session->set_flashdata('message_tmp', 'Đổi mật khẩu thành công!!!');
				redirect('home','refresh');
			}
		}
	}
		
	public function active($code=NULL)
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra nếu người dùng đăng nhập rồi thì chuyển hướng
			$this->session->set_flashdata('message_tmp', 'Bạn đang đăng nhập');
			redirect('Home','refresh');
			die();
		}
		if ($this->uri->segment(3)!='') {
			$code=$this->uri->segment(3);
			$result=$this->My_model->Get_user_by_code($code);
			if ($result==FALSE) {
				$this->session->set_flashdata('message_tmp', 'Code sai !!!');
				redirect('auth/active','refresh');
				die();
			}else {
				$arrayName = array('status' => 1, 'code' =>'');
				$this->My_model->Update($result->id,$arrayName,'user');
				$array = array(
        			'mail' => $result->mail,
        			'login' => TRUE,
        			'level' => $result->level
        		);
        		$this->session->set_userdata( $array );
        		$this->session->set_flashdata('message_tmp', 'Active tài khoản thành công '.$result->mail.' Đăng nhập thành công với tài khoản: '.$result->mail);
				redirect('home','refresh');
				die();
			}
		}
		$this->form_validation->set_rules('code','Code','required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('back-end/active',$data);
		} else {
			$code=$this->input->post('code');
			$result=$this->My_model->Get_user_by_code($code);
			if ($result==FALSE) {
				$this->session->set_flashdata('message_tmp', 'Code sai !!!');
				redirect('auth/active','refresh');
				die();
			}else {
				$arrayName = array('status' => 1, 'code' =>'');
				$this->My_model->Update($result->id,$arrayName,'user');
				$array = array(
        			'mail' => $result->mail,
        			'login' => TRUE,
        			'level' => $result->level
        		);
        		$this->session->set_userdata( $array );
        		$this->session->set_flashdata('message_tmp', 'Active tài khoản thành công'.$result->mail.' Đăng nhập thành công với tài khoản: '.$result->mail);
				redirect('home','refresh');
				die();
			}
		}
	}
	public function index()
	{
		redirect('Auth/login','refresh');
	}
}
/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */