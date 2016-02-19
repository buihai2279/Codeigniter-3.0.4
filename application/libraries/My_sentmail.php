<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_sentmail
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}
	public function sent_mail_active_user($mail_user,$code)
	{
		require 'PHPMailerAutoload.php';
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->protocol ='smtp';
		$mail->Username = 't3h0715e@gmail.com';                 // SMTP username
		$mail->Password = 't3h0715e!@#';                           // SMTP password
		$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->isHTML(true); 

		$mail->setFrom('t3h0715e@gmail.com', 'dsdds');
		$mail->addAddress($mail_user, ' User');     // Add a recipient

		$mail->Subject = 'Mail active tai khoan';
		$mail->Body    = 'Mail active tài khoản click vào đường link sau để active<br>';
		$mail->Body    .= '<b>http://localhost/final/auth/active/'.$code.'</b><br>';
		$mail->Body    .= 'Hoặc nhập code :<b>'.$code. '</b> vào trang : http://localhost/final/auth/active';
		if(!$mail->send()) {
		    return FALSE;
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    return TRUE;
		}
	}

	

}

/* End of file My_sentmail.php */
/* Location: ./application/libraries/My_sentmail.php */
