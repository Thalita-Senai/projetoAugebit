<?php 
require_once("../../conexao.php");
require_once("campos.php");

$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * from despesas where cat_despesa = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
$pdo->query("DELETE from $pagina where id = '$id'");
echo 'Excluído com Sucesso';
}else{
	echo 'Esta categoria possui despesas associadas a ela, primeiro exclua estas despesas e depois exclua a categoria!';
}

 ?>