@extends('layouts.app.main')

@section('titulo','Usuários')

@section('page-title','USUÁRIO - CADASTRO')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item"><a href="#">Usuários</a></li>
        <li class="breadcrumb-item active">Cadastrar</li>
    </ol> -->
@endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            
            <form class="" action="{{route('admin.usuarios.salvar') }}" method="post" enctype="multipart/form-data">
                @csrf


                @include('app.admin.usuarios._form')

                <fieldset class="form-group">
                    <label for="nome">Senha</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="nome">Confirme a Senha</label>
                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required>
                </fieldset>

                <hr>
                <button class="btn btn-success waves-effect waves-light">Salvar</button>

                <a href="{{route('admin.usuarios')}}" class="btn btn-dark waves-effect waves-light">Voltar</a>

            </form>

        </div>
    </div>
</div>


@endsection

