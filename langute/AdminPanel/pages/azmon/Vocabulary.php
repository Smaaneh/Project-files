<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت| آزمون واژگان</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../../dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../navbar.php';?>
<?php include '../menu.php';?>
<!-- **************************************************** -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>سوالات واژگان</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
            <li class="breadcrumb-item"><a href="teacher.html">آزمون</a></li>
            <li class="breadcrumb-item active">سوالات واژگان</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   <div class="col-lg-6 offset-lg-3 col-12">
  <!-- select -->
  <div class="form-group">
    <label>سوال مد نظر خود را انتخاب کنید</label>
    <select class="form-control">
      <option>سوال 1</option>
      <option>سوال 2</option>
      <option>سوال 3</option>
      <option>سوال 4</option>
      <option>سوال 5</option>
    </select>
  </div>
  <!-- text input -->

   <div class="form-group">
     <label>عنوان سوال</label>
     <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ...">
   </div>


 <!-- input option -->
 <div class="form-group has-success">
   <label class="control-label text-success" for="inputSuccess"><i class="fa fa-check"></i>سوال درست</label>
   <input type="text" class="form-control" id="inputSuccess" placeholder="وارد کردن اطلاعات ...">
 </div>

 <div class="form-group has-error">
   <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>سوال غلط</label>
   <input type="text" class="form-control" id="inputError" placeholder="وارد کردن اطلاعات ...">
 </div>

 <div class="form-group has-error">
   <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>سوال غلط</label>
   <input type="text" class="form-control" id="inputError" placeholder="وارد کردن اطلاعات ...">
 </div>

 <div class="form-group has-error">
   <label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>سوال غلط</label>
   <input type="text" class="form-control" id="inputError" placeholder="وارد کردن اطلاعات ...">
 </div>
<!-- button -->
 <button type="button" class="btn btn-block btn-success btn-sm">افزودن</button>
 <button type="button" class="btn btn-block btn-primary btn-sm">ویرایش</button>
 <button type="button" class="btn btn-block btn-danger btn-sm">حذف</button>

</div>
</div>





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
