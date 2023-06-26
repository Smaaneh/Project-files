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

// دریافت شناسه استاد برای حذف
$id = $_GET['id'];

// دریافت نام و نام خانوادگی استاد قبل از حذف
$sql = "SELECT name, last_name FROM teacher WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $last_name = $row['last_name'];

    // حذف رکورد مربوطه از جدول teacher
    $sql = "DELETE FROM teacher WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('استاد $name $last_name حذف شد.')</script>";
    } else {
        echo "<script>alert('خطا در حذف رکورد.')</script>";
    }
} else {
    echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
