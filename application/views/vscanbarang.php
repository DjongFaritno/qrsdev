<script src="<?php echo base_url(); ?>js/jscanbaranag.js"></script>

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
              <i class="glyphicon glyphicon-qrcode"></i> <h3 class="box-title"><?php echo $title." ".'<b>'.$kategori.'</b>'; ?></a>
              </h3>
              <div class="btn-group pull-right">
	              <button type="button" class="btn btn-primary btn-sm" id="btn_add_pengajuan" onclick="Backtohome()">
                  <i class=" glyphicon glyphicon-home"></i>&nbsp;
                </button>

	            </div>
            </div>
            <div class="box-body">
              <!-- #region body -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">                  
                  </h3>
                </div>
                <!-- #region body -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-body">
                          <div class="form-body">
                            <!-- BEGIN FORM-->
                            <form action="#" id="add_qrcode" enctype="multipart/form-data">
                              <!--inputbox-->
                                <input class="hidden" type="text" name="kategori" id="kategori" value="<?php echo $kategori; ?>">
                                <!--span-->
                                <div id="form_qr1" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>QR CODE 1</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <input class="form-control pull-right" type="text" name="qrcode1" id="qrcode1" onchange="validasi_qrcode1()">
                                    <div class="input-group-addon">
                                      <i id="icon_qrcode1" class="fa"></i>
                                    </div>    
                                  </div>
                                </div>
                                <!--span-->
                                <!--span-->
                                <div id="form_qr2" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>QR CODE 2</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <input class="form-control pull-right" type="text" name="qrcode2" id="qrcode2" onchange="validasi_qrcode2()">
                                    <div class="input-group-addon">
                                      <i id="icon_qrcode2" class="fa"></i>
                                    </div>    
                                  </div>
                                </div>
                                <!--span-->
                                <!--end inputbox-->                            
                          </div>
                          <div class="box-footer">
                            <div id="alert_save" class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4><i class="icon fa fa-check-circle"></i> TERSIMPAN!</h4>
                            </div>
                            <div id="alert_error" class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4><i class="icon fa fa-exclamation-circle "></i> QRCODE SUDAH ADA!!</h4>
                            </div>
                          </div>
                            </form>
                              <!-- END FORM-->
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //table -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Horizontal Form</h3> -->
                </div>
                <!-- #region body -->
                <div class="row">
                  <div class="col-md-12">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet box box-blue">
                        <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                          <button class="btn btn-danger" type="button" onclick="Print('<?php echo $tglnow; ?>')">
                              <i class="fa "></i>&nbsp;CETAK&nbsp;
                          </button>
                          <button class="btn" type="button" onclick="refresh_table_data()">
                              <i class="fa fa-spinner"></i>&nbsp;TABLE&nbsp;
                          </button>
                        </div>
                      <div class="portlet-title">
                          <div class="caption">
                              <h4><i class="glyphicon glyphicon-list"></i> DATA SCANNED TANGGAL <?php echo $tglnow; ?></h4>
                          </div>
                          
                      </div>
                      <input type="text" name="hid_param" id="hid_param" class="hidden" />
                      <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="tb_list">
                              <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>QR CODE</th>
                                      <th>TANGGAL</th>
                                      <th>USER</th>
                                      <th>ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td colspan="5" align="center">
                                          Tidak ada data ditemukan.
                                      </td>
                                  </tr>
                              </tbody>
                              <!-- <tfoot>
                                  <tr>
                                  </tr>
                              </tfoot> -->
                          </table>
                      </div>
                      </div>
                      <!-- END EXAMPLE TABLE PORTLET-->
                  </div>
                </div>
              </div>
              <!-- endtable -->
            </div>
        </div>
      </section>
      <!-- /.content -->
</div>