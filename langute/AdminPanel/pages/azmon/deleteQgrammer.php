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

if (isset($_GET['id'])) {
    // دریافت شناسه سوال برای حذف
    $question_id = $_GET['id'];
    // دریافت عنوان قبل از حذف
    $sql = "SELECT question_title FROM questions WHERE question_id = $question_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question_title = $row['question_title'];

        // حذف رکورد مربوطه از جدول questions
        $sql = "DELETE FROM questions WHERE question_id = $question_id";
        if ($conn->query($sql) === TRUE) {
            // حذف رکوردهای مرتبط از جدول options
            $sql = "DELETE FROM options WHERE question_id = $question_id";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('سوال $question_title حذف شد.')</script>";
                echo "<script>window.location.href = 'Qgrammar.php';</script>";
            } else {
                echo "<script>alert('خطا در حذف رکورد.')</script>";
            }
        } else {
            echo "<script>alert('خطا در حذف رکورد.')</script>";
        }
    } else {
        echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
    }
} else {
    echo "شناسه سوال معتبر نیست.";
}

// بستن اتصال به پایگاه داده
$conn->close();
?>