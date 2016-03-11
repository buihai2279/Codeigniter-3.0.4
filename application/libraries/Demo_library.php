<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo_library
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function sent_mail_active_user($mail_user, $code)
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail_user, ' User'); // Add a recipient

        $mail->Subject = 'Mail active tai khoan';
        $mail->Body    = 'Mail active tài khoản click vào đường link sau để active<br>';
        $mail->Body .= '<b>' . base_url('auth/active') . '/' . $code . '</b><br>';
        $mail->Body .= 'Hoặc nhập code :<b>' . $code . '</b> vào trang : http://localhost/final/auth/active';
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function mail_recover_password($mail_user, $code)
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail_user, ' User'); // Add a recipient

        $mail->Subject = 'Reset lại tài khoản';
        $mail->Body    = 'Mail Reset lại tài khoản click vào đường link sau để Reset lại tài khoản<br>';
        $mail->Body .= '<b>' . base_url('auth/active') . '/' . $code . '</b><br>';
        $mail->Body .= 'Hoặc nhập code :<b>' . $code . '</b> vào trang : http://localhost/final/auth/active';
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function reply_mail($mail='',$bbc='',$content='')
    {
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->protocol   = 'smtp';
        $mail->Username   = 't3h0715e@gmail.com'; // SMTP username
        $mail->Password   = 't3h0715e!@#'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        $mail->isHTML(true);

        $mail->setFrom('t3h0715e@gmail.com', 'techshop');
        $mail->addAddress($mail, ' User'); // Add a recipient

        $mail->Subject = $bbc;
        $mail->Body    = $content;
        if (!$mail->send()) {
            return false;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
    public function Get_xml($link)
    {
        include 'simple_html_dom.php';
        $html     = file_get_html($link);
        $variable = $html->find('ul.mobilecate', 0);
        foreach ($variable->find('li') as $value) {
            $tmp2 = $value->find('a strong', 0)->plaintext;
            $tmp1 = $value->find('a img', 0)->src;
            if ($tmp1 != 'https://cdn2.tgdd.vn/v2015/Content/desktop/images/bgtran.png' && $tmp2 != 0) {
                $tmp['src']   = $tmp1;
                $price = $value->find('a strong', 0)->plaintext;
                $price      = str_replace('.', '',$price );
                $tmp['price'] = str_replace('₫', '', $price);
                $tmp['href']= $value->find('a',0)->href;
                $html1     = file_get_html('https://www.thegioididong.com'.$tmp['href']);
                $variable1 = $html1->find('div.owl-carousel', 0);
                $tmp3=array();
                $caption=array();
                $text='';
                foreach ($variable1->find('div.item') as $value1) {
                    $tmp3[] = $value1->find('a', 0)->href;
                    $caption[]=trim($value1->find('p', 0)->plaintext);
                }
                $tmp['link']=$tmp3;
                $tmp['caption']=implode('|', $caption);
                $var3= $html1->find('ul.parameter', 0);
                $text=array();
                foreach ($var3->find('li') as $val3) {
                    $text[]= $val3->find('span',0)->plaintext.' '.$val3->find('div',0)->plaintext;
                }
                $tmp['detail']=implode('|', $text);
                $tmp['name']  = $value->find('figure.bginfo h3', 0)->innertext;
                $tmp['des']   = array();
                $tex1 = $value->find('figure.bginfo span', 0)->innertext;
                if (strlen($tex1)>40) {
                    continue;
                }else {
                    $tmp['des'][] = $value->find('figure.bginfo span', 0)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 1)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 2)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 3)->innertext;
                    $tmp['des'][] = $value->find('figure.bginfo span', 4)->innertext;
                }
                $tmp['description']=implode('|', $tmp['des']);
                $tmp['category_id']='1';
                $arr[]        = $tmp;
            }
        }
        return $arr;
    }
    public function Get_xml_1($link)
    {
        include 'simple_html_dom.php';
        $html     = file_get_html($link);
        $variable = $html->find('ul.mobilecate', 0)->innertext;
        return $variable;
    }
}

/* End of file My_sentmail.php */
/* Location: ./application/libraries/My_sentmail.php */
