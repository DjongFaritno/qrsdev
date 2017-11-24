$(document).ready(function () {
    setTable();
    loadawal();
    $('#alert_save').hide();
    $('#alert_error').hide();
    validate_add_user();
});

function Backtohome() {
    window.location = base_url + 'dashboard';
}

function loadawal() {
    $('#user_id').attr('readonly', false);
    $('#nama').attr('disabled', false);
    $('#privilege').attr('disabled', false);
    $('#password').attr('disabled', false);
    $('#confirm_password').attr('disabled', false);
    $('#btn_simpan').text('SIMPAN');
    $('#user_id').val('');
    $('#nama').val('');    
    $('#password').val('');    
    $('#confirm_password').val('');    
    clearValidate_add_user();
    $('#user_id').focus();
   
    
}

var validate_add_user = function () {

    var form = $('#add_user');
    var error2 = $('.alert-danger', form);
    var success2 = $('.alert-success', form);

    form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        // rules: {
        // 	txt_da_nama: {                    
        // 		required: true
        // 	},
        // 	txt_da_pendidikan: {
        // 		required: true
        // 	},
        // 	dtp_da_birth: {
        // 		required: true
        // 	},
        // },

        invalidHandler: function (event, validator) { //display error alert on form submit              
            success2.hide();
            error2.show();
            App.scrollTo(error2, -200);
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            var icon = $(element).parent('.input-icon').children('i');
            icon.removeClass('fa-check').addClass("fa-warning");
            icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var icon = $(element).parent('.input-icon').children('i');
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            icon.removeClass("fa-warning").addClass("fa-check");
        },

        submitHandler: function (form) {
            success2.show();
            error2.hide();
            form[0].submit(); // submit the form
        }
    });
}

function clearValidate_add_user() {

    $("#add_user div").removeClass('has-error');
    $("#add_user i").removeClass('fa-warning');

    $("#add_user div").removeClass('has-success');
    $("#add_user i").removeClass('fa-check');

    document.getElementById("add_user").reset();
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
            'url': base_url + "user/load_grid",
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
            { width: 3, targets: 1 },
            { width: 8, targets: 2 },
            { width: 5, targets: 3 },
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

function refresh_table()
{
    var table = $('#tb_list').DataTable();
        table.ajax.reload( null, false );
        table.draw();
}

function simpan_user()
{
    // var privilege = "<?php echo $this->session->userdata('logged_in')['privilege'];?>";
    
    if ($("#add_user").valid() == true) {
        // //cek duplicate entri
        var status_data = $('#btn_simpan').text();
        // var str_url = encodeURI(base_url + "user/cek_ms_user");
        var iform = $('#add_user')[0];
        var data = new FormData(iform);
        if ($('#password').val() != $('#confirm_password').val())
        {
            bootbox.alert("password dan konfirmasi password tidak sama")
            return false;
        }
        if (status_data == 'SIMPAN' && privilege == 'ADMIN')
        {
            $.ajax({

                type: "POST",
                url: base_url + "user/cek_ms_user",
                enctype: 'multipart/form-data',
                // dataType:"JSON",
                contentType: false,
                processData: false,
                data: data,
                success: function (data) {
                    $data = $.parseJSON(data);
                    if ($data != null) {
                        $("#alert_error").fadeTo(500, 500).slideUp(500, function () {
                            $("#alert_error").slideUp(500);
                        });
                        exit();
                    }
                    else {
                        //simpan
                        var iform = $('#add_user')[0];
                        var data = new FormData(iform);

                        $.ajax({

                            type: "POST",
                            url: base_url + "user/save_ms_user/" + status_data,
                            enctype: 'multipart/form-data',
                            // dataType:"JSON",
                            contentType: false,
                            processData: false,
                            data: data,
                            success: function (data) {
                                // $('#alert_save').show();
                                $("#alert_save").fadeTo(500, 500).slideUp(500, function () {
                                    $("#alert_save").slideUp(500);
                                });
                                refresh_table();
                                loadawal();
                            }
                        });
                    }
                }
            });
        }
        else if (status_data == 'PERBAHARUI')
        {
            //simpan
            var iform = $('#add_user')[0];
            var data = new FormData(iform);
    
            $.ajax({
    
                type: "POST",
                url: base_url + "user/save_ms_user/" + status_data,
                enctype: 'multipart/form-data',
                // dataType:"JSON",
                contentType: false,
                processData: false,
                data: data,
                success: function (data) {
                    // $('#alert_save').show();
                    $("#alert_save").fadeTo(500, 500).slideUp(500, function () {
                        $("#alert_save").slideUp(500);
                    });
                    refresh_table();
                    loadawal();
                }
            });
        }
        else {
            bootbox.alert("ANDA BUKAN ADMIN")
            return false;
        }
        // else
        // {
        //     //simpan
        //     var iform = $('#add_user')[0];
        //     var data = new FormData(iform);

        //     $.ajax({

        //         type: "POST",
        //         url: base_url + "user/save_ms_user/" + status_data,
        //         enctype: 'multipart/form-data',
        //         // dataType:"JSON",
        //         contentType: false,
        //         processData: false,
        //         data: data,
        //         success: function (data) {
        //             $("#alert_save").fadeTo(500, 500).slideUp(500, function () {
        //                 $("#alert_save").slideUp(500);
        //             });
        //             refresh_table();
        //             loadawal();
        //         }
        //     });
        // }
        
        
        
    }
}

function edit_user(id,user_id,status)
{
    
    var str_url = encodeURI(base_url + "user/get_ms_user/" + id);
    $.ajax({

        type: "POST",
        url: str_url,
        dataType: "html",
        success: function (data) {

            var data = $.parseJSON(data);
            loadawal();
            $('#user_id').val(data['username']);
            if (status == 'user')
            {
                $('#password').attr('disabled', true);
                $('#confirm_password').attr('disabled', true);
                $('#nama').attr('disabled', false);
                
                if (privilege != 'ADMIN') {
                    $('#privilege').attr('disabled', true);
                }
                else
                {
                    $('#privilege').attr('disabled', false);
                }

            }
            else if (status == 'pass') 
            {
                $('#password').attr('disabled', false);
                $('#confirm_password').attr('disabled', false);
                $('#nama').attr('disabled', true);
                $('#privilege').attr('disabled', true);

            }
            $('#nama').val(data['nama']);   
            $('#privilege').val(data['privilege']);   
            $('#user_id').attr('readonly', true);
            
            $('#btn_simpan').text('PERBAHARUI');


        }
    });
}

function hapus_user(id,user_id)
{
    bootbox.confirm({
        size            : "small",
        title           : "<span class='fa fa-exclamation-triangle text-danger'></span>&nbsp;KONFIRMASI!!",
        message         : "Yakin hapus <b>"+user_id+"<b>",
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
			url:base_url+"user/del_ms_user/"+id,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil",
						size: 'small',
						callback: function () {

                            // window.location = base_url+'scanbarang';
                            refresh_table();
                            $('#user_id').focus();
						}
					});
				}
			});
            }
        }
	});


}
