<?php 
require_once("../../conexao.php");
require_once("campos.php");
$id = @$_POST['id-excluir'];

//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
$query_con = $pdo->query("SELECT * FROM produtos WHERE id = '$id'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
$imagem = $res_con[0]['foto'];
if($imagem != 'sem-foto.jpg'){
	@unlink('../../img/produtos/'.$imagem);
}


$pdo->query("DELETE from $pagina where id = '$id'");
echo 'Excluído com Sucesso';

 ?>