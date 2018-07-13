$(document).ready(function () {


});


function teste() {
    var retorno
    $.ajax({
        url: "/ajax/operacional/testeee",
        dataType: 'JSON',
        type: 'GET',
        async: false,
        success: function (response) {
            retorno = response;
        }
    });
    return retorno;
}


function CarregaTeste() {
    var exists = $.fn.dataTable.isDataTable('#tup_cadastro_micro_datatable');
    if (exists === true) {
        //Destroy a tabela se ela existir
        $('#tup_cadastro_micro_datatable').DataTable().destroy();
    }


    var uf = CorrigeVar($('#tup_cadastro_micro_uf').val());
    var loc = CorrigeVar($('#tup_cadastro_micro_loc').val());
    var est = CorrigeVar($('#tup_cadastro_micro_est').val());
    var ard = CorrigeVar($('#tup_cadastro_micro_ard').val());
    var terminal = CorrigeVar($('#tup_cadastro_micro_terminal').val());
    var tecnico = CorrigeVar($('#tup_cadastro_micro_tecnico').val());

    $('#tup_cadastro_micro_datatable').DataTable({
        'ajax': '/tup/ajax/CarregaTupsPlanta/' + uf + "/" + loc + '/' + est + '/' + ard + '/' + terminal + '/' + tecnico,
        "bPaginate": false,
        'columns': [
            {"data": "ssr_idtp"},
            {"data": "tp_loc_term"},
            {"data": "tp_est_term"},
            {"data": "tp_ad"},
            {"data": "ssr_linha"},
            {"data": "ttp_matricula"},
            {"data": "tp_est_term", render: function (data, type, row) {
                    return '<input class="form-control"  type="checkbox" value="' + row.tp_ddd_terminal + '" name="tup_cadastro_micro_tp[' + row.tp_ddd_terminal + ']" >';
                }}
        ],
        "fnInitComplete": function () {
            this.fnAdjustColumnSizing(true);
        }
    });
}