<fieldset class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Destaque..." value="{{isset($registro->nome) ? $registro->nome : ''}}">
    <small class="text-muted">Este será o título do Destaque, que é um link em seu site.
    </small>
</fieldset>

<fieldset class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" id="texto" name="texto" rows="3">{{isset($registro->texto) ? $registro->texto : ''}}</textarea>
    <script>
        CKEDITOR.replace('texto');
    </script>
</fieldset>


<div class="col-md-12">
    <fieldset class="form-group">
        <label for="valor_alta">Valor Alta Temporada</label>
        <input type="number" class="form-control" id="valor_alta" name="valor_alta" placeholder="R$" value="{{isset($registro->valor_alta) ? $registro->valor_alta : ''}}">
    </fieldset>
</div>
<div class="col-md-12">
    <fieldset class="form-group">
        <label for="valor_baixa">Valor Baixa Temporada</label>
        <input type="number" class="form-control" id="valor_baixa" name="valor_baixa" placeholder="R$" value="{{isset($registro->valor_baixa) ? $registro->valor_baixa : ''}}">
    </fieldset>
</div>



