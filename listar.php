<?php
require 'config.php';
require 'lib/funcs.php';

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qtde = filter_input(INPUT_POST, 'qtde', FILTER_SANITIZE_NUMBER_INT); //Quantidade por pagina
$tela = filter_input(INPUT_POST, 'tela', FILTER_SANITIZE_NUMBER_INT); //1-categoria, 2-produtos, 3-estoque
$query = filter_input(INPUT_POST, 'query');

$con = conecta();
$inicio = ($pagina * $qtde) - $qtde;
if ($tela==1){
	$tabela = "tbl_categorias";
	$sql = "SELECT * FROM tbl_categorias $query LIMIT $inicio, $qtde";
}else if ($tela==2){
	$tabela = "tbl_produtos";
	$sql = "SELECT P.id, P.nome, P.preco, P.quantidade_estoque, C.nome AS categoria, P.data_alteracao, P.data_criacao FROM tbl_produtos AS P LEFT JOIN tbl_categorias AS C ON P.categoria_id = C.id $query LIMIT $inicio, $qtde";
}else{
	$tabela = "tbl_estoque";
	$sql = "SELECT E.id, E.nota_fiscal, E.referencia, E.quantidade, P.nome AS produto, C.nome AS categoria, E.data_criacao, E.tipo, U.email FROM tbl_estoque AS E LEFT JOIN tbl_produtos AS P ON E.produto_id = P.id LEFT JOIN tbl_usuarios AS U ON E.id_usuario_logado = U.id LEFT JOIN tbl_categorias AS C ON C.id = P.categoria_id $query ORDER BY E.id DESC LIMIT $inicio, $qtde";
}

$res = $con->query($sql);

if ($res->num_rows!=0){ 
	if ($tela==1){
		require 'lib/listacategorias.php';
	}else if ($tela==2){
		require 'lib/listaprodutos.php';
	}else{
		require 'lib/listaestoque.php';
	}

    //Paginação
    $res_pag = $con->query("SELECT COUNT(id) AS quantidade FROM $tabela");
    $row = $res_pag->fetch_assoc();

    $qtde_paginas = ceil($row['quantidade'] / $qtde);
	echo "<a href='#' title='Primeira' onclick='listar(1, $qtde)' class='btn btn-default'><i class='fas fa-angle-double-left'></i></a>";

	for ($pag_anteri = $pagina - 2; $pag_anteri <= $pagina - 1; $pag_anteri++){
		if ($pag_anteri >= 1){
			echo "<a href='#' onclick='listar($pag_anteri, $qtde)' class='btn btn-default'>$pag_anteri</a>";
		}
	}

	echo "<a href='#'' class='btn btn-default'>$pagina</a>";

	for ($pag_depois = $pagina + 1; $pag_depois <= $pagina + 2; $pag_depois++){
		if ($pag_depois <= $qtde_paginas){
			echo "<a href='#' onclick='listar($pag_depois, $qtde)' class='btn btn-default'>$pag_depois</a>";
		}
	}
	echo "<a href='#' title='Ultima' onclick='listar($qtde_paginas, $qtde)' class='btn btn-default'><i class='fas fa-angle-double-right'></i></a>";
}else{
	?>
		<div class="panel panel-custom filterable">
	        <div class="panel-heading">
	        	<?php
	            	if ($tela==1){
	            		echo "<h3 class='panel-title'>Lista de Categorias</h3>";
	            	}else if ($tela==2){
	            		echo "<h3 class='panel-title'>Lista de Produtos</h3>";
	            	}else{
	            		echo "<h3 class='panel-title'>Lista de movimentação no estoque</h3>";
	            	}
	            ?>
	        </div>
	        <table class="table">
		        <thead>
		            <td>
                    	Nenhum registro encontrado.
                    </td>
		        </thead>
		    </table>
    	</div>
	<?php

}
$con->close();