<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi" xml:lang="vi">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Kết quả trả về thành công </title>
</head>
<body>	
<?php
include('NL_Checkoutv3.php');
$nlcheckout= new NL_CheckOutV3('45525', '2daa09faf06829a2d97bcde3b8ee2003', 'buihai2603@gmail.com', 'https://www.nganluong.vn/checkout.api.nganluong.post.php');
$nl_result = $nlcheckout->GetTransactionDetail($_GET['token']);
if($nl_result){
	$nl_errorcode           = (string)$nl_result->error_code;
	$nl_transaction_status  = (string)$nl_result->transaction_status;
	if($nl_errorcode == '00') {
		if($nl_transaction_status == '00') {
			//trạng thái thanh toán thành công
			echo "<pre>";
				print_r( $nl_result);
			echo "</pre>";
			echo "Cập nhật trạng thái thành công";
		}
	}else{
		echo $nlcheckout->GetErrorMessage($nl_errorcode);
	}
}
?>
</body>	
</html>		
<!-- http://localhost/Codeigniter-Project/home/pay_thank?order_code=ACEMVDWA_1457968979&error_code=00&token=1010012-641c9dcf6127f9bc63f5c661ab0e68fa -->