<?php 
require_once("../../conexao.php");
require_once("campos.php");


$cp1 = $_POST[$campo1];

$id = @$_POST['id'];
$taxa = @$_POST['taxa'];
$taxa = str_replace(',', '.', $taxa);

if($taxa == ""){
	$taxa = 0;
}

//VALIDAR CAMPO
$query = $pdo->query("SELECT * from $pagina where nome = '$cp1'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este registro já está cadastrado!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina set nome = :campo1, taxa = :taxa");
}else{
	$query = $pdo->prepare("UPDATE $pagina set nome = :campo1, taxa = :taxa WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":taxa", "$taxa");
$query->execute();

echo 'Salvo com Sucesso';

 ?>