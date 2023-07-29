<?php
// اتصال به دیتابیس
$servername = "localhost"; // آدرس سرور دیتابیس (معمولاً localhost است)
$username = "root"; // نام کاربری دیتابیس
$password = "123"; // رمز عبور دیتابیس
$dbname = "langute"; // نام دیتابیس

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// بررسی فرم برای ارسال
if (isset($_POST["submit"])) {
    // دریافت اطلاعات ارسالی از فرم
    $title = $_POST["title"];
    $created_at = $_POST["created_at"];
    $content = $_POST["content"];

    // بررسی اطلاعات وارد شده
    if (empty($title) || empty($created_at) || empty($content)) {
        echo "لطفاً همه‌ی فیلدها را پر کنید.";
    } else {
        // درج اطلاعات در جدول articles
        $sql = "INSERT INTO articles (title, created_at, content) VALUES ('$title', '$created_at', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "مقاله با موفقیت اضافه شد!";
        } else {
            echo "خطا در اضافه کردن مقاله: " . $conn->error;
        }
    }
}

// بستن اتصال به دیتابیس
$conn->close();
?>