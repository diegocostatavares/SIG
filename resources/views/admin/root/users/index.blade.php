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
                    @include('layouts._includes.botoes_cad_listagem')
                </div>
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Grupos</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>


                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td nowrap="nowrap">{{ $user->name }}</td>

                        <td>
                        @foreach($user->roles as $roles)

                            @if (!$loop->first)
                             | 
                            @endif

                            {{ $roles->label }}

                        @endforeach
                        </td>


                        <td class="actions" nowrap="nowrap" align="right">
                            @include('layouts._includes.botoes_crud_listagem')
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


@endsection

