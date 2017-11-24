$(document).ready(function () {
    setTable();
});

function setTable() {
    // var datenow = $('#datenow').val();
    $('#tb_list').DataTable({
        processing: true,
        serverSide: true,
        bFilter: true,
        bInfo: false,
        paging: false,
        ajax: {
            'url': base_url + "print/load_grid/",
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
