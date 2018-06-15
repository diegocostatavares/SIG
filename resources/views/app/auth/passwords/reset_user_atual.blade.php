@extends('layouts.app.main')

@section('titulo','Usuários')

@section('page-title','ALTERAR MINHA SENHA')

@section('breadcrumb')
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="#">ADMIN</a></li>
        <li class="breadcrumb-item"><a href="#">Usuários</a></li>
        <li class="breadcrumb-item active">Alterar Minha Senha</li>
    </ol>
@endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            
            <form method="POST" action="{{ route('salvatrocasenha') }}">
                @csrf

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha ATUAL</label>

                    <div class="col-md-6">
                        <input id="password_old" type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}" name="password_old" required>

                        @if ($errors->has('password_old'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_old') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">NOVA Senha</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a NOVA Senha</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required>

                        @if ($errors->has('password-confirm'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password-confirm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Alterar para nova senha
                        </button>
                        <a href="{{ URL::previous() == URL::current() ? route('home') : URL::previous()}}" class="btn btn-dark waves-effect waves-light">Voltar</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>


@endsection