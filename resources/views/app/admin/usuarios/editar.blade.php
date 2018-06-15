@extends('layouts.app.main')

@section('titulo','Usuários')

@section('page-title','USUÁRIO - EDIÇÃO')

@section('breadcrumb')
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item"><a href="#">Usuários</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
@endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            
            <form class="" action="{{route('admin.usuarios.salvar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="{{$registro->id_user}}">

                @include('app.admin.usuarios._form')


                <hr>
                <button class="btn btn-success waves-effect waves-light">Salvar</button>
                <a href="{{route('admin.usuarios')}}" class="btn btn-dark waves-effect waves-light">Voltar</a>
            </form>

        </div>
    </div>
</div>


@endsection

