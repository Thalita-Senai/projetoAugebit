<?php 
require_once("../../conexao.php");

$id_cliente = $_POST['id'];

$data_hoje = date('Y-m-d');
$data_amanha = date('Y/m/d', strtotime("+1 days",strtotime($data_hoje)));

echo <<<HTML
<small><table id="tab-conta" class="table table-striped table-light table-hover my-4">
<thead>
<tr>
<th>Descrição</th>
<th>Data</th>
<th>Vencimento</th>	
<th>Valor</th>	
<th>Pago</th>									
<th>Ações</th>
</tr>
</thead>
<tbody>
HTML;

$totalVencidas = 0;
$totalPendentes = 0;
$total_valor = 0;
$query = $pdo->query("SELECT * from contas_receber where cliente = '$id_cliente' order by id desc ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){} 

	$id = $res[$i]['id'];
		$descricao = $res[$i]['descricao'];		
		$entrada = $res[$i]['entrada'];
		$documento = $res[$i]['documento'];
		$plano_conta = $res[$i]['plano_conta'];
		$data_emissao = $res[$i]['data_emissao'];
		$vencimento = $res[$i]['vencimento'];
		$frequencia = $res[$i]['frequencia'];
		$valor = $res[$i]['valor'];
		$usuario_lanc = $res[$i]['usuario_lanc'];
		$usuario_baixa = $res[$i]['usuario_baixa'];
		$arquivo = $res[$i]['arquivo'];
		
		$status = $res[$i]['status'];
		$data_baixa = $res[$i]['data_baixa'];



		if($status == 'Paga'){
			$classe = 'text-success';
			$ocutar = 'd-none';
		}else{
			$classe = 'text-danger';
			$total_valor += $valor;
			$total_valorF = number_format($total_valor, 2, ',', '.');
			$ocutar = '';
			$totalPendentes += $valor;
		}


		//RECUPERAR DIAS VENCIDOS
		$data_venc_carencia = date('Y/m/d', strtotime("-$dias_carencia days",strtotime($data_hoje)));
		
		if(strtotime($vencimento) < strtotime($data_venc_carencia)){
			$dif = strtotime($data_venc_carencia) - strtotime($vencimento);
			$dias_vencidos = floor($dif / (60*60*24));
		}else{
			$dias_vencidos = '0';
		}
	
		
	
		$data_emissaoF = implode('/', array_reverse(explode('-', $data_emissao)));
		$data_vencF = implode('/', array_reverse(explode('-', $vencimento)));
		$data_baixaF = implode('/', array_reverse(explode('-', $data_baixa)));

		$valorF = number_format($valor, 2, ',', '.');


		//PEGAR RESIDUOS DA CONTA
		$total_resid = 0;
		$valor_com_residuos = 0;
		$query2 = $pdo->query("SELECT * FROM valor_parcial WHERE id_conta = '$id'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count($res2) > 0){

		$descricao = '(Resíduo) - ' .$descricao;
	
		for($i2=0; $i2 < @count($res2); $i2++){
		foreach ($res2[$i2] as $key => $value){} 
			$id_res = $res2[$i2]['id'];
			$valor_resid = $res2[$i2]['valor'];
			$total_resid += $valor_resid;
		}


		$valor_com_residuos = $valor + $total_resid;
	}
		if($valor_com_residuos > 0){
			$vlr_antigo_conta = '('.$valor_com_residuos.')';
			$descricao_link = '';
			$descricao_texto = 'd-none';
		}else{
			$vlr_antigo_conta = '';
			$descricao_link = 'd-none';
			$descricao_texto = '';
		}


    if($vencimento < $data_hoje and $status == 'Pendente'){
    	$classe_debito = 'text-danger';
    	$classe_debito_icon = 'text-danger';
    	$totalVencidas += $valor;
    }else{
    	$classe_debito = '';
    	$classe_debito_icon = 'text-success';
    	
    }

    $totalVencidasF = number_format($totalVencidas, 2, ',', '.');
    $totalPendentesF = number_format($totalPendentes, 2, ',', '.');
		
echo <<<HTML
	<tr>
	<td>
	<i class="bi bi-square-fill $classe"></i>
	{$descricao}
	</td>		
	<td>{$data_emissaoF}</td>	
	<td class="{$classe_debito}">{$data_vencF}</td>	
	<td class="{$classe_debito}">R$ {$valorF}</td>	
	<td>{$status}</td>									
	<td>
	
	<a href="#" onclick="baixar('{$id}' , '{$descricao}', '{$valor}', '$entrada', '$dias_vencidos')" title="Dar Baixa">	<i class="bi bi-check-square text-success mx-1 {$ocutar}"></i> </a>
	

	</td>
	</tr>
HTML;
} 
echo <<<HTML
</tbody>
</table>
<br>
<div align="right">Total Pendentes: <span class="text-success">R$ {$totalPendentesF}</span> Total Vencidas: <span class="text-danger">R$ {$totalVencidasF}</span></div>
</small>
HTML;

?>

<script>
$(document).ready(function() {    
	$('#tab-conta').DataTable({
		"ordering": false,
		"stateSave": true,
	});

} );



function baixar(id, descricao, valor, saida, dias){
	
    $('#id-baixar').val(id);

    

    $('#descricao-baixar').text(descricao);
    $('#valor-baixar').val(valor);
    $('#saida-baixar').val(saida);

    $('#valor-desconto').val('0');
    

    if(dias > 0){

    	var valor_multa = '<?=$valor_multa?>';
    	var valor_multa_calc = valor_multa * valor / 100;

    	var valor_juros = '<?=$valor_juros_dia?>';
    	var valor_juros_calc = (valor_juros * dias) * valor / 100;
    	
    	$('#valor-juros').val(valor_juros_calc.toFixed(2));
    	$('#valor-multa').val(valor_multa_calc.toFixed(2));
    	$('#subtotal').val(valor);
    	totalizar();

    }else{
    	$('#juros-baixar').val('0');
    	$('#multa-baixar').val('0');
    	$('#subtotal').val(valor);
    }
    
       
    var myModal = new bootstrap.Modal(document.getElementById('modalBaixar'), {       });
    myModal.show();
    $('#mensagem-baixar').text('');
}


</script>




