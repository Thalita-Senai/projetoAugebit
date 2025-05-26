<?php 
require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));


?>

<!DOCTYPE html>
<html>
<head>
	<title>Catálogo de Produtos</title>
	<link rel="shortcut icon" href="../img/favicon.ico" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

	<style>

		@page {
			margin: 0px;

		}

		body{
			margin-top:0px;
			font-family:Times, "Times New Roman", Georgia, serif;
		}


		<?php if($relatorio_pdf == 'Sim'){ ?>

		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:5px;
			position:absolute;
			bottom:0;
		}

		<?php }else{ ?>
		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:5px;
			
		}

		<?php } ?>

		.cabecalho {    
			padding:10px;
			margin-bottom:30px;
			width:100%;
			font-family:Times, "Times New Roman", Georgia, serif;

		}

		.titulo_cab{
			color:#0340a3;
			font-size:17px;
		}

		
		
		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:12px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

		.pgto{
			margin:1px;
		}

		.fonte13{
			font-size:13px;
		}

		.esquerda{
			display:inline;
			width:50%;
			float:left;
		}

		.direita{
			display:inline;
			width:50%;
			float:right;
		}

		.table{
			padding:15px;
			font-family:Verdana, sans-serif;
			margin-top:20px;
		}

		.texto-tabela{
			font-size:12px;
		}


		.esquerda_float{

			margin-bottom:10px;
			float:left;
			display:inline;
		}


		.titulos{
			margin-top:10px;
		}

		.image{
			margin-top:-10px;
		}

		.margem-direita{
			margin-right: 80px;
		}

		.margem-direita50{
			margin-right: 50px;
		}

		hr{
			margin:8px;
			padding:0px;
		}


		.titulorel{
			margin:0;
			font-size:25px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.margem-superior{
			margin-top:30px;
		}

		.areaSubtituloCab{
			margin-top:15px;
			margin-bottom:15px;
		}




		.area-tab{
			
			display:block;
			width:100%;
			height:30px;

		}


		.area-cab{
			
			display:block;
			width:100%;
			height:10px;

		}

		
		.coluna{
			margin: 0px;
			float:left;
			height:30px;
		}


		hr .hr-table{
			
			padding:2px;
			margin:0px;
		}

		.titulo-cardapio{
			width:100%;
			background-color: #f7f7f7;
			padding:3px;
			font-size:13px;
			font-weight: bold;
			margin-bottom:10px;
			margin-top:10px;
		}



	</style>


</head>
<body>

	
		<section class="area-cab">
		<div class="cabecalho">
			<div class="coluna titulo_cab" style="width:50%"> <u>Relatório de Produtos</u></div>
			<div align="right" class="coluna" style="width:50%"> <?php echo mb_strtoupper($nome_sistema) ?></div>
		</div>
		</section>

		<br>

		<section class="area-cab">
		<div class="cabecalho">
			<div class="coluna" style="width:60%"><small> <small><?php echo $endereco_site ?></small></small></div>
			<div align="right" class="coluna" style="width:40%"><small> <small><small> <?php echo mb_strtoupper($data_hoje) ?></small></small></small></div>
		</div>
		</section>

		<br>
		<div class="cabecalho" style="border-bottom: solid 1px #0340a3">
		</div>
			
	

	<div class="mx-2" style="padding-top:15px ">

	<small><small>
	<section class="area-tab" style="background-color: #f5f5f5;">
					
						<div class="linha-cab" style="padding-top: 5px;">
							<div class="coluna" style="width:45%">NOME</div>
							<div class="coluna" style="width:15%">ESTOQUE</div>
							<div class="coluna" style="width:15%">VALOR VENDA</div>
							<div class="coluna" style="width:15%">VALOR COMPRA</div>
							
							<div class="coluna" style="width:10%">FOTO</div>
							
						</div>
					
				</section><small></small>

				<div class="cabecalho mb-1" style="border-bottom: solid 1px #e3e3e3;">
		</div>

		<?php 
		
		$query = $pdo->query("SELECT * FROM produtos order by id desc");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalItens = @count($res);
		
		for ($i=0; $i < @count($res); $i++) { 
			foreach ($res[$i] as $key => $value) {
			}
			$nome = $res[$i]['nome'];
			$valor_compra = $res[$i]['valor_compra'];
			$valor_venda = $res[$i]['valor_venda'];
			$estoque = $res[$i]['estoque'];
			
			$foto = $res[$i]['foto'];
			
			
			$id = $res[$i]['id'];

			
			$valor_compra = number_format($valor_compra, 2, ',', '.');
			$valor_venda = number_format($valor_venda, 2, ',', '.');
			?>

				<section class="area-tab" style="padding-top:5px">
					
				<div class="linha-cab">
				
				<div class="coluna" style="width:45%"><?php echo $nome ?> </div>
				<div class="coluna" style="width:15%"><?php echo $estoque ?> </div>
				
				<div class="coluna" style="width:15%">R$ <?php echo $valor_venda ?> </div>
				<div class="coluna" style="width:15%">R$ <?php echo $valor_compra ?> </div>
				
				<div class="coluna" style="width:10%"><img src="<?php echo $url_sistema ?>img/produtos/<?php echo $foto ?>" width="30px"> </div>
				

			</div>
		</section>
		<div class="cabecalho" style="border-bottom: solid 1px #e3e3e3;">
		</div>
	
		<?php } ?>


		</small>
	
	

</div>


<div class="cabecalho mt-3" style="border-bottom: solid 1px #0340a3">
		</div>
	
		<div class="col-md-12 p-2">
			<div class="" align="right">
				
				<span class=""> <small><small><small>TOTAL DE PRODUTOS</small> :  <?php echo $totalItens ?></small></small>  </span>
			</div>

		</div>

		<div class="cabecalho" style="border-bottom: solid 1px #0340a3">
		</div>


<div class="footer"  align="center">
	<span style="font-size:12px"><?php echo $rodape_relatorios ?></span> 
</div>




</body>
</html>
