<?php 
require_once("../../conexao.php");

$id = @$_POST['id'];
if($id == ""){
	echo 'Diversos';
	exit();
}

$query = $pdo->query("SELECT * from clientes where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome = $res[0]['nome'];

echo $nome;

 ?>
