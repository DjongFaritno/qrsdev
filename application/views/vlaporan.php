<script src="<?php echo base_url(); ?>js/jlaporan.js"></script>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
</script>
<div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- <h1>
          <?php echo $title; ?>
        </h1>    -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box">
            <div class="box-header">
              <i class="fa fa-server"></i><h3 class="box-title"><?php echo $title; ?></a>
              </h3>
              <div class="btn-group pull-right">
	              <button type="button" class="btn btn-primary btn-sm" id="btn_add_pengajuan" onclick="Backtohome()">
                  <i class=" glyphicon glyphicon-home"></i>&nbsp;
                </button>

	            </div>
            </div>
            <div class="box-body">
            <!-- #region pilih tanggal -->
            <div class="box box-primary">
            <!-- <div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div> -->
            <div class="box-body">
              <!-- Laporan Pertanggal -->
                <div class="form-group">
                    <label>Laporan Pertanggal</label>                    
                    <div class="input-group input-group-lg col-xs-3">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" type="text" data-date-format="yyyy-mm-dd" id="pertanggal" name="pertanggal">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-flat" onclick="PrintPertanggal()"><i class="fa fa-print" ></i></button>
                        </span>
                    </div>
                </div>
              <!-- /Laporan Pertanggal-->
              <!-- Laporan Perperiode -->
                <div class="form-group">
                    <label>Laporan Perperiode</label>                    
                    <div class="input-group input-group-lg col-xs-5">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" type="text" data-date-format="yyyy-mm-dd" id="perperiode_awal" name="perperiode_awal">
                    <input class="form-control" type="text" data-date-format="yyyy-mm-dd" id="perperiode_akhir" name="perperiode_akhir">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-warning btn-flat" onclick="PrintPerperiode()"><i class="fa fa-print" ></i></button>
                        </span>
                    </div>
                </div>
              <!-- /Laporan Perperiode-->
            </div>
            <!-- /.box-body -->
          </div>
            <!-- #endregion pilih tanggal -->
            </div>
        </div>
      </section>
      <!-- /.content -->
</div>