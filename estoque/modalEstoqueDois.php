
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

    .image-section {
      object-fit: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #9999FF;
      width: 400px;
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
      font-style: bold;
      width: 30px;
      height: 30px;
      margin-left: 10px;
      margin-top: -11px;
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
      padding-right: 50px;
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
      margin-bottom: 50px;
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
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 30px;
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
      transition: 1.1s;
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
  .description {
    margin: 80px 0 90px;
    font-size: 18px;
    width: 600px;
  }
  textarea {
    margin: 20px 0;
    width: 75%; 
    height: 200px; 
    border-radius: 10px; 
    border: 1px solid black; 
    background-color: transparent; 
    color: black; 
    padding: 20px; 
    resize: none; 
    font-size: 19px; 
    box-sizing: border-box;
  }
  .subtitulo {
    font-size: 20px;
    width:90%;
    line-height: 1.3;
  }
  
  .descricao {
    width: 100%;
    display: flex;
    flex-direction: row;
  }

  .coiso {
    margin-top: 20px;
    background-color: #CBCBFF;
    height: 200px;
    width: 25%;
    margin-left: 10px;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
  }

  .icone {
    width: 85px;
  }

  .texto,
  .texto::placeholder {
    font-size: 20px;
    font-weight: bold;
    margin-left: 15px;
    color: black;
    width: 45px;
    background-color: transparent;
    border: 0px solid transparent;
  }


  input:focus,
  input::selection {
    outline: none;
    border: none;
  }

  .subtexto {
    color: #0D0D0F;
    opacity: 50%;
    height: 30px;
    margin-top: 10px;
    margin-left: 15px;
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
        <a a href="modalEstoqueUm.php" class="step-dot"></a>

        <div class="linha">
          <div class="metade ativa"></div>
          <div class="metade ativa"></div>
        </div>

        <a href="modalEstoqueDois.php" class="step-dot"></a>

        <div class="linha">
          <div class="metade ativa"></div>
          <div class="metade desativa"></div>
        </div>

        <a href="modalEstoqueTres.php" class="step-dot inactive"></a>
      </div>

      <div class="title">Detalhes e quantidade</div>
      <div class="descricao">
        <textarea placeholder="Descrição dos detalhes do produto"></textarea>
        <div class="coiso">
          <img src="../img/icons/estoque_icon.png" alt="" class="icone">
          <input type="text" class="texto" placeholder="125">
          <p class="subtexto">Quantidade em Estoque</p>
        </div>
      </div>
      <button class="button">Próximo</button>
    </div>
  </div>

