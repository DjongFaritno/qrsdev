$(document).ready(function () {
    setTable();
    loadawal();
    $('#alert_save').hide();
    $('#alert_error').hide();
    //  $("#success-alert").hide();
    //         $("#myWish").click(function showAlert() {
    //             $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    //            $("#success-alert").slideUp(500);
    //             });   
    //         });
    // $(".datepicker").datepicker({ autoclose: true, maxDate: '0' });
});

function Backtohome() {
    window.location = base_url + 'dashboard';
}

function loadawal() {
    
    $('#qrcode1').attr('readonly',false);
    $('#qrcode2').attr('readonly',false);
    $('#qrcode1').val('');
    $('#qrcode2').val('');
    $('#qrcode2').attr('disabled',true);
    $('#icon_qrcode1').attr("class", 'fa');
    $('#form_qr1').attr("class", 'form-group');
    $('#icon_qrcode2').attr("class", 'fa');
    $('#form_qr2').attr("class", 'form-group');
    // refresh_table_data();
    $('#qrcode1').focus();
   
    
}


function validasi_qrcode1() {
    //cek sudah ada di database atau belum.
    var iform = $('#add_qrcode')[0];
    var data = new FormData(iform);
   
    // var tgl_pengajuan = $('#dtp_tgl_pengajuan').val();

    $.ajax({

        // type: "POST",
        // url: base_url + "pengajuan/get_data_pengajuan/" + no_pengajuan,
        // dataType: "html",
        // success: function (data) {
        type: "POST",
        url: base_url + "scanbarang/cek_trans_qrs",
        enctype: 'multipart/form-data',
        // dataType:"JSON",
        contentType: false,
        processData: false,
        data: data,
        success: function (data) {

            var data = $.parseJSON(data);
            if (data != null) {
                $('#icon_qrcode1').attr("class", 'fa fa-exclamation-circle');
                $('#form_qr1').attr("class", 'form-group has-error');
                $('#qrcode1').attr('readonly', false);
                    $("#alert_error").fadeTo(1000, 500).slideUp(500, function () {
                    $("#alert_error").slideUp(500);
                });  
                $('#qrcode1').val('');
                $('#qrcode1').focus();
            }
            else {

                $('#icon_qrcode1').attr("class", 'fa fa-check-circle');
                $('#form_qr1').attr("class", 'form-group has-success');
                $('#qrcode1').attr('readonly', true);
                $('#qrcode2').attr('disabled', false);
                $('#qrcode2').focus();  
            }
        }
    });

      
}

function validasi_qrcode2() {
    if ($('#qrcode1').val() != $('#qrcode2').val())
    {
        $('#icon_qrcode2').attr("class", 'fa fa-exclamation-circle');
        $('#form_qr2').attr("class", 'form-group has-error');
        $('#qrcode2').attr('readonly', false);
        $('#qrcode2').val('');
        $('#qrcode2').focus();
        
    }
    else if ($('#qrcode1').val() == $('#qrcode2').val())
    {
        $('#icon_qrcode2').attr("class", 'fa fa-check-circle');
        $('#form_qr2').attr("class", 'form-group has-success');
        $('#qrcode2').attr('readonly', true);
        simpan_scanned();
        
        // $('#qrcode4').attr('disabled', false);
        // $('#qrcode4').focus();  
        //save data
    }
    else
    {
        bootbox.alert("ada yang error, hubungi IT phone 122");
    }
    
}

function setTable() {
    // var datenow = $('#datenow').val();
    $('#tb_list').DataTable({
        processing: true,
        serverSide: true,
        bFilter: true,
        bInfo: false,
        paging: false,
        ajax: {
            'url': base_url + "scanbarang/load_grid",
            'type': 'GET',
            'data': function (d) {
                d.param = $('#hid_param').val();
            }
        },
        columnDefs: [
            { 
                width: 1, 
                targets: [0],       //action
                orderable: false
                
            },
            { width: 1, targets: 1 },
            { width: 1, targets: 2 },
            { width: 1, targets: 3 },
            {
                targets: [4],         //action
                orderable: false,
                width: 1
            }
        ],
        order: [[0, "desc"]],
        dom: "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'l><'col-sm-7'pi>>"
    });
}

function refresh_table_data()
{
    var table = $('#tb_list').DataTable();
        table.ajax.reload( null, false );
        table.draw();
}

function simpan_scanned()
{
    var iform = $('#add_qrcode')[0];
    var data = new FormData(iform);
    var msg="hasil scan sudah tersimpan";
    
    $.ajax({
        
        type:"POST",
        url:base_url+"scanbarang/save_trans_qrs",
        enctype: 'multipart/form-data',
        // dataType:"JSON",
        contentType: false,
        processData: false,
        data:data,
			success:function(data){
                refresh_table_data();
                // $('#alert_save').show();
                $("#alert_save").fadeTo(500, 500).slideUp(500, function(){
                $("#alert_save").slideUp(500);
                });   
                
                loadawal();
			}
		});
}

function hapus_scanned(id,qrcode)
{
    bootbox.confirm({
        size            : "small",
        title           : "<span class='fa fa-exclamation-triangle text-danger'></span>&nbsp;KONFIRMASI!!",
        message         : "Yakin hapus <b>"+qrcode+"<b>",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Tidak',
                className: 'btn-success'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Ya',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if(result==true){
                $.ajax({
			type:"POST",
			url:base_url+"scanbarang/del_trans_qrs/"+id,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil",
						size: 'small',
						callback: function () {

                            // window.location = base_url+'scanbarang';
                            refresh_table_data();
                            $('#qrcode1').focus();
						}
					});
				}
			});
            }
        }
	});


}

function Print(tglnow) 
{

    // window.location = base_url+'scanbarang/trans_print',_blank
    window.open(base_url+'scanbarang/trans_print/'+tglnow, 'blank'); 
}