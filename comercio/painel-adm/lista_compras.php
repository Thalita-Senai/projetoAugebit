<?php 
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'lista_compras';

require_once($pagina."/campos.php");

?>

<div class="col-md-12 my-3">
	<a href="index.php?pag=<?php echo $menu21?>" type="button" class="btn btn-dark btn-sm">Nova Compra</a>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Cancelar Compra</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente cancelar esta Compra? <span id="nome-excluido"></span>?

					<?php require_once("verificar_adm.php"); ?>

					<small><div id="mensagem-excluir" align="center"></div></small>

					<input type="hidden" class="form-control" name="id-excluir"  id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Compra - SubTotal: R$ <span id="campo1"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
				<div class="modal-body">
					<small>
					
					
						<span><b>Usuário:</b> <span id="campo2"></span></span>
						<span class="mx-4"><b>Pagamento:</b> <span id="campo3" ></span>
						</span>	
						<hr style="margin:6px;">

						<span><b>Lançamento:</b> <span id="campo4"></span></span>
						<span class="mx-4"><b>Vencimento:</b> <span id="campo6" ></span>
						</span>	
						<hr style="margin:6px;">

											

						
						<span><b>SubTotal:</b> R$ <span id="subtot" ></span>
						</span>	
						<hr style="margin:6px;">

						<span><b>Parcelas:</b> <span id="campo10"></span></span>
						<span class="mx-4"><b>Status:</b> <span id="campo11" ></span>
						</span>	
						<hr style="margin:6px;">

						<span><b>Cliente:</b> <span id="campo12"></span></span>
						
						<hr style="margin:6px;">


						<small><div id="listar-parcelas"></div></small>
						
						

					</small>


				</div>
				
		</div>
	</div>
</div>


<script type="text/javascript">var pag = "<?=$pagina?>"</script>
<script src="../js/ajax.js"></script>




