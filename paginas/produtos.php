<div class="page-header">
    <a href="?pagina=cadastroprodutos">
        <button type="button" class="btn btn-default"><i class="fas fa-plus"></i> Novo</button>
    </a>

    <button id="btnFiltro" type="button" class="btn btn-default"><i class="glyphicon glyphicon-filter"></i> Filtro</button>
</div>

<div id="divfiltro" style="display: none;" class="row">    
    <div class="col-md-10 col-md-offset-0">
        <div class="well well-sm">
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="filtro">Filtrar por</label>
                        <div class="col-md-3">
                            <select id="filtro" name="filtro" class="form-control" required>
                                <option value="P.nome">Produto</option>
                                <option value="C.nome">Categoria</option>
                            </select>
                        </div>

                        <label class="col-md-2 control-label" for="texto">Texto</label>
                        <div class="col-md-5">
                            <input id="texto" name="texto" type="text" placeholder="Filtro" class="form-control" required>
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
