<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    
    <link href="img/icone.png" rel="shortcut icon" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../css/estilo-novidade2.css" rel="stylesheet">


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
        <div class="caixona">
            <p class="titulo1">Augebit de cara nova</p>
            <div class="itens">
                <p class="subtitulo1">15 de mai. 2025</p>
                <button class="butão">
                    <img src="../img/icons/lapis_icon.png" alt="">
                </button>
            </div>
            <img src="../img/banners/banner_novidades2.png" alt="" class="banner_pc">
            <p class="titulo12">Novo site, mais ágil e moderno.</p>
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
    </div>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Criar 1 Novidade</button>

        <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <p class="title">Criar Novo Post</p>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="coluna1">
                    <button class="imag">X</button>
                    <img src="../img/banners/placeholder.png" alt="" class="placeholder">
                    <button class="arquivo">Arquivos</button>
                </div>
                <div class="coluna2">
                    <p class="titulo-post">Titulo:</p>
                    <input type="text" class="input-pequeno">
                    <p class="titulo-post">Descrição:</p>
                    <textarea name="descricao" cols="40" rows="5" class="descricao"></textarea>
                    <p class="titulo-post">Elementos principais:</p>
                    <div class="linha">
                        <img src="../img/icons/novidade_icon.png" alt="" class="icon">
                        <input type="text" class="input-pequeno2">
                    </div>
                    <div class="linha">
                        <img src="../img/icons/novidade_icon.png" alt="" class="icon">
                        <input type="text" class="input-pequeno2">
                    </div>
                    <div class="botoes">
                        <button class="enviar">Enviar</button>
                        <button class="descartar">Descartar</button>
                    </div>
                </div>
            </div>
            <div class="modal_footer"></div>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn_2">Criar 3 Novidade</button>

        <!-- The Modal -->
    <div id="myModal_2" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <p class="title">Criar 3 novidades principais</p>
                <span class="close2">&times;</span>
            </div>
            <div class="modal-body">
                <div class="steps">
                    <a a href="modalProdutoUm.php" class="step-dot"></a>
                    <div class="linha">
                        <div class="metade-ativa"></div>
                        <div class="metade-ativa"></div>
                    </div>
                    <a href="modalProdutoDois.php" class="step-dot"></a>

                    <div class="linha">
                        <div class="metade-ativa"></div>
                        <div class="metade-ativa"></div>
                    </div>
                    <a href="modalProdutoTres.php" class="step-dot"></a>
                </div>
            </div>
        </div>
    </div>


        <!-- The Modal -->
    <div id="myModal_3" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>
    </div>


    <script>
        // Get the modal
        var modal1 = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn1 = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span1 = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn1.onclick = function() {
            modal1.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span1.onclick = function() {
             modal1.style.display = "none";
        }

         // Get the modal
        var modal2 = document.getElementById("myModal_2");

        // Get the button that opens the modal
        var btn2 = document.getElementById("myBtn_2");

        // Get the <span> element that closes the modal
        var span2 = document.getElementsByClassName("close2")[0];

        // When the user clicks on the button, open the modal
        btn2.onclick = function() {
            modal2.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span2.onclick = function() {
             modal2.style.display = "none";
        }


    </script>
</body>
</html>