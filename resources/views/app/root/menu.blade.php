@extends('layouts.app.main')

@section('titulo','ROOT')

@section('page-title','CADASTRO DE MENUS')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ROOT</a></li>
        <li class="breadcrumb-item active">Home</li>
    </ol> -->
@endsection

@section('header_page_extra')
<style>
    #root_menus_table i{
      display: inline-block;
      font-size: 18px;
      line-height: 17px;
      margin-left: 3px;
      margin-right: 15px;
      text-align: center;
      vertical-align: middle;
      width: 20px;
    }

</style>
@endsection

@section('conteudo')

<div class="row">
    <div class="col-12">
    	<div class="card-box">

    		<meta name="csrf-token" content="{{ csrf_token() }}" />

				<ol class="breadcrumb float-left" id="root_menu_breadcrumb_table">
			        <li class="breadcrumb-item">Carregando...</li>
			    </ol>

				<table class="table table-bordered table-hover table-striped" id="root_menus_table">
                    <thead >
                        <tr class="table-active">
                            <th width="300">Menu</th>
                            <th>Link</th>
                            <th width="70">SubMenu</th>
                            <th width="70">Editar</th>
                            <th width="70">Excluir</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        <td colspan="5" align="center">Aguarde...</td>
                    </tbody>
                </table>
                

    	</div>
    </div>
</div>


@endsection


@section('footer_page_extra')


@endsection