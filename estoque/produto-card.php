<?php
// produto-card.php

$id = $id ?? '';
$imagemPng = $imagemPng ?? '';
$nome = $nome ?? '';
$tipo = $tipo ?? '';
$fornecedor = $fornecedor ?? '';
$dimensoes = $dimensoes ?? '';
$resumo = $resumo ?? '';
$detalhes = $detalhes ?? '';
$demanda = $demanda ?? '';
$estoque = $estoque ?? '';
$valor = $valor ?? '';
?>

<div class="produto-card" data-tipo="<?= htmlspecialchars($tipo) ?>" 
                        data-nome="<?= htmlspecialchars(strtolower($nome)) ?>" 
                        data-id="<?= htmlspecialchars($id) ?>">
    <div class="col-produto">
        <img src="<?php echo htmlspecialchars($imagemPng); ?>" alt="<?php echo htmlspecialchars($nome); ?>" class="produto-img">
        <strong><?php echo htmlspecialchars($nome); ?></strong>
    </div>

    <div class="col-tipo"><?php echo htmlspecialchars($tipo); ?></div>
    <div class="col-fornecedor"><?php echo htmlspecialchars($fornecedor); ?></div>
    <div class="col-id">id: <?php echo htmlspecialchars($id); ?></div>
    <div class="col-disponivel"><?php echo htmlspecialchars($dimensoes); ?></div>
    <div class="col-valor">R$ <?php echo number_format($valor, 2, ',', '.'); ?></div>
    <div class="col-demanda"><?php echo htmlspecialchars($demanda); ?></div>
    <div class="col-menu">⋮</div>
</div>


    

