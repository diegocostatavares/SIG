@extends('layouts.site')

@section('titulo','Depoimentos')
@section('conteudo')
<h4 class="page-title"><b>DEPOIMENTOS - LISTAGEM</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <p>
                <div class="row">
                    <a href="{{ route('admin.conteudo.destaques.cadastrar') }}">
                        <button type="button" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="zmdi zmdi-plus"></i></span>Adicionar
                        </button>
                    </a>
                </div>
            </p>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Texto</th>
                        <th>Ativo</th>
                        <th width='19%'>Ações</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($linhas as $linha)
                    <tr>
                        <td>{{$linha->nome}}</td>
                        <td>{{$linha->texto }}</td>
                        <td>
                            @if ( $linha->ativo == 's')
                            Sim
                            @else
                            Não
                            @endif

                        </td>
                        <td>
                <center>
                    <a href="{{ route('admin.conteudo.depoimentos.editar',$linha->id)}}">
                        <button type="button" class="btn btn-info waves-effect waves-light btn-sm">
                            <span class="btn-label"><i class="zmdi zmdi-edit"></i></span>Editar
                        </button>
                    </a>

                    <a href="{{ route('admin.conteudo.depoimentos.excluir',$linha->id) }}">
                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" id="danger-alert">
                            <span class="btn-label"><i class="zmdi zmdi-delete"></i></span>Excluir
                        </button>
                    </a>
                </center>

                </td>
                </tr>
                @endforeach

                </tbody>
            </table>

        </div></div></div>




@endsection

