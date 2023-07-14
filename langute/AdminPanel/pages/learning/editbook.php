<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | کتاب و داستان</title>
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
<!-- main editBook-->
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

  // دریافت شناسه کتاب برای ویرایش
  $id = $_GET['id'];
  // دریافت اطلاعات کتاب قبل از ویرایش
  $sql = "SELECT * FROM book WHERE id = $id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $Title = $row['Title'];
      $caption = $row['caption'];
      $Collection_name = $row['Collection_name'];
      $PDF = $row['PDF'];
  } else {
      echo "<script>alert('رکورد مورد نظر یافت نشد.')</script>";
      exit();
  }

  // در صورتی که فرم ویرایش ارسال شده باشد
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // دریافت اطلاعات از فرم
      $new_Title = $_POST['Title'];
      $new_caption = $_POST['caption'];
      $new_Collection_name = $_POST['Collection_name'];
      $new_PDF = $_POST['PDF'];

      // به روزرسانی رکورد کلمه در جدول book
      $update_sql = "UPDATE book SET Title = '$new_Title', caption = '$new_caption', Collection_name = '$new_Collection_name', PDF = '$new_PDF' WHERE id = $id";

      if ($conn->query($update_sql) === TRUE) {
          echo "<script>alert('ویرایش کتاب با موفقیت انجام شد.')</script>";
          echo "<script>window.location.href = 'book.php';</script>";
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
                      <h1>ویرایش کتاب</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-left">
                          <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                          <li class="breadcrumb-item"><a href="book.php">مدیریت کتاب و  داستان</a></li>
                          <li class="breadcrumb-item active">ویرایش کتاب</li>
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
                          <h3 class="card-title">فرم ویرایش کتاب</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="Title">عنوان</label>
                                  <input type="text" class="form-control" id="Title" name="Title" value="<?php echo $Title; ?>" required>
                              </div>

                              <div class="form-group">
                                  <label for="caption">کپشن</label>
                                  <input type="text" class="form-control" id="caption" name="caption" value="<?php echo $caption; ?>" required>
                              </div>
                              <!-- select -->
                              <div class="form-group">
                                  <label> (نام مجموعه)</label>
                                  <select class="form-control" name="Collection_name">
                                      <option value="Romance">عاشقانه</option>
                                      <option value="Science_fiction">علمی/تخیلی</option>
                                      <option value="Motivational">انگیزشی</option>
                                      <option value="Humer">طنز</option>
                                  </select>
                              </div>
                              <!-- /select -->
                              <!-- upload PDF -->
                              <div class="form-group">
                                  <label for="pdf">آپلود PDF</label>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="pdf" name="pdf" accept=".pdf">
                                          <label class="custom-file-label" for="pdf">کتاب</label>
                                      </div>
                                      <div class="input-group-append">
                                          <span class="input-group-text" id="">Upload</span>
                                      </div>
                                  </div>
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