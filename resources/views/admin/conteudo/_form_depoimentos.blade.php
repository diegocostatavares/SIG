<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="titulo" name="nome" placeholder="Nome..." value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <small class="text-muted">Este será o título do Destaque, que é um link em seu site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" name="texto" rows="3">{{isset($registro->texto) ? $registro->texto : ''}}</textarea>
</fieldset>

<fieldset class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{isset($registro->email) ? $registro->email : ''}}">
    </small>
</fieldset>

<div class="input-field">
    <p>
        <input type="checkbox" id="ativo" name="ativo" {{isset($registro->ativo) && $registro->ativo == 's' ? 'checked' : '' }} value="true" />
        <label for="test5">Ativo?</label>
        <small class="text-muted">Se esta opção não estiver marcada, este depoimento não será visualizado no Site.
        </small>
    </p>
</div>