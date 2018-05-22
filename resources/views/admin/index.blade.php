@extends('layouts.site')

@section('titulo','Admin - Hotel Pousada Caranda')


@section('conteudo')

Bem Vindo!<br><strong>{{Auth::user()->name}}</strong>

<hr>

ID: {{ Auth::user()->id_user }}
<br>
NOME: {{ Auth::user()->name }}
<br>
EMAIL: {{ Auth::user()->email }}
<br>
<br>
GRUPOS:
<br>
@foreach(Auth::user()->roles as $roles)

    @if (!$loop->first)
     <br>
    @endif

    {{ $roles->label }} ({{ $roles->name }})

@endforeach
<br>

<br>
PERMISSÕES:
<br>
@if (Auth::user()->hasRole('root'))

    Todas

@elseif (Auth::user()->hasRole('admin'))

    Todas (-root)

@else 

    @foreach(Auth::user()->roles as $roles)

        @foreach($roles->permissions as $permissions)

            @if (!$loop->first)
             | 
            @endif

            {{ $permissions->label }}

        @endforeach

    @endforeach

@endif


@endsection