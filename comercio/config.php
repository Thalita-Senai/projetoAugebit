<?php 

$url_sistema = "http://localhost/comercio/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/'){
$url_sistema = "http://localhost/comercio/";
}

//DADOS PARA O BANCO DADOS LOCAL
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'comercio';

$relatorio_pdf = 'Sim';

 ?>