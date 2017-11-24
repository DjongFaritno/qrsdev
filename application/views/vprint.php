<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
    <!-- <script src="<?php echo base_url(); ?>js/jsvprint.js"></script> -->
    <script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    </script>
<?php include_once('inc/css.php'); ?>

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/googlefont.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="mywindow.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-qrcode"></i> Laporan Scan Barang
          <small class="pull-right">Tanggal: <?php echo $tglnow; ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NO</th>
            <th>QRCODE</th>
            <th>TANGGAL</th>
            <th>USER</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <?php $no=1;
	foreach($transqr as $row) { ?>
            <td><?php echo $no;?></td>
            <td><?php echo $row['qrcode'];?></td>
            <td><?php echo $row['tgl'];?></td>
            <td><?php echo $row['userid'];?></td>
          </tr>
          <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
