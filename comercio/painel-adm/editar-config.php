<?php 
require_once("../conexao.php");

$nome_sistema = $_POST['nome_sistema'];
$email_adm = $_POST['email_adm'];
$endereco_site = $_POST['endereco_site'];
$telefone_fixo = $_POST['telefone_fixo'];
$telefone_whatsapp = $_POST['telefone_whatsapp'];
$cnpj_site = $_POST['cnpj_site'];
$rodape_relatorios = $_POST['rodape_relatorios'];
$valor_multa = $_POST['valor_multa'];
$valor_juros_dia = $_POST['valor_juros_dia'];
$frequencia_automatica = $_POST['frequencia_automatica'];
$relatorio_pdf = $_POST['relatorio_pdf'];
$fonte_comprovante = $_POST['fonte_comprovante'];
$dias_carencia = $_POST['dias_carencia'];
$impressao_automatica = $_POST['impressao_automatica'];

$valor_juros_dia = str_replace(',', '.', $valor_juros_dia);

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = 'logo.png';
$caminho = '../img/' .$nome_img;

$imagem_temp = @$_FILES['logo']['tmp_name']; 

if(@$_FILES['logo']['name'] != ""){
	$ext = pathinfo(@$_FILES['logo']['name'], PATHINFO_EXTENSION);   
	if($ext == 'png'){ 	

			$logo = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem para Logo não permitida, somente PNG!';
		exit();
	}
}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = 'icone.png';
$caminho = '../img/' .$nome_img;

$imagem_temp = @$_FILES['icone']['tmp_name']; 

if(@$_FILES['icone']['name'] != ""){
	$ext = pathinfo(@$_FILES['icone']['name'], PATHINFO_EXTENSION);   
	if($ext == 'png'){ 	

			$icone = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem para Ícone não permitida, somente PNG!';
		exit();
	}
}


$query = $pdo->prepare("UPDATE config SET nome_sistema = :nome_sistema, email_adm = :email_adm, endereco_site = :endereco_site, telefone_fixo = :telefone_fixo, telefone_whatsapp = :telefone_whatsapp, cnpj_site = :cnpj_site, rodape_relatorios = '$rodape_relatorios', valor_multa = '$valor_multa', valor_juros_dia = '$valor_juros_dia', frequencia_automatica = '$frequencia_automatica', relatorio_pdf = '$relatorio_pdf', fonte_comprovante = '$fonte_comprovante', logo = 'logo.png', icone = 'icone.png', dias_carencia = '$dias_carencia', impressao_automatica = '$impressao_automatica' WHERE id = '1'");

$query->bindValue(":nome_sistema", "$nome_sistema");
$query->bindValue(":email_adm", "$email_adm");
$query->bindValue(":endereco_site", "$endereco_site");
$query->bindValue(":telefone_fixo", "$telefone_fixo");
$query->bindValue(":telefone_whatsapp", "$telefone_whatsapp");
$query->bindValue(":cnpj_site", "$cnpj_site");
$query->execute();

echo 'Salvo com Sucesso';

 ?>