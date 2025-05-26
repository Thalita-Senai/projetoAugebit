<?php 
require_once("../../conexao.php");
$pgto = @$_POST['pgto'];

$query = $pdo->query("SELECT * from formas_pgtos where nome = '$pgto' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$taxa = $res[0]['taxa'];
if($taxa > 0){
	echo $taxa;
}


 ?>
