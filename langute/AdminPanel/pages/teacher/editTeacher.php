<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | ویرایش استاد</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSSlinks -->
  <?php include '../CSSlinks.php';?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../navbar.php';?>

<?php include '../menu.php';?>

<!-- php code -->
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

    // دریافت شناسه استاد برای ویرایش
    $id = $_GET['id'];

    // دریافت اطلاعات استاد قبل از ویرایش
    $sql = "SELECT * FROM teacher WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $last_name = $row['last_name'];
        $expertise = $row['expertise'];
    } else {
        echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
        exit();
    }

    // در صورتی که فرم ویرایش ارسال شده باشد
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // دریافت اطلاعات از فرم
        $new_name = $_POST['name'];
        $new_last_name = $_POST['last_name'];
        $new_expertise = $_POST['expertise'];

        // اعتبارسنجی فقط برای عکس
        if ($_FILES['teacher_image']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['teacher_image']['tmp_name'];
            $file_size = $_FILES['teacher_image']['size'];
            $file_type = $_FILES['teacher_image']['type'];

            // چک کردن اندازه و نوع فایل
            if ($file_size > 5242880) { // حداکثر حجم 5 مگابایت
                echo "<script>alert('حجم تصویر باید کمتر از 5 مگابایت باشد.')</script>";
                echo "<script>window.location.href = 'teacher.php';</script>";
                exit();
            }
            if ($file_type !== 'image/jpeg' && $file_type !== 'image/png') {
                echo "<script>alert('فرمت تصویر باید JPEG یا PNG باشد.')</script>";
                echo "<script>window.location.href = 'teacher.php';</script>";
                exit();
            }

            // ذخیره تصویر در مسیر مورد نظر
            $target_dir = "../../../images/uploads/teacher/";
            $target_file = $target_dir . basename($_FILES['teacher_image']['name']);
            move_uploaded_file($file_tmp, $target_file);

            // به روزرسانی رکورد استاد در جدول teacher
            $update_sql = "UPDATE teacher SET name = '$new_name', last_name = '$new_last_name', expertise = '$new_expertise', image = '$target_file' WHERE id = $id";
        } else {
            // فقط به روزرسانی بدون تغییر تصویر
            $update_sql = "UPDATE teacher SET name = '$new_name', last_name = '$new_last_name', expertise = '$new_expertise' WHERE id = $id";
        }

        if ($conn->query($update_sql) === TRUE) {
            echo "<script>alert('ویرایش استاد با موفقیت انجام شد.')</script>";
            echo "<script>window.location.href = 'teacher.php';</script>";
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
                    <h1>ویرایش استاد</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item"><a href="teacher.php">استادان</a></li>
                        <li class="breadcrumb-item active">ویرایش استاد</li>
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
                        <h3 class="card-title">فرم ویرایش استاد</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="expertise">تخصص</label>
                                <input type="text" class="form-control" id="expertise" name="expertise" value="<?php echo $expertise; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="teacher_image">عکس استاد</label>
                                <input type="file" class="form-control" id="teacher_image" name="teacher_image">
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

<!-- **************************************************** -->
<?php include '../footer.php';?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>