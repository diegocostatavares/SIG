@extends('layouts.site')

@section('titulo','PASSEIOS')
@section('conteudo')
<h4 class="page-title"><b>PASSEIOS - CADASTRO</b></h4>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <form class="" action="{{route('admin.roteiros.passeios.salvar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.roteiros.passeios._form')
                <hr>
                <button class="btn btn-success waves-effect waves-light">Salvar</button>
            </form>

        </div>

    </div>

</div>




@endsection

