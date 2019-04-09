<?php

function rotas($pagina) {
    switch ($pagina) {
        case 'produtos':
            require 'paginas/produtos.php';
            break;
        case 'categorias':
            require 'paginas/categorias.php';
            break;
        case 'cadastrocategorias':
            require 'paginas/cadastrocategorias.php';
            break;
        case 'cadastroprodutos':
            require 'paginas/cadastroprodutos.php';
            break;  
        case 'estoque':
            require 'paginas/estoque.php';
            break;
        case 'entrada':
            require 'paginas/entrada.php';
            break;
        case 'saida':
            require 'paginas/saida.php';
            break;        
        default:
            require 'paginas/404.php';
    }
}

function active($pagina, $link=''){
    if ($pagina == $link) {
        return 'class="active"';
    }
    return '';
}

function conecta(){
    return new mysqli(HOST, USER, PASS, BANCO);
}

function formata_reais($valor){
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

function formata_tipo($valor){

    if ($valor == 1){
        $valor = 'Entrada';
    }else{
        $valor = 'Saida';
    }

    return $valor;
}

function formata_data($data){

    if ($data == '0000-00-00 00:00:00' || $data == null){
        $data = "";
    }else{
        $data = (new DateTime($data))->format('d/m/Y H:i:s');
    }
    return $data;
}