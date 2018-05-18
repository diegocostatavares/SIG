@extends('layouts.site')

@section('titulo','CALENDÁRIO DE ALTA TEMPORADA')
@section('conteudo')
<h4 class="page-title"><b>CALENDÁRIO DE ALTA TEMPORADA - CADASTRO</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form class="" action="{{route('admin.roteiros.altatemporada.salvar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.roteiros.altatemporada._form')
                <hr>
                <div class="col-xs-12">
                    <button class="btn btn-success waves-effect waves-light">Salvar</button>
                </div>

            </form>

        </div>

    </div>

</div>




@endsection

