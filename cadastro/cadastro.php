<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <link href="img/icone.png" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../css/estilo-cadastro.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header1.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Augebit</title>
</head>
<body class="bg-light">

<?php
$html = file_get_contents('../header1.html');
echo $html;
?>

<div class="container">
    <div class="row">
        <div class="wall1">
           <br><br><br><br>
            <div class="account-wall">
                <form class="form-signin" method="post" action="autenticar.php">
                <p class="titulo1">CADASTRE-SE</p>
                <div class="form-control_mb-2">
                    <img src="../img/icons/cpf_icon.png" alt="" class="icon">
                    <input type="text" name="cpf" class="form-control_mb-1" placeholder="insira seu CPF">
                </div>
                <div class="form-control_mb-2">
                    <img src="../img/icons/email_icon.png" alt="" class="icon">
                    <input type="email" name="email" placeholder="inserir seu Email" required value="">
                </div>
                <div class="form-control_mb-2">
                    <img src="../img/icons/senha_icon.png" alt="" class="icon">
                    <input type="password" name="senha" placeholder="inserir sua Senha" required value="">
                </div>
                <div class="d-grid gap-2 mt-2">
                <div class="texto">
                    <input type="checkbox">
                    <p class="subtexto">Eu concordo com os</p>
                    <a href="https://youtu.be/dQw4w9WgXcQ?si=kCa7HNSa0xfoG8Oi" target="_blank" rel="noopener noreferrer">Termos de Serviço</a>
                </div>
                <div class="captcha">
                    <input type="checkbox" class="iso">
                </div>        
                </div>    
                </form>
            </div>
        </div>
        <div class="wall2">
                    <p class="titulo2">Bem-vindo a AUGEBIT</p>
                    <div class="custom-select" style="width:325px">
                        <select name="cargo" id="selecao_cargo">
                            <option value="0">Selecione Seu Setor:</option>
                            <option value="1">Serviços de Treinamentos Industriais</option>
                            <option value="2">Serviços de Projetos Industriais</option>
                            <option value="3">Departamento de Recursos Humanos</option>
                            <option value="4">Departamento de Suprimentos</option>
                        </select>
                    </div>
                    <button class="btn_btn-primary" type="submit">CADASTRE-SE</button>
        </div>
    </div>
    
</div>

 <Script src="cadastro.js"></Script>
</body>
</html>