<?php 
require_once("../../conexao.php");
@session_start();
$usuario = $_SESSION['id_usuario'];

$cliente = $_POST['cliente-rec'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$lancamento = $_POST['lancamento'];
$documento = $_POST['documento'];

$valor = str_replace(',', '.', $valor);


$id = @$_POST['id'];

if($descricao == "" and $cliente == "" ){
	echo 'Selecione um Cliente ou Coloque uma descrição!';
	exit();
}

if($valor == ""){
	echo 'Preencha o Valor';
	exit();
}


if($descricao == ""){
	$query1 = $pdo->query("SELECT * from clientes where id = '$cliente' ");
	$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
		if(@count($res1) > 0){
			$descricao = $res1[0]['nome'];
		}
}


//RECUPERAR O CAIXA QUE ESTÁ ABERTO (CASO TENHA ALGUM)
$query2 = $pdo->query("SELECT * FROM caixa WHERE status = 'Aberto'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$caixa_aberto = $res2[0]['id'];
}else{
	$caixa_aberto = 0;
}

		
$pdo->query("INSERT INTO movimentacoes set tipo = 'Entrada', movimento = 'Receita', descricao = '$descricao', valor = '$valor', usuario = '$usuario', data = '$data', lancamento = '$lancamento', plano_conta = 'Receita', documento = '$documento', caixa_periodo = '$caixa_aberto'");


echo 'Salvo com Sucesso';

?>