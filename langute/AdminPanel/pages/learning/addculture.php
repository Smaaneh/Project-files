<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | افزودن رفتار/آداب</title>
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
            <h1>افزودن رفتار/آداب</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item"><a href="culture.php">مدیریت رفتاروآداب</a></li>
              <li class="breadcrumb-item active">افزودن رفتار/آداب</li>
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
              <h3 class="card-title">فرم  رفتاروآداب</h3>
            </div>
             <!-- form start -->
             <form role="form" method="post" action="process_culture.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">عنوان:</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="عنوان  را وارد کنید ...">
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
            <!-- content culture -->
            <div class="card-body">
              <div class="mb-3">
              <label for="title">متن:</label>
                <textarea id="content" name="content" style="width: 100%">لطفا متن مورد نظر خودتان را وارد کنید</textarea>
              </div>
            </div>
          </div>
           <!-- image culture -->
            <div class="form-group">
                    <label for="image">آپلود عکس</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">عکس را انتخاب کنید</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-success btn-lg" name="submit">ثبت </button>
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
