<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <link href="img/icone.png" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../css/estilo-novidade.css" rel="stylesheet">


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
            <img src="../img/banners/banner_novidades1.png" alt="" class="novidades">
        </div>
        <div class="colunas">
            <div class="coluna1">
                <p class="titulo1">Augebit de cara nova</p>
                <p class="subtitulo1">15 de mai. 2025</p>
            </div>
            <div class="coluna2">
                <img src="../img/banners/banner_novidades2.png" alt="" class="banner_pc">
                <p class="titulo1">Novo site, mais ágil e moderno.</p>
                <p class="texto">Lançamos o novo visual do site da Augebit! Agora com navegação mais rápida, compatibilidade total com dispositivos móveis e um layout mais intuitivo para facilitar sua busca por suprimentos de informática.</p>
                <p class="titulo2">Novidades</p>
                <div class="itens">
                    <img src="../img/icons/novidade_icon.png" alt="" class="icone">
                    <p class="subtexto">Interface otimizada para desktop e mobile</p>
                </div>
                <div class="itens">
                    <img src="../img/icons/novidade_icon.png" alt="" class="icone">
                    <p class="subtexto">Navegação mais simples e direta</p>
                </div>
                <div class="area">
                    <div class="caixa">
                        <a href="" class="explorar">Explore</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="titulos">
            <div class="nomes">
                <p class="titulo_azul">Título</p>
                <p class="subtitulo_azul">15 de mai. 2025</p>
                <p class="titulo_aqua">Título</p>
                <p class="subtitulo_aqua">15 de mai. 2025</p>
                <p class="titulo_rosa">Título</p>
                <p class="subtitulo_rosa">15 de mai. 2025</p>
            </div>
            <img src="../img/banners/banner_novidades3.png" alt="" class="banner_pc">
        </div>
    </div>

</body>
</html>