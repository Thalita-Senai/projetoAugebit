<?php 
require_once("../conexao.php");
$pagina = 'produtos';

$postjson = json_decode(file_get_contents('php://input'), true);

$id = @$postjson['id'];
$nome = @$postjson['nome'];
$descricao = @$postjson['descricao'];
$codigo = @$postjson['codigo'];
$valor_venda = @$postjson['valor_venda'];
$valor_custo = @$postjson['valor_custo'];
$valor_venda = str_replace(',', '.', $valor_venda);
$valor_custo = str_replace(',', '.', $valor_custo);
$ativo = @$postjson['ativo'];
$cat = @$postjson['cat'];
$foto = @$postjson['foto'];

$data = date('Y-m-d');

if($cat == ""){
$query = $pdo->query("SELECT * from cat_produtos order by id asc limit 1");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cat = $res[0]['id'];
}


//VALIDAR CAMPO
$query = $pdo->query("SELECT * from $pagina where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	
	$result = json_encode(array('mensagem'=>'Nome já Cadastrado!', 'sucesso'=>false));
	echo $result;
	exit();
}

$query = $pdo->query("SELECT * from $pagina where codigo = '$codigo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	
	$result = json_encode(array('mensagem'=>'Código já Cadastrado!', 'sucesso'=>false));
	echo $result;
	exit();
}


if($id == "" || $id == "0"){
	if($foto == ""){
		$foto = 'sem-foto.jpg';
	}

	$res = $pdo->prepare("INSERT INTO $pagina SET nome = :nome, codigo = :codigo, descricao = :descricao, valor_venda = :valor_venda, valor_compra = :valor_compra, categoria = :categoria, ativo = :ativo, foto = '$foto'");
}else{

	if($foto == ""){
		$res = $pdo->prepare("UPDATE $pagina SET nome = :nome, codigo = :codigo, descricao = :descricao, valor_venda = :valor_venda, valor_compra = :valor_compra, categoria = :categoria, ativo = :ativo WHERE id = '$id'");
	}else{

		//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
		$query_con = $pdo->query("SELECT * FROM produtos WHERE id = '$id'");
		$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
		$imagem = $res_con[0]['foto'];
		if($imagem != 'sem-foto.jpg'){
			@unlink('../../img/produtos/'.$imagem);
		}

		$res = $pdo->prepare("UPDATE $pagina SET nome = :nome, codigo = :codigo, descricao = :descricao, valor_venda = :valor_venda, valor_compra = :valor_compra, categoria = :categoria, ativo = :ativo, foto = '$foto' WHERE id = '$id'");
	}
	
}


$res->bindValue(":nome", $nome);
$res->bindValue(":codigo", $codigo);
$res->bindValue(":descricao", $descricao);
$res->bindValue(":valor_venda", $valor_venda);
$res->bindValue(":valor_compra", $valor_custo);
$res->bindValue(":categoria", $cat);
$res->bindValue(":ativo", $ativo);

@$res->execute();

$result = json_encode(array('mensagem'=>'Salvo com sucesso!', 'sucesso'=>true));

echo $result;

?>