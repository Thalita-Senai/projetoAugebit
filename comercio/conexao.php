<?php 
require_once("config.php");
$data_atual = date('Y-m-d');
date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Não foi possível conectar ao banco de dados! <br><br>'.$e;

}


$nome_sistema = 'Comércio';
$email_adm = 'admin@gmail.com';
$nome_admin = 'Admin';
$endereco_site = 'Rua Francisco Antonio Zeller, 20 - Ferraz de Vasconcellos';
$telefone_fixo = '(11) 3333-3333';
$telefone_whatsapp = '(11) 98765-4321';

$cnpj_site = '20.301.706/0001-08';
$rodape_relatorios = 'Desenvolvido pelo terceiro ano @Todos os Direitos Reservados!!';


//VARIAVEIS PARA CONTAS A RECEBER. OBS NAO COLOQUE % NOS VALORES

$valor_multa = 2; // esse valor de 2 corresponde a 2% sobre o valor da venda
$valor_juros_dia = 0.15; // aqui será 0.15 % ao dia sobre o valor da venda
$dias_carencia = 0;

$frequencia_automatica = 'Não'; //Caso você utilize sim e tenha uma conta que foi lançada como mensal, todo mês será gerado uma nova conta independentemente se a anterior foi paga.

$relatorio_pdf = 'Sim'; //Se estiver sim o relatório vai sair em pdf, caso contrário será um relatório html.
$fonte_comprovante = '11';
$impressao_automatica = 'Sim';

$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) == 0){
	$pdo->query("INSERT INTO config SET nome_sistema = '$nome_sistema', email_adm = '$email_adm', endereco_site = '$endereco_site', telefone_fixo = '$telefone_fixo', telefone_whatsapp = '$telefone_whatsapp', cnpj_site = '$cnpj_site', rodape_relatorios = '$rodape_relatorios', valor_multa = '$valor_multa', valor_juros_dia = '$valor_juros_dia', frequencia_automatica = '$frequencia_automatica', relatorio_pdf = '$relatorio_pdf', fonte_comprovante = '$fonte_comprovante', logo = 'logo.png', icone = 'icone.png', dias_carencia = '$dias_carencia', alerta = curDate(), impressao_automatica = '$impressao_automatica'");
}else{
	$nome_sistema = $res[0]['nome_sistema'];
	$email_adm = $res[0]['email_adm'];
	$endereco_site = $res[0]['endereco_site'];
	$telefone_fixo = $res[0]['telefone_fixo'];
	$telefone_whatsapp = $res[0]['telefone_whatsapp'];
	$cnpj_site = $res[0]['cnpj_site'];
	$rodape_relatorios = $res[0]['rodape_relatorios'];
	$valor_multa = $res[0]['valor_multa'];
	$valor_juros_dia = $res[0]['valor_juros_dia'];
	$frequencia_automatica = $res[0]['frequencia_automatica'];
	$relatorio_pdf = $res[0]['relatorio_pdf'];
	$fonte_comprovante = $res[0]['fonte_comprovante'];
	$logo = $res[0]['logo'];
	$icone = $res[0]['icone'];
	$dias_carencia = $res[0]['dias_carencia'];
	$alerta = $res[0]['alerta'];
	$impressao_automatica = $res[0]['impressao_automatica'];

	$telefone_whatsapp_link = '55'.preg_replace('/[ ()-]+/' , '' , $telefone_whatsapp);
}

if($data_atual != $alerta){
	//verificar se há contas a receber vencidas
	$query = $pdo->query("SELECT * from contas_receber where vencimento < curDate() and status = 'Pendente' and cliente > 0 order by id desc ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	if(@count($res) > 0){
	for($i=0; $i < @count($res); $i++){

		$descricao = $res[$i]['descricao'];
		$cp2 = $res[$i]['cliente'];		
		$cp7 = $res[$i]['vencimento'];		
		$cp9 = $res[$i]['valor'];	

		$query1 = $pdo->query("SELECT * from clientes where id = '$cp2' ");
		$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
		if(@count($res1) > 0){
			$nome_cliente = $res1[0]['nome'];
			$telefone_cliente = $res1[0]['telefone'];
			$tel_cliente = '55'.preg_replace('/[ ()-]+/' , '' , $telefone_cliente);
			
			$data_venc = implode('/', array_reverse(explode('-', $cp7)));
			$valor = number_format($cp9, 2, ',', '.');

			$mensagem_api = '*Você possui Débitos!!*%0A%0A';
			$mensagem_api .= '*Olá '.$nome_cliente.', sua conta de valor '.$valor.' venceu no dia '.$data_venc.', ainda não consta como paga, caso tenha efetuado o pagamento favor desconsiderar!';

			$data_msg = $data_atual.' 14:00:00';
			require('painel-adm/api_agendamento_whats.php');



		}
}
}

$pdo->query("UPDATE config SET alerta = '$data_atual' where id = '1'");

}

 ?>