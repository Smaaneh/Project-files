<!DOCTYPE html>
<html dir="rtl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | آزمون</title>
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
<!-- main AZMON-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-6">
            <h1 class="m-0 text-dark">صفحه آزمون</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
              <li class="breadcrumb-item active">صفحه آزمون</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <!-- /.card -->
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title mb-2 text-bold"> <a href="  QVocabulary.PHP" class="card-link mr-2">بخش واژگان</a></h5>

                <p class="card-text">برای مشاهده ، ویرایش ، افزودن  و حذف سوالات این بخش بر روی متن بالا کلیک کنید</p>
              </div>
            </div>
            <!-- /.card -->
           <div class="card card-primary card-outline">
             <div class="card-body">
               <h5 class="card-title mb-2 text-bold"> <a href="Qgrammar.php" class="card-link mr-2">بخش گرامر</a></h5>

               <p class="card-text">برای مشاهده ، ویرایش ، افزودن  و حذف سوالات این بخش بر روی متن بالا کلیک کنید</p>
             </div>
           </div>
           <!-- /.card -->
          <div class="card card-primary card-outline">
            <div class="card-body">
              <h5 class="card-title mb-2 text-bold"> <a href="Qspeeck.php" class="card-link mr-2">بخش گفتار</a></h5>

              <p class="card-text">برای مشاهده ، ویرایش ، افزودن  و حذف سوالات این بخش بر روی متن بالا کلیک کنید</p>
            </div>
          </div>
          <!-- /.card -->
         <div class="card card-primary card-outline">
           <div class="card-body">
             <h5 class="card-title mb-2 text-bold"> <a href="QConversation.php" class="card-link mr-2">بخش مکالمه</a></h5>

             <p class="card-text">برای مشاهده ، ویرایش ، افزودن  و حذف سوالات این بخش بر روی متن بالا کلیک کنید</p>
           </div>
         </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>
