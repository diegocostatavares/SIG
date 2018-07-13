@extends('layouts.app.main')

@section('titulo','Usuários')

@section('page-title','MEU PERFIL')

@section('breadcrumb')
<!--     <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item"><a href="#">Usuários</a></li>
        <li class="breadcrumb-item active">Meu Perfil</li>
    </ol> -->
@endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            
            <h2>{{ $registro->name }}</h2>
            <br>
            <p>
                E-mail: {{ $registro->email }}<br><br>
                GRUPOS:<br>

                @foreach($registro->roles as $roles)

                    @if (!$loop->first)
                     <br>
                    @endif

                    {{ $roles->label }} ({{ $roles->name }})

                @endforeach
                <br>

                <br>
                PERMISSÕES:
                <br>
                @if ($registro->isRoot())

                    TODAS

                @elseif ($registro->isAdmin())

                    TODAS (-root)

                @else 

                    @forelse($registro->roles as $roles)

                        @forelse($roles->permissions as $permissions)

                            @if (!$loop->parent->first)
                             <br>
                            @endif

                            {{ $permissions->label }}

                        @empty
                            Sem permissões.
                        @endforelse

                    @empty
                        Sem permissões.
                    @endforelse

                @endif

            </p>

            <a href="{{ URL::previous() == URL::current() ? route('home') : URL::previous()}}" class="btn btn-dark waves-effect waves-light">Voltar</a>

        </div>
    </div>
</div>


@endsection

