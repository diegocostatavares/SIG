@extends(Request::ajax() ? 'layouts.app.blank' : 'layouts.app.main')

@section('titulo','ROOT')

@section('page-title','EDITANDO MENU')

@section('conteudo')


<h4 class="custom-modal-title">EDITANDO MENU - ID: {{ $registro->id_menu }} - NOME: {{ $registro->nome }}</h4>

<form id="form_menu_editar">

    <input class="form-control" type="hidden" value="{{ $registro->id_menu }}" name="id_menu">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">

                <fieldset class="form-group">
                    <label>Menu</label>
                    @php
                        echo $menuOptionsAll;
                    @endphp
                </fieldset>

                <fieldset class="form-group">
                    <label for="massivo_fila_tratamento_responsavel" class="col-2 col-form-label">Nome</label>
                    <input class="form-control" type="text" name="nome" value="{{ $registro->nome }}" required>
                </fieldset>

    			<fieldset class="form-group">
    			    <label>Rota</label>
    			    <select class="form-control" name="id_route" required>
    		            @foreach($routes as $route)
    			            <option value="{{ $route->id_route }}" {{ $registro->id_route==$route->id_route ? 'selected' : '' }} >{{ $route->name }}</option>
    		            @endforeach
    			    </select>
    			</fieldset>

                <fieldset class="form-group">
                    <label for="massivo_fila_tratamento_abrir_massivo" class="col-2 col-form-label">Link</label>
                    <input class="form-control" type="text" name="link" value="{{ $registro->link }}">
                </fieldset>

                <fieldset class="form-group">
                    <label for="massivo_fila_tratamento_abrir_massivo" class="col-2 col-form-label">Icone</label>
                    <input class="form-control" type="text" name="icon" value="{{ $registro->icon }}">
                </fieldset>

    			<div class="input-field">
    			    <p>
    			        <input type="checkbox" name="ativo" {{isset($registro->ativo) && $registro->ativo == '1' ? 'checked' : '' }} value="true" />
    			        <label for="test5">Visível?</label>
    			        <small class="text-muted"> DESMARCAR esta opção para DESATIVAR apenas a visibilidade, mas pode ser acessado via link. Quaso queira "desativar" o acesso, alterar nas configurações de permissões de acesso.
    			        </small>
    			    </p>
    			</div>

                <fieldset class="form-group">
                    <input id="btn_menu_editar_salvar" class="form-control btn btn-primary btn-block" type="button" onclick="salvarMenu()" value="Salvar">
                </fieldset>


            </div>
        </div>
    </div>
</form>

@endsection
