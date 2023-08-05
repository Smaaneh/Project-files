<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
		<!-- Meta Tags -->
		<?php include 'metaTAGS.php';?>

		<!-- Title -->
		<title>ارتباط با ما</title>

		<!-- linksCSS -->
		 <?php include 'linksCSS.php';?>

    </head>
    <body>

     	<!-- header-->
 		<?php include 'header.php';?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('images/breadcrumb-bg.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<h2>ارتباط با ما</h2>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<ul class="bread-list">
							<li ><a href="index.php">خانه <i class="fa fa-angle-left"></i></a></li>
							<li class="active"><a href="contact.html">ارتباط با ما</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = "langute2023@gmail.com";
    $subject = "فرم ارتباط با ما";
    $headers = "From: " . $_POST["email"] . "\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Email content
    $message = "<p>نام خانوادگی: " . $_POST["last-name"] . "</p>";
    $message .= "<p>نام: " . $_POST["first-name"] . "</p>";
    $message .= "<p>آدرس ایمیل: " . $_POST["email"] . "</p>";
    $message .= "<p>شماره تلفن: " . $_POST["tel"] . "</p>";
    $message .= "<p>پیام: " . $_POST["message"] . "</p>";

// کدهای ارسال ایمیل با PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // اطلاعات SMTP هاست خود را وارد کنید
$mail->SMTPAuth = true;
$mail->Username = 'langute2023@gmail.com'; // نام کاربری SMTP خود را وارد کنید
$mail->Password = 'lan#S*mo22'; // رمز عبور SMTP خود را وارد کنید
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($_POST["email"], $_POST["first-name"] . ' ' . $_POST["last-name"]);
$mail->addAddress('langute2023@gmail.com'); // ایمیل مقصد خود را وارد کنید

$mail->isHTML(true);
$mail->Subject = 'فرم ارتباط با ما';
$mail->Body = '<p>نام خانوادگی: ' . $_POST["last-name"] . '</p>';
$mail->Body .= '<p>نام: ' . $_POST["first-name"] . '</p>';
$mail->Body .= '<p>آدرس ایمیل: ' . $_POST["email"] . '</p>';
$mail->Body .= '<p>شماره تلفن: ' . $_POST["tel"] . '</p>';
$mail->Body .= '<p>پیام: ' . $_POST["message"] . '</p>';

if ($mail->send()) {
	echo '<p style="color: green;">ایمیل با موفقیت ارسال شد.</p>';
	echo '<p style="color: green;">کارشناسان لنگوته از طریق ایمیل با شما در ارتباط خواهند بود.</p>';
} else {
	echo '<p style="color: red;">متاسفانه خطایی در ارسال ایمیل رخ داده است.</p>';
	echo '<p style="color: red;">خطا: ' . $mail->ErrorInfo . '</p>';
}
}
?>
		<!-- Contact Us -->
		<section id="contact" class="contact section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="section-title bg">
							<h2> ارتباط <span>باما</span></h2>
							<p>شما عزیزان میتوانید از راه های ذکر شدا با ما در ارتباط باشید . همچنین در صورت انتقاد ، پیشنهاد ، و یا درخواست مشاوره و پشتیبانی میتوانید کادر زیر را پر کنید </p>
							<div class="icon"><i class="fa fa-paper-plane"></i></div>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="form-head">
						<!-- Contact Form -->
						<form class="form" action="" method="POST">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input name="last-name" type="text" placeholder="نام خانوادگی">
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input name="first-name" type="text" placeholder="نام">
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<i class="fa fa-envelope"></i>
								<input name="email" type="email" placeholder="آدرس ایمیل">
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<i class="fa fa-envelope"></i>
								<input name="tel" type="tel" placeholder="شماره تلفن">
							</div>
							</div>
							<div class="col-12">
							<div class="form-group message">
								<i class="fa fa-pencil"></i>
								<textarea name="message" placeholder="پیام خود را تایپ کنید"></textarea>
							</div>
							</div>
							<div class="col-12">
							<div class="form-group">
								<div class="button">
								<button type="submit" class="btn primary">ارسال پیام</button>
								</div>
							</div>
							</div>
						</div>
						</form>
						<!--/ End Contact Form -->
					</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<div class="contact-right">
							<!-- Contact-Info -->
							<div class="contact-info">
								<div class="icon"><i class="fa fa-map"></i></div>
								<h3>ما در شبکه های اجتماعی</h3>
								<p>@langute</p>
							</div>
							<!-- Contact-Info -->
							<div class="contact-info">
								<div class="icon"><i class="fa fa-envelope"></i></div>
								<h3>اطلاعات تماس</h3>
								<p><a href="mailto:info@example.com">langute2023@gmail.com</a></p>
								<p>09130000006</p>
							</div>
							<!-- Contact-Info -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Contact Us -->

 <!-- foother & js links -->
 <?php include 'foother.php';?>
    </body>
</html>
