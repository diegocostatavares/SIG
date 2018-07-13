$(document).ready(function () {


    verSubMenus(0,'0','PRINCIPAL');

    $("#sortable").sortable({

       update: function() 
       {
            var lista = $('#sortable').sortable('toArray'); 

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/root/menus/jsonupdateorder',
                type: 'POST',
                data: {_token: CSRF_TOKEN, lista: lista},
                dataType: 'JSON',
                success: function (data) { 
                    // alert(data.lista);
                }
            }); 
       }
    });
    $( "#sortable" ).disableSelection();

});


function verSubMenus(id_menu_pai, ids_concat_caminho, nomes_concat_caminho) {
    console.log(id_menu_pai);
    
    var table = $('#root_menus_table tbody');
    var breadcrumb = $('#root_menu_breadcrumb_table');
    var breadcrumb_li = '';
    var delimitador = '';

    var vet_ids_concat_caminho = ids_concat_caminho.split("|");
    var vet_nomes_concat_caminho = nomes_concat_caminho.split("|");

    if (ids_concat_caminho.length) {

        var ids_concat_caminho_progressivo = '';
        var nomes_concat_caminho_progressivo = '';

        for (i in vet_ids_concat_caminho) {

            delimitador = (i == 0) ? '' : '|';

            ids_concat_caminho_progressivo += delimitador + vet_ids_concat_caminho[i];
            nomes_concat_caminho_progressivo += delimitador + vet_nomes_concat_caminho[i];

            breadcrumb_li += '<li class="breadcrumb-item"><a href="javascript:void(0);" onClick="verSubMenus(\'' + vet_ids_concat_caminho[i] + '\', \'' + ids_concat_caminho_progressivo + '\', \'' + nomes_concat_caminho_progressivo + '\');">' + vet_nomes_concat_caminho[i] + '</a></li>';
        }
    }

    table.html('');
    table.html('<tr><td colspan="11" align="center"><i class="fa fa-spin fa-refresh" style="width: auto;margin-right: 10px;height: auto;border:none;color: #170;"></i></td></tr>');

    breadcrumb.html(breadcrumb_li);

    $.get('/root/menus/jsonversubmenus?id_menu_pai=' + id_menu_pai, function (data) {

        var tr = '';
        var link_tratado, rota_tratada, i_ver, i_editar, i_excluir, i_icon, onClick_ver, onClick_editar, onClick_excluir;

        $.each(data.menus, function (i, item) {

            // console.log(item);
            // console.log('-');

            link_tratado = (item.link != '' && item.link != '#' && item.link != null) ? item.link : '-';
            if (data.routes[item.id_route]) {
                link_tratado = (link_tratado == '-' && data.routes[item.id_route].name != '') ? data.routes[item.id_route].link : link_tratado;
            }

            link_tratado = item.children_all.length > 0 ? '-' : link_tratado;

            i_icon = (item.icon != '' && item.icon != null) ? '<i class="' + item.icon + '"></i>' : '<i></i>';

            i_ver = item.children_all.length > 0 ? '<i class="fa fa-eye" style="color: #000"></i>' : '<i class="fa fa-eye-slash" style="color: #999"></i>';
            i_editar = item.children_all.length > 0 ? '<i class="fa fa-edit" style="color: #07e"></i>' : '<i class="fa fa-edit" style="color: #07e"></i>';
            i_excluir = item.children_all.length > 0 ? '<i class="fa fa-trash-o" style="color: red"></i>' : '<i class="fa fa-trash-o" style="color: red"></i>';

            onClick_ver = item.children_all.length > 0 ? 'onClick="verSubMenus(\'' + item.id_menu + '\', \'' + ids_concat_caminho + '|' + item.id_menu + '\', \'' + nomes_concat_caminho + '|' + item.nome + '\');"' : '';
            onClick_editar = 'onClick="editarMenu_modal(\'' +  item.id_menu + '\');"';
            onClick_excluir = 'onClick="excluirMenu_modal(\'' +  item.id_menu + '\');"';

            tr += '<tr id="' + item.id_menu + '" style="cursor: move;">';
            tr += '<td width="300">' + i_icon + item.nome + '</td>';
            tr += '<td>' + link_tratado + '</td>';
            tr += '<td width="70" align="center"><a href="javascript:void(0);" ' + onClick_ver + '\'>' + i_ver + '</a></td>';
            tr += '<td width="70" align="center"><a href="javascript:void(0);" ' + onClick_editar + '\'>' + i_editar + '</a></td>';
            tr += '<td width="70" align="center"><a href="javascript:void(0);" ' + onClick_excluir + '\'>' +  i_excluir + '</a></td>';
            tr += '</tr>';
        });
        table.html('');
        table.append(tr);

    });

}


function editarMenu_modal(id_menu) {

    $('#custom-modal').html('<div align="center"><i class="fa fa-spin fa-refresh" style="width: auto;margin-right: 10px;height: auto;border:none;color: #170;"></i></div>');
     $('#custom-modal').load('/root/menus/editar/' + id_menu);

    var modal = new Custombox.modal({
        content: {
            effect: 'blur',
            target: '#custom-modal',
            fullscreen: false,
            width: '1100px',
        }
    });

    modal.open();

}

function excluirMenu_modal(id_menu) {

    swal({
        title: "Excluir o Menu?",
        text: "Você não poderá reverter esta ação!",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: 'btn-secondary waves-effect',
        confirmButtonClass: 'btn-danger waves-effect waves-light',
        confirmButtonText: 'Excluir!',
        closeOnConfirm: false,
        closeOnCancel: false,
    }, function (isConfirm) {

        if (isConfirm) {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/root/menus/excluir/' + id_menu,
                type: 'DELETE',
                data: {_token: CSRF_TOKEN, _method: 'DELETE'},
                dataType: 'JSON',
                success: function (data) { 
                    
                    verSubMenus(0,'0','PRINCIPAL');
                    swal("Deletado!", "Menu excluído com sucesso", "success");
                },
                error: function(xhr) {

                     swal("ERRO", "Ocorreu um erro ao excluir. Tente novamente :(", "error");
                     verSubMenus(0,'0','PRINCIPAL');
                }
            }); 

        } else {

            swal("Cancelado", "Ação cancelada :)", "error");
        }
    });

}

function salvarMenu() {

    $('#btn_menu_editar_salvar').prop("disabled", true);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var dados = new FormData($('#form_menu_editar'));

    $.ajax({
        url: '/root/menus/salvar',
        type: 'POST',
        data: dados,
        processData: false,
        cache: false,
        contentType: false,
        success: function (data) { 
            console.log(data);
            verSubMenus(0,'0','PRINCIPAL');
            Custombox.modal.closeAll();
        },
        error: function(xhr) {

            $('#btn_menu_editar_salvar').prop("disabled", false);
        }
    }); 

    // $.ajax({
    //     url: '/root/menus/salvar',
    //     contentType: "application/json; charset=utf-8",
    //     type: "POST",
    //     dataType: 'JSON',
    //     data: {
    //         _token: CSRF_TOKEN, 
    //         'TESTE': '123'
    //     },
    //     complete: function(data,result){
    //         if(result=='success'){
    //              //window.location.href = "/atividades/registrar" ;
    //         }else{
    //              // toastr["warning"]("Erro ao salvar registros!");
    //              // $('#atividades_exportar_btn_finalizar').prop("disabled", false);
    //         }             
    //     }
    // });

    // var regional = $('#massivo_fila_tratamento_regional').val();
    // var estacao = $('#massivo_fila_tratamento_estacao').val();
    // var ard = $('#massivo_fila_tratamento_ard').val();
    // var responsavel = $('#massivo_fila_tratamento_responsavel').val();
    // var massivo = $('#massivo_fila_tratamento_n_massivo').val();
    // var dc = $('#massivo_fila_tratamento_n_dc').val();
    // var obs = $('#massivo_fila_tratamento_observacao').val();
    
    // var url = '/massivo/ajax/SalvaTratamento/' + regional + '/' + estacao + '/' + ard + '/' + responsavel + '/' + massivo + '/' + dc + '/' + obs;


    // $.get(url, function (data) {
    //     Custombox.modal.closeAll();
    //     $('#massivo_fila_index_btn_consultar').click();
    // });


}