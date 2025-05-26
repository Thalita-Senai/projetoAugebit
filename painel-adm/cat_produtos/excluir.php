<?php 
require_once("../../conexao.php");
require_once("campos.php");

$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * from produtos where categoria = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
$pdo->query("DELETE from $pagina where id = '$id'");
echo 'Excluído com Sucesso';
}else{
	echo 'Esta categoria possui produtos associadas a ela, primeiro exclua estes produtos e depois exclua a categoria!';
}



 ?>