@extends('layouts.site')

@section('titulo','Usuários')

@section('conteudo')




<div id="main" class="container-fluid">

    <!-- #top -->
    <div id="top" class="row">
        <div class="col-md-3">
            <h2>Usuários</h2>
        </div>
     
        <div class="col-md-6">
            <div class="input-group h2">
                <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Usuário">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="fa fa-search"></span>
                    </button>
                </span>
            </div>
        </div>
     
        <div class="col-md-3">
            <a href="/produtos/create" class="btn btn-primary pull-right h2">Novo Item</a>
        </div>
    </div> 
    <!-- /#top -->
 
    <hr />
     
    <!-- #list -->
    <div id="list" class="row">
     
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
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
                        <td>{{ $user->id }}</td>
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

                        @if (!$loop->first)

                        @endif

                        @foreach($user->roles as $roles)

                            @foreach($roles->permissions as $permissions)

                                @if (!$loop->first)
                                 | 
                                @endif

                                {{ $permissions->label }}

                            @endforeach

                        @endforeach
                        </td>

                        <td class="actions" nowrap="nowrap">
                            <a class="btn btn-success btn-xs" href="/produtos/{{ $user->id }}"><i class="zmdi zmdi-eye"></i></a> 
                            <a class="btn btn-warning btn-xs" href="/produtos/{{ $user->id }}/edit"><i class="zmdi zmdi-edit"></i></a>
                            <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}"><i class="zmdi zmdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
     
                </tbody>
             </table>

             {{ $users->render() }}
     
         </div>
     </div> 
     <!-- /#list -->
 


 </div>  <!-- /#main -->


 @endsection
