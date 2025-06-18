<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <link href="img/icone.png" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../css/estilo-produtos.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Augebit</title>
</head>
<body>
    <div class="fundo">
        <?php
        $html = file_get_contents('header_pb.html');
        echo $html;
        ?>
        <div class="banner">
            <img src="../img/banners/banner_produtos.png" alt="" class="produtos">
            <p class="title">Tecnologia hightech para você</p>
            <p class="subtitle">Peça os suprimentos de informática que você precisa.</p>
        </div>
        <div class="colunas">
            <div class="coluna1">
                <div class="nome">
                    <img src="../img/logo_pequena.png" alt="" class="logo_name">
                    <p class="name">AUGEBIT</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/mouse.png" alt="" class="icone">
                    <p class="category">Periféricos</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/computer.png" alt="" class="icone">
                    <p class="category">Equipamentos</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/cabos.png" alt="" class="icone">
                    <p class="category">Cabos e conectividade</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/impressora.png" alt="" class="icone">
                    <p class="category">Impressão e digitalização</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/usb.png" alt="" class="icone">
                    <p class="category">Manutenção e peças</p>
                </div>
                <div class="categoria">
                    <img src="../img/icons/pedidos.png" alt="" class="icone">
                    <p class="category">Meus pedidos</p>
                </div>
            </div>
            <div class="coluna2">
                <p class="titulo">Procure por categorias</p>
                <div class="categorias">
                    <div class="cat">
                        <div class="botao">
                            <img src="../img/icons/mouse_azul.png" alt="" class="bt_icon">
                        </div>
                        <p class="cat-title">Periféricos</p>
                    </div>
                    <div class="cat">
                        <div class="botao">
                            <img src="../img/icons/impressora_azul.png" alt="" class="bt_icon">
                        </div>
                        <p class="cat-title">Equipamentos</p>
                    </div>
                    <div class="cat">
                        <div class="botao">
                            <img src="../img/icons/cabos_azul.png" alt="" class="bt_icon">
                        </div>
                        <p class="cat-title">Cabos e conectividade</p>
                    </div>
                    <div class="cat">
                        <div class="botao">
                            <img src="../img/icons/impressora_azul.png" alt="" class="bt_icon">
                        </div>
                        <p class="cat-title">Impressão e digitalização</p>
                    </div>
                    <div class="cat">
                        <div class="botao">
                            <img src="../img/icons/usb_azul.png" alt="" class="bt_icon">
                        </div>
                        <p class="cat-title">Manutenção e peças</p>
                    </div>
                </div>
                <p class="titulo">Confira as novidades</p>
                <div class="novidades">
                    <div class="produto">
                        <div class="adicionar">
                            <img src="../img/icons/adicionar_icon.png" alt="" class="add">
                        </div>
                        <div class="conteudo">
                            <img src="../img/produtos/teclado.png" alt="" class="banner2">
                            <p class="nome-prod">Teclado Mecânico de Baixo Ruído</p>
                            <p class="sub-prod">Digitação com menos barulho no ambiente</p>
                        </div>
                    </div>
                    <div class="produto">
                        <div class="adicionar">
                            <img src="../img/icons/adicionar_icon.png" alt="" class="add">
                        </div>
                        <div class="conteudo">
                            <img src="../img/produtos/teclado.png" alt="" class="banner2">
                            <p class="nome-prod">Teclado Mecânico de Baixo Ruído</p>
                            <p class="sub-prod">Digitação com menos barulho no ambiente</p>
                        </div>
                    </div>
                </div>
                <div class="linha">
                    <p class="texto">Gostou? Veja mais</p>
                    <a href="">aqui</a>
                </div>
                <div class="nomes">
                    <p class="titulo3">Periféricos</p>
                    <button class="esquerda"><</button>
                    <button class="direita">></button>
                </div>
                <div class="perifericos">
                    <div class="conteudo_b">
                        <p class="texto">oier</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>