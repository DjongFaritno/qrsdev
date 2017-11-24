<!DOCTYPE html>
<!-- بسم الله الرحمن الرحیم -->

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php require_once('inc/css.php'); ?>
  <link rel="shortcut icon" type="text/css" href="<?php echo base_url() ?>assets/img/header_logo.jpg" />
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title;?>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line pertanggal-->
          <ul class="timeline">
            <!-- copy from this -->
                <li class="time-label">
                  <span class="bg-olive">
                      23 Nov. 2017
                  </span>
                </li>
                <li>
                  <i class="glyphicon glyphicon-wrench bg-olive"></i>
                  <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">V 2.0</a></h3>
                      <div class="timeline-body">
                      -Pembuatan form user
                      <br>
                      -Pembuatan form login
                      </div>
                  </div>
                </li>                    
            <!-- copy from this -->
            <!-- copy from this -->
                <li class="time-label">
                  <span class="bg-maroon">
                      22 Nov. 2017
                  </span>
                </li>
                <li>
                  <i class="glyphicon glyphicon-check bg-maroon"></i>
                  <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">V 1.1</a></h3>
                      <div class="timeline-body">
                      -Penambahan pengecekan tidak bisa simpan hasil scan jika qrcode sudah ada didatabase
                      </div>
                  </div>
                </li>                    
            <!-- copy from this -->
                <li class="time-label">
                  <span class="bg-olive">
                      21 Nov. 2017
                  </span>
                </li>
                <li>
                  <i class="glyphicon glyphicon-wrench bg-olive"></i>
                  <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">V 1.0</a></h3>
                      <div class="timeline-body">
                      -Penambahan Print di form scanbarang
                      <br>
                      -Pembuatan Form Laporan
                      </div>
                  </div>
                </li>                    
            <!-- sampe sini -->
            <!-- copy from this -->
                <li class="time-label">
                  <span class="bg-olive">
                      16 Nov. 2017
                  </span>
                </li>
                <li>
                  <i class="glyphicon glyphicon-wrench bg-olive"></i>
                  <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">BETA VERSION 0.2.0</a></h3>
                      <div class="timeline-body">
                      -Pembuatan form scan barang
                      </div>
                  </div>
                </li>                    
            <!-- sampe sini -->
            <!-- copy from this -->
                <li class="time-label">
                  <span class="bg-orange">
                      15 Nov. 2017
                  </span>
                </li>
                <li>
                  <i class="glyphicon glyphicon-fire" style="color:#e44b08"></i>
                  <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">BETA VERSION 0.1.0 | HELLO WORLD</a></h3>
                      <div class="timeline-body">
                      -Pembuatan Design Aplikasi
                      <br>-Pembuatan Design Menu</br>
                      </div>
                  </div>
                </li>                    
            <!-- sampe sini -->
            <li>
            <i class="fa fa-clock-o bg-blue"></i>
            </li>
          </ul>
          <!-- end time line pertanggal -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
  <strong><small>Copyright &copy; 2017&nbsp;&nbsp;</small><a href="https://about.me/faritnozuliansyah" target="_blank"><small>PTRI IT-TEAM.</small></a></strong>
  </footer> -->
  <!-- Tambah the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->
<?php require_once('inc/js.php'); ?>
</body>
</html>
