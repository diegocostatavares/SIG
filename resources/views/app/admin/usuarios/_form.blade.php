<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Nome..." value="{{isset($registro->name) ? $registro->name : ($name ?? old('name'))}}" required>
</fieldset>

<fieldset class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="E-mail" value="{{isset($registro->email) ? $registro->email : ($email ?? old('email'))}}" required>
</fieldset>

<fieldset class="form-group">
    <h6 class="m-t-30 text-muted">Grupos</h6>
    <p class="text-muted m-b-15 font-13">
        Grupos/Permissões do Usuário
    </p>
    <select class="select2 select2-multiple form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}" name="roles[]" id="roles" multiple="multiple"
            multiple data-placeholder="Selecione ..." required>
        <optgroup label="Grupos">
            @foreach($roles as $role_v)
            {{ $selected = '' }}
            @isset($registro->id_user)
                {{ $selected = $registro->hasRole($role_v->name) ? 'selected' : '' }}
            @endisset
            <option value="{{ $role_v->id_role }}" {{ $selected }} >{{ $role_v->label }}</option>
            @endforeach
        </optgroup>
    </select>
</fieldset>

<div class="input-field">
    <p>
        <input type="checkbox" id="ativo" name="ativo" {{isset($registro->ativo) && $registro->ativo == '1' ? 'checked' : '' }} value="true" />
        <label for="test5">Ativo?</label>
        <small class="text-muted"> DESMARCAR esta opção para DESATIVAR o acesso do usuário.
        </small>
    </p>
</div>