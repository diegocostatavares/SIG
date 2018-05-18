<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Canal..." value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <small class="text-muted">Este será o título do Canal, que é um link em seu site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" name="texto" rows="3">{{isset($registro->texto) ? $registro->texto : ''}}</textarea>
    <script>
        CKEDITOR.replace('texto');
    </script>
</fieldset>

<fieldset class="form-group">
    <label for="nome">Canal Pai</label>
    <select class="form-control" id="id_pai" name="id_pai">
        <option value="0" >Selecione</option>
        @foreach ($canal_pai as $cp)
            
        <option value="{{$cp->id}}" {{isset($registro->id_pai) && $registro->id_pai == $cp->id ? 'selected' : '' }}>{{$cp->nome}}</option>
        @endforeach

    </select>
    <small class="text-muted">Escolhendo esta opção, este canal será hierarquicamente dependente do Canal Pai.
    </small>
</fieldset>


<div class="input-field">
    <p>
        <input type="checkbox" id="ativo" name="ativo" {{isset($registro->ativo) && $registro->ativo == 's' ? 'checked' : '' }} value="true" />
        <label for="test5">Ativo?</label>
        <small class="text-muted">Se esta opção não estiver marcada, este Canal não será visualizado no Site.
        </small>
    </p>
    <br><br>
</div>