@extends('layouts.app.main')

@section('titulo','Usuários')

@section('page-title','USUÁRIOS')

@section('breadcrumb')
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item"><a href="#">Usuários</a></li>
        <li class="breadcrumb-item active">Listagem</li>
    </ol>
@endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            @include('layouts.app._includes.botoes_crud.listagem_cadastro')

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Grupos</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>


                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td >{{ $user->name }}</td>
                        <td >{{ $user->email }}</td>

                        <td>
                        @foreach($user->roles as $roles)

                            @if (!$loop->first)
                             | 
                            @endif

                            {{ $roles->label }}

                        @endforeach
                        </td>

                        @include('layouts.app._includes.botoes_crud.listagem_acoes_grupos')

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection

