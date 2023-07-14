<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | واژگان</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSSlinks -->
<?php include '../CSSlinks.php';?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include '../navbar.php';?>
<!-- menu -->
  <?php include '../menu.php';?>
<!-- main editWord -->
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

// دریافت شناسه کلمه برای ویرایش
$id = $_GET['id'];
// دریافت اطلاعات کلمه قبل از ویرایش
$sql = "SELECT * FROM vocabulary WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $word = $row['word'];
    $translation = $row['translation'];
    $lesson_id = $row['lesson_id'];
} else {
    echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
    exit();
}

// در صورتی که فرم ویرایش ارسال شده باشد
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات از فرم
    $new_word = $_POST['word'];
    $new_translation = $_POST['translation'];
    $new_lesson_id = $_POST['lesson_id'];
     // اعتبارسنجی فقط برای عکس
     if ($_FILES['word_image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['word_image']['tmp_name'];
        $file_size = $_FILES['word_image']['size'];
        $file_type = $_FILES['word_image']['type'];

        // چک کردن اندازه و نوع فایل
        if ($file_size > 5242880) { // حداکثر حجم 5 مگابایت
            echo "<script>alert('حجم تصویر باید کمتر از 5 مگابایت باشد.')</script>";
            echo "<script>window.location.href = 'word.php';</script>";
            exit();
        }
        if ($file_type !== 'image/jpeg' && $file_type !== 'image/png') {
            echo "<script>alert('فرمت تصویر باید JPEG یا PNG باشد.')</script>";
            echo "<script>window.location.href = 'word.php';</script>";
            exit();
        }

        // ذخیره تصویر در مسیر مورد نظر
        $target_dir = "../../../../images/uploads/word/";
        $target_file = $target_dir . basename($_FILES['word_image']['name']);
        move_uploaded_file($file_tmp, $target_file);
                // به روزرسانی رکورد کلمه در جدول vocabulary
                $update_sql = "UPDATE vocabulary SET word = '$new_word', translation = '$new_translation', lesson_id = '$new_lesson_id', image = '$target_file' WHERE id = $id";
            } else {
                // فقط به روزرسانی بدون تغییر تصویر
                $update_sql = "UPDATE vocabulary SET word = '$new_word', translation = '$new_translation', lesson_id = '$new_lesson_id' WHERE id = $id";
            }
        
            if ($conn->query($update_sql) === TRUE) {
                echo "<script>alert('ویرایش واژه با موفقیت انجام شد.')</script>";
                echo "<script>window.location.href = 'word.php';</script>";
            } else {
                echo "<script>alert('خطا در ویرایش رکورد.')</script>";
            }
        }
        // بستن اتصال به پایگاه داده
$conn->close();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ویرایش لغت</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item"><a href="word.php">مدیریت واژگان</a></li>
                        <li class="breadcrumb-item active">ویرایش لغت</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section><!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">فرم ویرایش لغت</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="word">لغت</label>
                                <input type="text" class="form-control" id="word" name="word" value="<?php echo $word; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="translation">ترجمه</label>
                                <input type="text" class="form-control" id="translation" name="translation" value="<?php echo $translation; ?>" required>
                            </div>
                                      <!-- select -->
                                      <div class="form-group">
                                        <label>درس مد نظر خود را انتخاب کنید</label>
                                        <select class="form-control" name="lesson_id">
                                            <option value="1" <?php if ($lesson_id == 1) echo 'selected'; ?>>1</option>
                                            <option value="2" <?php if ($lesson_id == 2) echo 'selected'; ?>>2</option>
                                            <option value="3" <?php if ($lesson_id == 3) echo 'selected'; ?>>3</option>
                                            <option value="4" <?php if ($lesson_id == 4) echo 'selected'; ?>>4</option>
                                        </select>
                                    </div>
                                <!-- /select -->
                            <div class="form-group">
                                <label for="word_image">تصویر کلمه</label>
                                <input type="file" class="form-control" id="word_image" name="word_image">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ثبت تغییرات</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

 <!-- footer -->
 <?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>