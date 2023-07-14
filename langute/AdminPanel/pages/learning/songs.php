<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | موسیقی</title>
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
<!-- main SONGS-->
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

  // دریافت اطلاعات از جدول songs
  $sql = "SELECT * FROM songs";
  $result = $conn->query($sql);

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>مدیریت موسیقی و پادکست</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-left">
                          <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
                          <li class="breadcrumb-item active">موسیقی</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <a class="btn btn-success btn-lg" href="addsongs.php">افزودن موسیقی جدید +</a>
                      <div class="card-header">
                          <h3 class="card-title">لیست کل موسیقی ها</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>عنوان</th>
                                      <th>کپشن</th>
                                      <th>نوع موسیقی یا پادکست</th>
                                      <th>عملیات</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                  // نمایش رکوردهای جدول songs
                                  if ($result->num_rows > 0) {
                                      while ($row = $result->fetch_assoc()) {
                                          echo "<tr>";
                                          echo "<td>" . $row['Title'] . "</td>";
                                          echo "<td>" . $row['caption'] . "</td>";
                                          echo "<td>" . $row['Collection_name'] . "</td>";
                                          echo "<td><a href='editsongs.php?id=" . $row['id'] . "' class='btn btn-block btn-info btn-sm'>ویرایش</a></td>";
                                          echo "<td><a href='deletesongs.php?id=" . $row['id'] . "' class='btn btn-block btn-danger btn-sm' onclick='confirmDelete(" . $row['id'] . ");'>حذف</a></td>";
                                          echo "</tr>";
                                      }
                                  } else {
                                      echo "<tr><td colspan='4'>هیچ رکوردی یافت نشد</td></tr>";
                                  }
                                  ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th>عنوان</th>
                                      <th>کپشن</th>
                                      <th>نوع موسیقی یا پادکست</th>
                                      <th>عملیات</th>
                                  </tr>
                              </tfoot>
                          </table>
  </div>
                      <!-- /.card-body -->
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
  <script>
      function confirmDelete(id) {
          var result = confirm("آیا میخواهید این موسیقی حذف شود؟");
          if (result) {
              // اگر کاربر تایید کرد، ارسال درخواست حذف به صفحه deletesongs.php
              window.location.href = "deletesongs.php?id=" + id;
          } else {
              console.log("حذف رکورد لغو شد.");
          }
      }
  </script>

  <?php
  // بستن اتصال به پایگاه داده
  $conn->close();
  ?>
<!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>