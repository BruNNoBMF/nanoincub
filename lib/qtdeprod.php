<?php

require '../config.php';
require 'funcs.php';

$id = filter_input(INPUT_POST, 'dropdownValue', FILTER_SANITIZE_NUMBER_INT);

$con = conecta();
$res = $con->query("SELECT quantidade_estoque FROM tbl_produtos WHERE id = " . $id);
if ($res){ 
	$result = $res->fetch_assoc(); 
	$qtde = $result['quantidade_estoque'];
}else{
	$qtde=0;
} 

echo $qtde;