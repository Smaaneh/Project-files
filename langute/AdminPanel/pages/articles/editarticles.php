<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | ویرایش مقالات</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSSlinks -->
 <?php include '../CSSlinks.php';?>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 <!-- Navbar -->
 <?php include '../navbar.php';?>
<!-- menu -->
  <?php include '../menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ویرایش مقالات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item"><a href="articles.php">مدیریت مقالات</a></li>
              <li class="breadcrumb-item active">ویرایش مقالات</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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

    // دریافت شناسه مقاله برای ویرایش
    $id = $_GET['id'];

    // دریافت اطلاعات مقاله قبل از ویرایش
    $sql = "SELECT * FROM articles WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $created_at = $row['created_at'];
    } else {
        echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
        exit();
    }

    // در صورتی که فرم ویرایش ارسال شده باشد
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // دریافت اطلاعات از فرم
        $new_title = $_POST['title'];
        $new_content = $_POST['content'];
        $new_created_at = $_POST['created_at'];
 // به روزرسانی رکورد مقاله در جدول articles
 $update_sql = "UPDATE articles SET name = '$new_title', content = '$new_content', created_at = '$new_created_at', image = '$target_file' WHERE id = $id";
 if ($conn->query($update_sql) === TRUE) {
    echo "<script>alert('ویرایش مقاله با موفقیت انجام شد.')</script>";
    echo "<script>window.location.href = 'articles.php';</script>";
} else {
    echo "<script>alert('خطا در ویرایش رکورد.')</script>";
}
}

// بستن اتصال به پایگاه داده
$conn->close();
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">فرم  مقالات</h3>
            </div>
             <!-- form start -->
             <form role="form" method="post" action="process_article.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">عنوان:</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="عنوان مقاله را وارد کنید ...">
                </div>
            <!-- /.card-header -->
                <!-- Date range -->
                <div class="form-group">
                  <label>انتخاب تاریخ:</label>
                      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
        <input class="normal-example form-control" id="created_at" name="created_at" />
    </div>
                  <!-- /.input group -->
                </div>
            <!-- content articles -->
            <div class="card-body">
              <div class="mb-3">
              <label for="title">متن مقاله :</label>
                <textarea id="content" name="content" style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
              </div>
            </div>
          </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg" name="submit">ویرایش مقاله</button>
                <p class="text-sm mb-0">مشاهده مستندات مربوط به این ویرایشگر متن <a href="https://ckeditor.com/ckeditor-5-builds/#classic">CKEditor</a>
              </p>
              </div>
          </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <!-- /.content-wrapper -->
  <!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
<?php include '../JSlinks.php';?>

<!-- CK Editor -->
<script src="../../plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="content"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#content'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

      $('.textarea').wysihtml5({
          toolbar: { fa: true }
      })
  })
</script>
<script>
    $(function () {
        $('.normal-example').persianDatepicker({
            format: 'YYYY/MM/DD HH:mm:ss',
            initialValueType: 'gregorian'
        });
    });

    function submitForm() {
        var title = $("#title").val();
        var created_at_persian = $("#created_at").val(); // تاریخ شمسی دریافت شده از PersianDatepicker

        // تبدیل تاریخ شمسی به تاریخ میلادی
        var created_at_gregorian = new persianDate(created_at_persian).toCalendar('gregorian').toLocale('en').format('YYYY-MM-DD HH:mm:ss');
    }
</script>
</body>
</html>
