<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // دریافت اطلاعات از فرم
    $question_id = $_POST['question_id'];
    $question_title = $_POST['question_title'];
    $correct_option = $_POST['correct_option'];

    // بروزرسانی اطلاعات سوال در جدول questions
    $sql = "UPDATE questions SET question_title = '$question_title', correct_option = '$correct_option' WHERE question_id = $question_id";
    if ($conn->query($sql) === TRUE) {
        // بروزرسانی گزینه‌های غلط در جدول options
        for ($i = 2; $i <= 4; $i++) {
            $wrong_option = $_POST["wrong_option_$i"];
            $sql = "UPDATE options SET option_text = '$wrong_option' WHERE question_id = $question_id AND option_id = $i";
            $conn->query($sql);
        }

        // پیام ویرایش موفقیت‌آمیز
        echo "<script>alert('ویرایش با موفقیت انجام شد.')</script>";
        echo "<script>window.location.href = 'Qgrammar.php';</script>";
    } else {
        // خطا در بروزرسانی
        echo "<script>alert('خطا در ویرایش رکورد.')</script>";
    }

    // بستن اتصال به پایگاه داده
    $conn->close();
}
?>