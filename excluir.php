<?php
	require 'config.php';
	require 'lib/funcs.php';
 
	$id = $_GET['id'];
	$tipo = $_GET['tipo'];
	if ($tipo == 1){
		$tabela = "tbl_categorias";
	}else{
		$tabela = "tbl_produtos";
	}
	 
	$con = conecta();

	if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    }else{
	    $sql = "DELETE FROM $tabela WHERE id=$id"; 
	    if ($con->query($sql) === TRUE) {

	    	if ($tipo == 1){
				header('Location: base.php?pagina=categorias');
			}else{
				header('Location: base.php?pagina=produtos');
			}
	    } else {
	        echo "<Script> alert('Não foi possivel salvar o produto!'); </Script>";
	    }    
    }

    $con->close();


