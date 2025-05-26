<?php 
require_once("../conexao.php");
$pagina = 'contas_receber';

$postjson = json_decode(file_get_contents('php://input'), true);

$id = @$postjson['id'];
$valor = @$postjson['valor'];
$descricao = @$postjson['descricao'];
$forn = @$postjson['forn'];
$valor = str_replace(',', '.', $valor);
$saida = @$postjson['saida'];
$doc = @$postjson['doc'];

$desp = @$postjson['desp'];
$freq = @$postjson['freq'];
$emissao = @$postjson['emissao'];
$venc = @$postjson['venc'];
$foto = @$postjson['foto'];
$user = @$postjson['user'];

$plano = $desp . ' - ' .$plano;

/*
if($forn == "" and $descricao == "" ){
	$result = json_encode(array('mensagem'=>'Selecione um Fornecedor ou Coloque uma descrição!', 'sucesso'=>false));
	echo $result;
	exit();
}
*/


if($id == "" || $id == "0"){
	if($foto == ""){
		$foto = 'sem-foto.jpg';
	}

	$res = $pdo->prepare("INSERT INTO $pagina set descricao = :campo1, cliente = :campo2, entrada = :campo3, documento = :campo4, plano_conta = :campo5, data_emissao = :campo6, vencimento = :campo7, frequencia = :campo8, valor = :campo9, usuario_lanc = :campo10, status = 'Pendente', data_recor = curDate(), arquivo = '$foto'");
}else{

	if($foto == ""){
		$res = $pdo->prepare("UPDATE $pagina SET descricao = :campo1, cliente = :campo2, entrada = :campo3, documento = :campo4, plano_conta = :campo5, data_emissao = :campo6, vencimento = :campo7, frequencia = :campo8, valor = :campo9, usuario_lanc = :campo10, status = 'Pendente', data_recor = curDate() WHERE id = '$id'");
	}else{

		//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
		$query_con = $pdo->query("SELECT * FROM contas_receber WHERE id = '$id'");
		$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
		$imagem = $res_con[0]['arquivo'];
		if($imagem != 'sem-foto.jpg'){
			@unlink('../../img/contas/'.$imagem);
		}

		$res = $pdo->prepare("UPDATE $pagina SET descricao = :campo1, cliente = :campo2, entrada = :campo3, documento = :campo4, plano_conta = :campo5, data_emissao = :campo6, vencimento = :campo7, frequencia = :campo8, valor = :campo9, usuario_lanc = :campo10, status = 'Pendente', data_recor = curDate(), arquivo = '$foto' WHERE id = '$id'");
	}
	
}

$res->bindValue(":campo1", "$descricao");
$res->bindValue(":campo2", "$forn");
$res->bindValue(":campo3", "$saida");
$res->bindValue(":campo4", "$doc");
$res->bindValue(":campo5", "Venda");
$res->bindValue(":campo6", "$emissao");
$res->bindValue(":campo7", "$venc");
$res->bindValue(":campo8", "$freq");
$res->bindValue(":campo9", "$valor");
$res->bindValue(":campo10", "$user");

@$res->execute();

$result = json_encode(array('mensagem'=>'Salvo com sucesso!', 'sucesso'=>true));

echo $result;

?>