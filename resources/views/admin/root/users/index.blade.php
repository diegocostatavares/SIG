@extends('layouts.site')

@section('titulo','Usuários')
@section('conteudo')
{{ Session::get('message') }}
<h4 class="page-title"><b>USUÁRIOS</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <p>
                <div class="row">
                    <a href="{{ route('admin.root.usuarios.cadastrar') }}">
                        <button type="button" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="zmdi zmdi-plus"></i></span>Adicionar
                        </button>
                    </a>
                </div>
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Grupos</th>
                        <th>Permissões</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>


                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->name }}</td>

                        <td>
                        @foreach($user->roles as $roles)

                            @if (!$loop->first)
                             | 
                            @endif

                            {{ $roles->label }}

                        @endforeach
                        </td>

                        <td>

                        @if ($user->hasRole('root'))

                            Todas

                        @elseif ($user->hasRole('admin'))

                            Todas (-root)

                        @else 

                            @foreach($user->roles as $roles)

                                @foreach($roles->permissions as $permissions)

                                    @if (!$loop->first)
                                     | 
                                    @endif

                                    {{ $permissions->label }}

                                @endforeach

                            @endforeach

                        @endif


                        </td>

                        <td class="actions" nowrap="nowrap">
                            <center>

                                @can('auth_permission', 'admin.root.usuarios.visualizar')
                                <a href="{{ route('admin.root.usuarios.editar',$user->id_user)}}">
                                    <button type="button" class="btn btn-info waves-effect waves-light btn-sm">
                                        <span class="btn-label"><i class="zmdi zmdi-edit"></i></span>Editar
                                    </button>
                                </a>
                                @endcan 

                                @can('auth_permission', 'admin.root.usuarios.editar')
                                <a href="{{ route('admin.root.usuarios.editar',$user->id_user)}}">
                                    <button type="button" class="btn btn-info waves-effect waves-light btn-sm">
                                        <span class="btn-label"><i class="zmdi zmdi-edit"></i></span>Editar
                                    </button>
                                </a>
                                @endcan

                                @can('auth_permission', 'admin.root.usuarios.excluir')
                                <a href="{{ route('admin.root.usuarios.excluir',$user->id_user) }}">
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" id="danger-alert">
                                        <span class="btn-label"><i class="zmdi zmdi-delete"></i></span>Excluir
                                    </button>
                                </a>
                                @endcan

                            </center>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div></div></div>




@endsection

