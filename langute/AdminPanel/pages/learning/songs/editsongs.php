<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | ویرایش موسیقی</title>
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
$sql = "SELECT * FROM songs WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $caption = $row['caption'];
    $music = $row['music'];
} else {
    echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
    exit();
}

// در صورتی که فرم ویرایش ارسال شده باشد
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات از فرم
    $new_title = $_POST['title'];
    $new_caption = $_POST['caption'];
    $new_music = $_POST['music'];

    // به روزرسانی رکورد کلمه در جدول songs
    $update_sql = "UPDATE songs SET title = '$new_title', caption = '$new_caption', music = ' $new_music' WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('ویرایش گفتار با موفقیت انجام شد.')</script>";
        echo "<script>window.location.href = 'songs.php';</script>";
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
                    <h1>ویرایش موسیقی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="../../HomeAdmin.html">خانه</a></li>
                        <li class="breadcrumb-item"><a href="songs.php">مدیریت موسیقی</a></li>
                        <li class="breadcrumb-item active">ویرایش موسیقی</li>
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
                        <h3 class="card-title">فرم ویرایش موسیقی</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="caption">کپشن</label>
                                <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" required>
                            </div>
                                <!-- select -->
                                <div class="form-group">
                                <label>نوع موسیقی یا پادکست را انتخاب کنید</label>
                                <select class="form-control" name="Collection_name">
                                <option value="comedy" <?php if ($Collection_name == 'comedy') echo 'selected'; ?>>کمدی</option>
                                    <option value="Animation" <?php if ($Collection_name == 'Animation') echo 'selected'; ?>>انیمیشن</option>
                                    <option value="action" <?php if ($Collection_name == 'action') echo 'selected'; ?>>اکشن</option>
                                    <option value="drama" <?php if ($Collection_name == 'drama') echo 'selected'; ?>>درام</option>
                                </select>
                            </div>
                            <!-- /select -->
                            <div class="form-group">
                                <label for="music">موسیقی</label>
                                <input type="file" class="form-control" id="music" name="music">
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
<!--footer -->
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