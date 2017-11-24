<script src="<?php echo base_url(); ?>js/juser.js"></script>
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
              <i class="glyphicon glyphicon-qrcode"></i> <h3 class="box-title"><?php echo $title; ?></a>
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
                            <form action="#" id="add_user" enctype="multipart/form-data">
                              <!--inputbox-->
                                <!--span-->
                                <div id="form_qr1" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>UserID</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <i class="fa"></i><input class="form-control pull-right" maxlength="5"  type="text" name="user_id" id="user_id" required>
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
                                              <b>Nama</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <input class="form-control pull-right" type="text" maxlength="25" name="nama" id="nama"  required>
                                    <div class="input-group-addon">
                                      <i id="icon_qrcode2" class="fa"></i>
                                    </div>    
                                  </div>
                                </div>
                                <!--span-->
                                <!--span-->
                                <div id="form_qr2" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>PRIVILEGE</b>
                                    </i>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="privilege" required id="privilege">
                                      <option value="" selected="selected"></option>
                                      <option value="ADMIN">ADMIN</option>
                                      <option value="USER">USER</option>
                                      </select>
                                   
                                  </div>
                                </div>
                                <!--span-->
                                <!--span-->
                                <div id="form_qr2" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>Password</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <input class="form-control pull-right" type="password" maxlength="10"  name="password" id="password" required>
                                    <div class="input-group-addon">
                                      <i id="icon_qrcode2" class="fa"></i>
                                    </div>    
                                  </div>
                                </div>
                                <!--span-->
                                <!--span-->
                                <div id="form_qr2" class="form-group">
                                  <div class="input-group">
                                    <i class="input-group-addon">
                                              <b>Konfirmasi Password</b>
                                    </i>
                                    <!-- <input class="form-control pull-right" id="datepicker" type="text"> -->
                                    <input class="form-control pull-right" type="password" name="confirm_password" id="confirm_password" required>
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
                              <h4><i class="icon fa fa-exclamation-circle "></i> USER ID SUDAH ADA!!</h4>
                            </div>
                            <div class="btn-group btn-group-sm button-tools pull-left" style="padding-top: 7px">
                          <button class="btn btn-info" type="button" onclick="loadawal()">
                              BATAL
                          </button>
                        </div>
                        <div  class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                          <button id="btn_simpan" class="btn btn-success" type="button" onclick="simpan_user()">
                              SIMPAN
                          </button>
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
              <div class="box box-danger">
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Horizontal Form</h3> -->
                </div>
                <!-- #region body -->
                <div class="row">
                  <div class="col-md-12">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet box box-blue">    
                      <!-- <div class="btn-group btn-group-sm button-tools pull-right" style="padding-top: 7px">
                          <button class="btn btn-danger" type="button" onclick="add_user()">
                              <h5>+ <i class="fa fa-user"></i></h5>
                          </button>
                        </div> -->
                      <div class="portlet-title">
                          <div class="caption">
                              <h4><i class="glyphicon glyphicon-list"></i> LIST USER </h4>
                          </div>
                          
                      </div>
                      <input type="text" name="hid_param" id="hid_param" class="hidden" />
                      <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="tb_list">
                              <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>USER ID</th>
                                      <th>NAMA</th>
                                      <th>PRIVILEGE</th>
                                      <th>ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td colspan="4" align="center">
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