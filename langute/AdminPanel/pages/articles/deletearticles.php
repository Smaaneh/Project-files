<?php
// اطلاعات اتصال به پایگاه داده
$servername = "localhost"; // آدرس سرور پایگاه داده
$username = "root"; // نام کاربری پایگاه داده
$password = "123"; // رمز عبور پایگاه داده
$dbname = "langute"; // نام پایگاه داده

// ایجاد اتصال به پایگاه داده
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی وضعیت اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// دریافت شناسه مقاله برای حذف
$id = $_GET['id'];

// دریافت عنوان قبل از حذف
$sql = "SELECT title FROM articles WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Title = $row['title'];

    // حذف رکورد مربوطه از جدول articles
    $sql = "DELETE FROM articles WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('مقاله $Title حذف شد.')</script>";
        echo "<script>window.location.href = 'articles.php';</script>";
        
    } else {
        echo "<script>alert('خطا در حذف رکورد.')</script>";
    }
} else {
    echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>