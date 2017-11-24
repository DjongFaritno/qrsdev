<?php
$privilege = $this->session->userdata('logged_in')['privilege'];
if ($privilege=='ADMIN') {
  $Linknya = '';
}else{
  $Linknya = 'display:none';
}
 ?>
 <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $title; ?>
        </h1>   
      </section>

      <!-- Main content -->
      <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">MENU UTAMA</a>
              </h3>
            </div>
            <div class="box-body">
              <!-- #region menu -->
                <a href="<?php echo base_url(); ?>ScanBarang" class="btn btn-block btn-social btn-google">
                  <i class="glyphicon glyphicon-qrcode"></i> <h3>SCAN BARANG</h3>
                </a>
                <a href="<?php echo base_url(); ?>Laporan" class="btn btn-block btn-social btn-dropbox">
                  <i class="glyphicon glyphicon-print"></i> <h3>LAPORAN </h3>
                </a>
                <a href="<?php echo base_url(); ?>User" class="btn btn-block btn-social btn-tumblr" style="<?php echo $Linknya; ?>">
                  <i class="glyphicon glyphicon-user"></i> <h3>MASTER USER </h3>
                </a>
              <!-- #endregion menu -->
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>