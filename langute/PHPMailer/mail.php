<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>وبگو | ارسال ایمیل با کلاس PHPMailer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- http://webgoo.ir -->
</head>
<body>
<?php
require_once('class.phpmailer.php');
$mail = new PHPMailer(true);
$mail->IsSMTP();
try {	
  $mail->Host       = "mail.example.com"; // آدرس SMTP سرور شما
  $mail->SMTPAuth   = true;                  // استفاده از SMTP authentication
  $mail->Username   = "yourname@example.com"; // نام کاربری SMTP
  $mail->Password   = "************";        // کلمه عبور SMTP
  $mail->AddReplyTo('yourname@example.com', 'Your Name'); // افزودن پاسخ به ارسال کننده
  $mail->AddAddress('username@example.com', 'User Name'); // تنظیم آدرس گیرنده ایمیل
  $mail->SetFrom('yourname@example.com', 'Your Name'); // تنظیم قسمت ارسال کننده ایمیل
  $mail->Subject = 'PHPMailer تست'; // موضوع ایمیل
  $mail->AltBody = 'برنامه شما از این ایمیل پشتیبانی نمی کند، برای دیدن آن، لطفا از برنامه دیگری استفاده نمائید'; // متنی برای کاربرانی که نمی توانند ایمیل را به درستی مشاهده کنند
  $mail->CharSet = 'UTF-8'; // یونیکد برای زبان فارسی
  $mail->ContentType = 'text/html'; // استفاده از html  
  $mail->MsgHTML('<html>
<body>
این یک <font color="#CC0000">تست</font> است!
</body>
</html>'); // متن پیام به صورت html
  //$mail->AddAttachment('images/phpmailer.gif'); // ضمیمه کردن فایل
  $mail->Send(); // ارسال
  echo "پیام با موفقیت ارسال شد\n";
} 
catch (phpmailerException $e) {
	echo $e->errorMessage(); // پیام خطا از phpmailer
} 
catch (Exception $e) {
	echo $e->getMessage(); // سایر خطاها
}
?>
</body>
</html>