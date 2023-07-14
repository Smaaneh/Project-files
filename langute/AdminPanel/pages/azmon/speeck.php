<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مدیریت | آزمون گفتار</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSSlinks -->
<?php include '../CSSlinks.php';?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include '../navbar.php';?>

<?php include '../menu.php';?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>سوالات گفتار</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="../HomeAdmin.html">خانه</a></li>
              <li class="breadcrumb-item"><a href="azmon.html">آزمون</a></li>
              <li class="breadcrumb-item active">سوالات گفتار</li>
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
<!-- footer -->
<?php include '../footer.php';?>
<!-- JSlinks -->
  <?php include '../JSlinks.php';?>
</body>
</html>
