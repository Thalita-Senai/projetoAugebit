<?php 
require_once("../conexao.php");
$pagina = 'token';

$postjson = json_decode(file_get_contents('php://input'), true);

$token = @$postjson['token'];


//VALIDAR CAMPO
$query = $pdo->query("SELECT * from $pagina where token = '$token'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0 ){		
	exit();
}

$res = $pdo->prepare("INSERT INTO $pagina SET token = :token");
$res->bindValue(":token", $token);
@$res->execute();
$result = json_encode(array('mensagem'=>'Salvo com sucesso!', 'sucesso'=>true));
echo $result;
?>