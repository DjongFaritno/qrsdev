$(document).ready(function () {

    $('#pertanggal').datepicker({
        autoclose: true,
        dateFormat: 'yyyy-mm-dd',
    })
    $('#perperiode_awal').datepicker({
        autoclose: true,
        dateFormat: 'yyyy-mm-dd',
    })
    $('#perperiode_akhir').datepicker({
        autoclose: true,
        dateFormat: 'yyyy-mm-dd',
    })
});

function Backtohome() {
    window.location = base_url + 'dashboard';
}



function PrintPertanggal() 
{
    var pertanggal  = $('#pertanggal').val();
    if (pertanggal == '') {
        bootbox.alert({
            title: "PERHATIAN!!",
            message: "pilih tanggal dulu!",
            className: 'bb-alternate-modal'
        });     
    }
    else
    {
        window.open(base_url +'laporan/print_pertanggal/'+pertanggal, 'blank'); 
    }
}

function PrintPerperiode() 
{
    var perperiode_awal = $('#perperiode_awal').val();
    var perperiode_akhir = $('#perperiode_akhir').val();
    if (perperiode_awal == '' || perperiode_akhir == '') {
        bootbox.alert({
            title: "PERHATIAN!!",
            message: "pilih tanggal periode dulu!",
            className: 'bb-alternate-modal'
        });            
    }
    else
    {
        window.open(base_url + 'laporan/print_perperiode/' + perperiode_awal + '/' + perperiode_akhir, 'blank'); 
    }
}