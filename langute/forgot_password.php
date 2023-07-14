<?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
}

// بررسی فرم بازیابی رمز عبور
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // چک کردن وجود کاربر با ایمیل موردنظر
    $checkUserSQL = "SELECT * FROM users WHERE email = '$email'";
    $checkUserResult = $conn->query($checkUserSQL);

    if ($checkUserResult->num_rows == 1) {
        // ایجاد یک کد رندم
        $randomCode = generateRandomCode();

        // ذخیره کد رندم در دیتابیس
        $updateCodeSQL = "UPDATE users SET reset_code = '$randomCode' WHERE email = '$email'";
        if ($conn->query($updateCodeSQL) === TRUE) {
            // ارسال کد رندم به ایمیل کاربر
            sendCodeByEmail($email, $randomCode);
            echo "کد بازیابی رمز عبور به ایمیل شما ارسال شد.";
        } else {
            echo "خطا در بروزرسانی کد رندم: " . $conn->error;
        }
    } else {
        echo "کاربری با این ایمیل یافت نشد.";
    }
}

// تابع تولید کد رندم
function generateRandomCode() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < 8; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $code .= $characters[$index];
    }
    return $code;
}

// تابع ارسال کد به ایمیل با استفاده از PHPMailer
function sendCodeByEmail($email, $code) {
    require 'PHPMailer/class.phpmailer.php';

    // ساخت شیء PHPMailer
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // آدرس سرور SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'langute2023@gmail.com'; // نام کاربری ایمیل شما
    $mail->Password = 'your-email-password'; // رمز عبور ایمیل شما
    $mail->SMTPSecure = 'tls'; // نوع اتصال امن (اختیاری)
    $mail->Port = 587; // پورت SMTP

    $mail->setFrom('your-email@example.com', 'Your Name'); // آدرس ایمیل فرستنده
    $mail->addAddress($email); // آدرس ایمیل گیرنده
    $mail->isHTML(true);

    $mail->Subject = 'بازیابی رمز عبور';
    $mail->Body = 'کد بازیابی رمز عبور شما: ' . $code;

    if (!$mail->send()) {
        echo 'خطا در ارسال ایمیل: ' . $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>بازیابی رمز عبور</title>
</head>
<body>
    <h1>بازیابی رمز عبور</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">ایمیل:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">ارسال کد بازیابی</button>
    </form>
</body>
</html>