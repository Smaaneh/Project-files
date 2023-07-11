<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>افزودن موسیقی جدید</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../../../dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../../../dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"style="color:#05C46B;"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../HomeAdmin.html" class="brand-link">
      <img src="../../../dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>آموزش ها و درس ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../index.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>واژگان</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../index2.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>گرامر</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../index3.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>مکالمه</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../index3.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>گفتار</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-pie-chart"></i>
                <p>یادگیری
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="charts/chartjs.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>موسیقی/پادکست</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="charts/flot.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>فیلم/کارتن</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="charts/inline.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>رفتار/آداب</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="charts/inline.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>کتاب/داستان</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header"></li>
            <li class="nav-item">
              <a href="calendar.html" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  مقالات
                </p>
              </a>
            </li>
           <li class="nav-item">
              <a href="teacher.html" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                <p>
                  استادان
                </p>
              </a>
            </li>
            <li class="nav-item">
               <a href="azmon.html" class="nav-link">
                   <i class="nav-icon fa fa-dashboard"></i>
                 <p>
                  آزمون
                 </p>
               </a>
             </li>

            <li class="nav-header">ارتباط با کاربران</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-envelope-o"></i>
                <p>
                  ایمیل‌ باکس
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="mailbox/mailbox.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اینباکس</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mailbox/compose.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ایجاد</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mailbox/read-mail.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>خواندن</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- **************************************************** -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>افزودن موسیقی</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
              <li class="breadcrumb-item"><a href="songs.php">مدیریت موسیقی</a></li>
              <li class="breadcrumb-item active">افزودن گفتار</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">فرم افزودن گفتار</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="عنوان خود را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="caption">کپشن</label>
                                <input type="text" class="form-control" id="caption" name="caption"
                                    placeholder="کپشن را وارد کنید">
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>درس مد نظر خود را انتخاب کنید</label>
                                <select class="form-control" name="cours">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <!-- upload music -->
                            <div class="form-group">
                                <label for="music">آپلود موسیقی یا پادکست</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="music" name="music">
                                        <label class="custom-file-label" for="music">موسیقی یا پادکست </label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success" name="submit">ثبت</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.card-body -->
</section>
<!-- /.content -->
</body>

</html>

<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "langute";
// اتصال به دیتابیس
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
}

// دریافت داده‌ها از فرم و ذخیره در دیتابیس
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // بررسی پر بودن تمام فیلدها
  if (
      empty($_POST["title"]) ||
      empty($_POST["caption"]) ||
      empty($_FILES["music"]["name"])
  ) {
      echo '<div class="alert alert-warning text-center mb-3">لطفاً تمام فیلدها را پر کنید و یک فایل صدا انتخاب کنید.</div>';
  } else {
      $title = $_POST["title"];
      $caption = $_POST["caption"];
      $music = $_FILES["music"]["name"];

      // محدودیت‌های مربوط به موزیک
      $targetDir = "../../../../songs/uploads/songs/";
      $targetFile = $targetDir . basename($_FILES["music"]["name"]);
      $musicFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      $maxFileSize = 20 * 1024 * 1024; // حداکثر سایز ویدیو: 20

      // بررسی پسوند موزیک
      $allowedExtensions = array("mp3", "RAW", "WAV", "WMA", "AAC", "OGG");
      if (!in_array($musicFileType, $allowedExtensions)) {
          echo '<div class="alert alert-danger text-center mb-3">فقط فایل‌های با پسوند "mp3", "RAW", "WAV", "WMA", "AAC", "OGG" مجاز هستند.</div>';
      }
      // بررسی سایز موزیک
      elseif ($_FILES["music"]["size"] > $maxFileSize) {
          echo '<div class="alert alert-danger text-center mb-3">سایز فایل ویدیو باید کمتر از 20 باشد.</div>';
      }
      // آپلود موزیک
      else {
          if (move_uploaded_file($_FILES["music"]["tmp_name"], $targetFile)) {
              // استفاده از prepared statement برای جلوگیری از حمله‌های اینجکشن
              $stmt = $conn->prepare("INSERT INTO songs (title, caption, music) VALUES (?, ?, ?)");
              $stmt->bind_param("sss", $title, $caption, $targetFile);

              if ($stmt->execute()) {
                  echo '<div class="alert alert-success text-center mb-3">اطلاعات با موفقیت ذخیره شدند.</div>';
              } else {
                  echo '<div class="alert alert-danger text-center mb-3">خطا در ذخیره اطلاعات: ' . $stmt->error . '</div>';
              }

              $stmt->close();
          } else {
              echo '<div class="alert alert-danger text-center mb-3">خطا در آپلود موزیک.</div>';
          }
      }
  }
}

$conn->close();
?>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="float-right d-none d-sm-block">
 صفحه ادمین لنگوته
</div>

<strong>CopyLeft &copy; 2018<a href="http://github.com/smaaneh/">سمانه محمدی و نرگس افراز</a>.</strong>
</footer>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>
