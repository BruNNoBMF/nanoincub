<div class="page-header">
    <a href="?pagina=cadastrocategorias">
        <button type="button" class="btn btn-default"><i class="fas fa-plus"></i> Novo</button>
    </a>

    <button id="btnFiltro" type="button" class="btn btn-default"><i class="glyphicon glyphicon-filter"></i> Filtro</button>
</div>

<div id="divfiltro" style="display: none;" class="row">    
    <div class="col-md-6 col-md-offset-0">
        <div class="well well-sm">
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="texto">Categoria</label>
                        <div class="col-md-9">
                            <input id="texto" name="texto" type="text" placeholder="Categoria" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button id="btnBuscar" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                        </div>
                    </div>
                    
                </fieldset>
            </form>
        </div>
    </div>
</div>

<div class="row">    
    <span id="conteudo"> </span>
</div>
