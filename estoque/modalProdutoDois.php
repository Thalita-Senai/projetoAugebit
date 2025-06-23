
  <style>
    @font-face {
            font-family: 'Poppins';
            src: url(../Fontes/Poppins-Regular.ttf);
        }


    * {
      font-family: 'Poppins', sans-serif;
      color: #0D0D0F;
    }

    .container {
      background: white;
      border-radius: 20px;
      display: flex;
      height: 90%;
      width: 80%;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(13, 13, 15, 0.1); /* atualizado do preto */
    }

    .back {
      position: absolute;
      background-color: white;
      border: 2px solid black;
      width: 50px;
      height: 50px;
      border-radius: 25px;
      justify-content: center;
      text-align: center;
      align-content: center;
      margin-left: 430px;
      margin-top: 60px;
    }

    .back-icon {
      justify-content: center;
      font-size: 50px;
      font-weight: bold;
      width: 30px;
      height: 30px;
      margin-left: 10px;
      margin-top: -11px;
    }

    .image-section {
      object-fit: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #9999FF;
      width: 400px;
    }

    .image-section img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .content {
      width: 60%;
      padding: 50px;
      padding-left: 100px;
      position: relative;
    }

    .steps {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px 100px 50px;
    }

    .step-dot {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #4747D9;
      flex-shrink: 0;
    }

    .step-dot {
      cursor: pointer;
    }

    .step-dot.inactive {
      opacity: 0.3;
    }

    .linha {
      display: flex;
      flex-grow: 1;
      height: 5px;
      margin: 0 10px;
      border-radius: 2px;
      overflow: hidden;
    }

    .linha .metade {
      flex: 1;
      height: 100%;
    }

    .linha .ativa {
      background-color: #4747D9;
    }

    .linha .desativa {
      background-color: #9999FF;
    }

    .title {
      font-size: 50px;
      font-weight: regular;
      letter-spacing: 2px;
    }

    .info {
     display: flex;
     align-items: center; /* Isto alinha tudo no centro verticalmente */
     gap: 50px;
     margin-bottom: 20px;
     margin-left: 15px;
    }


    .info-item {
      text-align: center;
      font-size: 14px;
      width: 120px;
    }

    .description {
      text-align: left;
      margin-top: 30px;
      margin-bottom: 15px;
      width: 600px;
      
    }

    .button {
      background-color: #4747D9;
      color: white;
      padding: 10px 50px;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.3s;
      font-size: 20px;
    }

    .button:hover {
      background-color: #9999FF;
    }

    /* Bolas roxas com ícones */
    .icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #9999FF;
      background-size: 60%;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0 auto 5px;
    }

    .icon.tipo {
      background-image: url('imgs/icones/icone.png');
    }

    .icon.fornecedor {
      background-image: url('imgs/icones/fornecedorIcone.png');
    }

    .icon.dimensoes {
      background-image: url('imgs/icones/dimensoesIcone.png');
    }
    .divisor {
      width: 1px;
      height: 50px; /* ou 100% se preferir */
      background-color: black;

    }

  .modal-button {
    background-color: #4747D9;
    color: white;
    margin-top: 15px;
    padding: 10px 50px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 20px;
  }
 
  .modal-button:hover {
    background-color: #9999FF;
  }
  
  .categoria {
    text-align: left;
    width: 100%;
    display: flex;
    height: 60px;
    margin-bottom: 5px;
    flex-direction: row;
    justify-content: center;
  }

  .icon {
    width: 50px;
    margin-left: -5px;
  }

  input{
    margin-top: -15px;
    border: 0px solid transparent;
    margin-left: -530px;
    width: 350px;
    height: 35px;
    padding-bottom: 10px;
  }

  input:focus,
  input::selection {
    outline: none;
    border: none;
  }

  .c-borda:focus,
  .c-borda::selection {
    border-bottom: 2px solid black;
  }

  .titulo {
    margin-top: -3px;
    margin-left: -530px;
  }

  .c-borda {
    border-bottom: 2px solid black;
  }


  </style>

  <div class="container">
    <div class="image-section">
      <img src="../img/produtos/imgProduto.png" alt="Mouse Bluetooth">
    </div>
    <div class="back">
      <p class="back-icon"><</p>
    </div>
    <div class="content">
      <div class="steps">
        <a a href="modalProdutoUm.php" class="step-dot"></a>

        <div class="linha">
          <div class="metade ativa"></div>
          <div class="metade ativa"></div>
        </div>

        <a href="modalProdutoDois.php" class="step-dot"></a>

        <div class="linha">
          <div class="metade ativa"></div>
          <div class="metade desativa"></div>
        </div>

        <a href="modalProdutoTres.php" class="step-dot inactive"></a>
      </div>

      <div class="title">Especificações do produto</div>
      <div class="description">
        <div class="categoria">
          <img src="../img/icons/price_icon.png" alt="" class="icon">
          <div class="texto">
            <p class="titulo">Preço</p>
            <input type="text" placeholder="R$49,99" class="c-borda">
          </div>
        </div>

        <div class="categoria">
          <img src="../img/icons/image_icon.png" alt="" class="icon">
          <div class="texto">
            <p class="titulo">Imagem Principal</p>
            <input type="text" placeholder="src:imagem.png" class="c-borda">
          </div>
        </div>

        <div class="categoria">
          <img src="../img/icons/image_icon.png" alt="" class="icon">
          <div class="texto">
            <p class="titulo">Imagem Pequena</p>
            <input type="text" placeholder="tamanho quadrado - 500px x 500px">
          </div>
        </div>
      </div>
      <button class="modal-button" data-proximo="modalProdutoTres.php">Próximo</button>

    </div>
  </div>

