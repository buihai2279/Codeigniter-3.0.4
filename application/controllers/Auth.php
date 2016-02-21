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
        $this->load->view('auth_view/header');
        $this->load->view($view,$data);
        $this->load->view('auth_view/footer');
	}
	public function register()
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra người dùng đang đăng nhập chuyển hướng về home
			$message='<div class="alert alert-danger">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp', $message);
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
		   		date_default_timezone_set('Asia/Ho_Chi_Minh');
		   		$date_time = date('Y-m-d H:i:s');
		   		$level=0;
		   		if ($this->My_model->Count_table('user')==0) {
		   			$level=2;
		   		}
				$data = array(
			        'mail' => $mail,
			        'password' => md5($this->input->post('password')),
			        'code' => $code,
			        'level' => $level,
			        'date_created' => $date_time,
			        'status' => 0
				);
				$this->db->insert('user', $data);
				$this->load->library('demo_library');
				if ($this->demo_library->sent_mail_active_user($mail,$code)==TRUE) {
					$message='<div class="alert alert-success">Đăng ký thành công Check mail để kích hoạt.Hoặc nhập mã kích hoạt tại đây</div>';
					$this->session->set_flashdata('message_tmp',$message);
					redirect('auth/active','refresh');
					die();
				}else {
					$message='<div class="alert alert-danger">Có lỗi xảy ra</div>';
					$this->session->set_flashdata('message_tmp',$message);
					redirect('auth/register','refresh');
					die();
				}
			}
			else {
				$message='<div class="alert alert-danger">Mail đã này đã DK!!! <a href="login">Login tại đây<a></div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('auth/register','refresh');
				die();
			}
		}
		$this->Load_view('auth_view/register',$data);
	}
	public function Login()
	{
		//kiểm tra nếu người dùng đang đăng nhập thì đẩy về trang chủ
		if ($this->session->has_userdata('login')&&$this->session->userdata('login')==TRUE) {
			$message='<div class="alert alert-danger">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('mail','Mail','required|valid_email|trim');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[4]|max_length[12]');
		if ($this->form_validation->run() == FALSE)
		{//validate dữ liệu nếu sai thì gửi thông báo lỗi 
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
            $this->Load_view('auth_view/login',$data);
        }
        else
        {//validate dữ liệu đúng thì bắt đầu kiểm tra tài khoản có tồn tại hay chưa
			$mail=$this->input->post('mail',TRUE);
			$pass=md5($this->input->post('password',TRUE));
        	$result = $this->My_model->Check_login($mail,$pass);
        	if ($result==FALSE) {
				$message='<div class="alert alert-danger">Mật khẩu hoặc Mail vừa nhập không đúng</div>';
        		$this->session->set_flashdata('message_tmp',$message);
        		redirect('auth/login','refresh');
        		die();
        	}
    		if($result->status==1)
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
					$message='<div class="alert alert-primary">Đăng nhập trang quản trị thành công.</div>';
        			$this->session->set_flashdata('message_tmp',$message);
        			redirect('Admin','refresh');
        		}
        		else{//nếu là user thì chuyển hướng về trang home
					$message='<div class="alert alert-success">Đăng nhập trang người dùng thành công.</div>';
        			$this->session->set_flashdata('message_tmp',$message);
        			redirect('Home','refresh');
        		}
        	}
        	else if($result->status==0){
        		$data['message']='<div class="alert alert-danger">Tài khoản chưa kích hoạt</div>';
        		$this->Load_view('auth_view/login',$data);
        	}
        	else if($result->status==2){
        		$data['message']='<div class="alert alert-danger">Tài khoản đang bị khóa liên hệ admin</div>';
        		$this->Load_view('auth_view/login',$data);
        	}
        }
	}
	public function logout()
	{
		if ($this->session->userdata('login')==FALSE) {
			$message='<div class="alert alert-warning">Chưa đăng nhập!!!</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->session->sess_destroy();
		redirect('Home','refresh');die();
	}
	public function recover_password()
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra người dùng đã đăng nhập hay chưa
			$message='<div class="alert alert-warning">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('mail','Mail','required|valid_email|trim');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('auth_view/recover_password',$data);
		} else {
			$mail=$this->input->post('mail');
			if($this->My_model->Check_user_by_mail($mail)==TRUE)
				$data['message']='<div class="alert alert-success">Đã gửi mail vui lòng check mail</div>';
			else
				$data['message']='<div class="alert alert-danger">Không tồn tại mail</div>';
			$this->Load_view('auth_view/recover_password',$data);
		}
		
	}
	public function change_password()
	{
		if ($this->session->has_userdata('login')==FALSE) {//kiểm tra người dùng đã đăng nhập hay chưa
			$message='<div class="alert alert-warning">Bạn chưa đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Auth/login','refresh');
			die();//dừng tất cả chương trình
		}
		$this->form_validation->set_rules('old-password','Password','required|trim');
		$this->form_validation->set_rules('new-password','new-password','required|trim');
		$this->form_validation->set_rules('re-new-password','Re-new-password','required|trim|matches[new-password]');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('auth_view/change_password',$data);
		} else {
			$mail=$this->session->userdata('mail');
			$result=$this->My_model->Get_user_by_mail($mail);
			$old_password=md5($this->input->post('old-password'));
			if ($old_password!=$result->password) {
				$message='<div class="alert alert-warning">mật khẩu bạn vừa nhập không đúng</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('auth/change_password','refresh');
				die();
			}
			$new_password=md5($this->input->post('new-password'));
			if ($old_password==$new_password) {
				$message='<div class="alert alert-warning">Mật khẩu mới phải khác mật khẩu cũ</div>';
				$this->session->set_flashdata('message_tmp',$message);
				redirect('auth/change_password','refresh');
				die();
			}else {
				$id=$result->id;
				$data=array('password'=>$new_password);
				$this->My_model->Update($id,$data,'user');
				$message='<div class="alert alert-success"></div>';
				$this->session->set_flashdata('message_tmp', 'Đổi mật khẩu thành công!!!');
				redirect('home','refresh');
			}
		}
	}
		
	public function active($code=NULL)
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra nếu người dùng đăng nhập rồi thì chuyển hướng
			$message='<div class="alert alert-warning">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();
		}
		if ($this->uri->segment(3)!='') {
			$code=$this->uri->segment(3);
			$result=$this->My_model->Get_user_by_code($code);
			if ($result==FALSE) {
				$message='<div class="alert alert-danger">Code sai !!!</div>';
				$this->session->set_flashdata('message_tmp',$message);
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
				$message='<div class="alert alert-success">Active tài khoản thành công '.$result->mail.' Đăng nhập thành công với tài khoản: '.$result->mail.'</div>';
        		$this->session->set_flashdata('message_tmp',$message);
				redirect('home','refresh');
				die();
			}
		}
		$this->form_validation->set_rules('code','Code','required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('auth_view/active',$data);
		} else {
			$code=$this->input->post('code');
			$result=$this->My_model->Get_user_by_code($code);
			if ($result==FALSE) {
				$message='<div class="alert alert-danger">Code sai !!!</div>';
				$this->session->set_flashdata('message_tmp',$message);
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
				$message='<div class="alert alert-danger">Active tài khoản thành công'.$result->mail.' Đăng nhập thành công với tài khoản: '.$result->mail.'</div>';
        		$this->session->set_flashdata('message_tmp',$message);
				redirect('home','refresh');
				die();
			}
		}
	}
	public function Re_active()
	{
		if ($this->session->has_userdata('login')==TRUE) {//kiểm tra nếu người dùng đăng nhập rồi thì chuyển hướng
			$message='<div class="alert alert-warning">Bạn đang đăng nhập</div>';
			$this->session->set_flashdata('message_tmp',$message);
			redirect('Home','refresh');
			die();
		}
		$this->form_validation->set_rules('mail','Mail','required|trim|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$data['message'] =validation_errors('<div class="alert alert-danger">','</div>');
			$this->Load_view('auth_view/re_active',$data);
		} 
		else
		{
			$mail=$this->input->post('mail');
			$result=$this->My_model->Get_user_by_mail($mail);
			if ($result->code!='') {
				$this->load->library('demo_library');
				$this->demo_library->sent_mail_active_user($mail,$result->code);
				$message='<div class="alert alert-danger">Gửi mã thành công kiểm tra lại tài khoản</div>';
				$this->session->set_flashdata('message_tmp',$message);
			}else{
				$message='<div class="alert alert-danger">Mã kích hoạt không tồn tại!!</div>';
				$this->session->set_flashdata('message_tmp',$message);
			}
			$this->Load_view('auth_view/re_active');
		}
	}
	public function index()
	{
		redirect('Auth/login','refresh');
	}
}
/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */