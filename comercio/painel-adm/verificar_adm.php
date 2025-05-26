<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'Administrador'){ ?>

	<div class="row mt-4">

		<div class="col-md-6 col-sm-12">
			<div class="mb-3">
				
				<input type="text" class="form-control" name="usuario_adm"  id="usuario_adm" placeholder="Usuário Administrador" required>
			</div>
		</div>

		<div class="col-md-6 col-sm-12">
			<div class="mb-3">
				
				<input type="password" class="form-control" name="senha_adm"  id="senha_adm" placeholder="Senha Administrador" required>
			</div>
		</div>
	</div>

	<?php } ?>