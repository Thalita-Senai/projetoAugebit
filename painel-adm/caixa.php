<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'caixa';

require_once($pagina."/campos.php");

?>

<div class="col-md-12 my-3">
	<a href="#" onclick="inserir()" type="button" class="btn btn-dark btn-sm">Nova Abertura</a>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Valor da Abertura</label>
						<input type="number" class="form-control" name="<?php echo $campo2 ?>" placeholder="Valor da Abertura" id="<?php echo $campo2 ?>" value="0">
					</div>
					

					<small><div id="mensagem" align="center"></div></small>

					<input type="hidden" class="form-control" name="id"  id="id">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<?php require_once("verificar_adm.php"); ?>

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="modalFechar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Fechar Caixa</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-fechar" method="post">
				<div class="modal-body">

					Deseja Realmente fechar este caixa aberto dia: <span id="data_abert"></span>?

					<small><div id="mensagem-fechar" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-fechar"  id="id-fechar">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-fechar">Cancelar</button>
					<button type="submit" class="btn btn-success">Fechar Caixa</button>
				</div>
			</form>
		</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="modalMovimentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal"><small>Movimentação do Caixa</span> - <span id="titulo-movimento"></span> - Valor Abertura R$<span id="valor-abertura"></span></small></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<div class="modal-body">

				<div class="row my-1">
					<div class="col-md-9">

						<div style="float:left; margin-right:10px">
							<a href="#" onclick="pesquisar('', '')" class="text-dark">
							<span><small><i title="Filtrar Movimentações" class="bi bi-search"></i></small></span>
							</a>
						</div>

						<small class="mx-4">
							<a title="Movimentações de Entradas" class="text-success" href="#" onclick="pesquisar('Entrada', '')"><span>Entradas</span></a> / 
							<a title="Movimentações de Saídas" class="text-danger" href="#" onclick="pesquisar('Saída', '')"><span>Saídas</span></a>
							
						</small>


						<small class="mx-4">
							<a title="Contas à Pagar" class="text-muted" href="#" onclick="pesquisar('', 'Conta à Pagar')"><span>Contas Pagas</span></a> / 
							<a title="Contas à Pagar Hoje" class="text-muted" href="#" onclick="pesquisar('','Conta à Receber')"><span>Contas Recebidas</span></a> / 
							<a title="Despesas" class="text-muted" href="#" onclick="pesquisar('','Despesa')"><span>Despesas</span></a> 
							
						</small>


					</div>

					<div align="right" class="col-md-2">
						<small><span id="icone_total"><i class="bi bi-cash"></i></span> <span class="text-dark">Total: <span id="total_itens"></span></span></small>
					</div>
				</div>

				<input type="hidden" class="form-control" name="id-caixa"  id="id-caixa">

				<small><div id="listar-movimentos" class="my-4"></div></small>

			</div>

		</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Movimentação <span id="campo3"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<div class="modal-body">
				<small>
					
					
					<span><b>Tipo:</b> <span id="campo1"></span></span>
					<span class="mx-4"><b>Movimento</b> <span id="campo2" ></span>
				</span>	
				<hr style="margin:6px;">

				<span><b>Valor:</b> <span id="campo4"></span></span>
				<span class="mx-4"><b>Usuário</b> <span id="campo5" ></span>
			</span>	
			<hr style="margin:6px;">


			<span><b>Data:</b> <span id="campo6"></span></span>
			<span class="mx-4"><b>Lançamento:</b> <span id="campo7" ></span>
		</span>	
		<hr style="margin:6px;">

		<span><b>Plano de Conta</b> <span id="campo8"></span></span>
		<hr style="margin:6px;">
		<span><b>Documento</b> <span id="campo9"></span></span>
		<hr style="margin:6px;">

	</small>


</div>

</div>
</div>
</div>






<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>




<script>
	
	$("#form-fechar").submit(function () {
		event.preventDefault();
		var formData = new FormData(this);
		var pag = "<?=$pagina?>";
		$.ajax({
			url: pag + "/fechar-caixa.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {
				$('#mensagem-fechar').text('');
				$('#mensagem-fechar').removeClass()
				if (mensagem.trim() == "Fechado com Sucesso") {
					$('#btn-fechar-fechar').click();
					listar();
				} else {

					$('#mensagem-fechar').addClass('text-danger')
					$('#mensagem-fechar').text(mensagem)
				}


			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});



	function pesquisar(tipo, movimento){
	var id = $('#id-caixa').val();
    $.ajax({

        url: pag + "/listar-movimentos.php",
        method: 'POST',
        data: {id, tipo, movimento},
        dataType: "html",

        success:function(result){
            $("#listar-movimentos").html(result);
        }
    });
}

</script>



