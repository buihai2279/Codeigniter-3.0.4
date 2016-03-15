<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_mail extends CI_Controller
{
    public $table = 'list_mail';
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['result'] = $this->My_model->get_all($this->table);
        $this->My_model->Load_view('list_mail/list',$data);
    }
    public function add()
    {
        if (isset($_POST['mail'])&&strlen($_POST['mail'])>12) {
            $tmp=$this->db->like('mail',$_POST['mail'],'none')->get($this->table);
            if ($tmp->num_rows()>0) {
                echo "Mail đã tồn tại trong hệ thống";
            }else {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d H:i:s');
                $data = array(
                        'mail' => $this->input->post('mail'),
                        'code' => substr(str_shuffle("ABQRSTUVWXIJKfghiLMNOCDEFGHPYZabcdejklmnopqzxvrtyu"), 0, 20),
                        'date_created' =>$time            
                    );
                $result = $this->db->insert($this->table, $data);
                if ($result==TRUE) {
                    echo 'Thao tác thành công';
                }else echo 'Có lỗi xảy ra';
            }
        }else echo 'Không đúng định dạng';
    }
    public function delete($code='')
    {
        $result =$this->db->delete($this->table, array('code' => $code));
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'home', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'home', 'danger');
        }
    }
    public function delete_by_manager($id='')
    {
        $result =$this->db->delete($this->table, array('id' => $id));
        if ($result == true) {
            $this->My_model->Sent_message('Thao tác thành công', 'list_mail', 'success');
        } else {
            $this->My_model->Sent_message('Thao tác Lỗi', 'list_mail', 'danger');
        }
    }
    public function Sent()
    {
        $array=array();
        echo "sent";
    }
}
/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
