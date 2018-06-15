@extends('layouts.erro')

@section('message')
    @isset($message)
        {{ $message}}
    @endisset
@endsection