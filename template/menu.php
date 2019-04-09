<!-- Fixed navbar -->

<?php 
    $usuario = $_SESSION['email'];
?>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="imagens/logo-site-nanoincub.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo active($get, 'categorias'); ?>><a href="?pagina=categorias">Categorias</a></li>
                <li <?php echo active($get, 'produtos'); ?>><a href="?pagina=produtos">Produtos</a></li>
                <li <?php echo active($get, 'estoque'); ?>><a href="?pagina=estoque">Estoque</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li id="nomeuser"><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $usuario ?></a></li>
              <li><a href="index.php" id="logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>