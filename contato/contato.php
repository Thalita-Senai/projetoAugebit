<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <link href="img/icone.png" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../css/estilo-contato.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header1.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Augebit</title>
</head>
<body>

<?php
$html = file_get_contents('../header1.html');
echo $html;
?>

<div class="row">
    <div class="esquerda">
        <p class="t1">Tem Alguma Pergunta?</p>
        <p class="t2">Contate-nos</p>
    </div>
    <div class="direita">
            <div class="coisos">
                <img src="../img/icons/user_icon.png" alt="" class="icon">
                <input type="text" placeholder="Nome" required>
                <hr>
            </div>
            <div class="coisos">
                <img src="../img/icons/email2_icon.png" alt="" class="icon">
                <input type="email" placeholder="Email" required>
                <hr>
            </div>
            <div class="coisos">
                <img src="../img/icons/question_icon.png" alt="" class="icon">
                <input type="text" class="pergunta" placeholder="Faça uma Pergunta" required>
                <hr>
            </div>
            <div class="coisos">
                <img src="../img/icons/id_icon.png" alt="" class="icon">
                <input type="text" placeholder="Adicionar ID de Pedido Específico">
                <hr>
            </div>
            <button class="btn_btn-primary">Enviar</button>
    </div>
</div>

<script src="contato.js"></script>
</body>
</html>