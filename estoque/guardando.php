
  <style>



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
    margin: 30px 0;
    font-size: 18px;
    width: 600px;
  }



  </style>
  <div class="container">
    <div class="image-section">
      <img src="../estilo/imgs/DefaultPainel.png" alt="Mouse Bluetooth">
    </div>
    <div class="content">
      <div class="steps">
        <a a href="modalProdutoUm.php" class="step-dot"></a>

        <div class="linha">
          <div class="metade ativa"></div>
          <div class="metade desativa"></div>
        </div>

        <a href="modalProdutoDois.php" class="step-dot inactive"></a>

        <div class="linha">
          <div class="metade desativa"></div>
          <div class="metade desativa"></div>
        </div>

        <a href="modalProdutoTres.php" class="step-dot inactive"></a>
      </div>

      <div class="title">Mouse Bluetooth</div>
      <div class="info">
        <div class="info-item">
          <div class="icon tipo"></div><br>
          Tipo<br>Periféricos
        </div>
        <div class="divisor"></div>
        <div class="info-item">
          <div class="icon fornecedor"></div><br>
          Fornecedor<br>Venox
        </div>
        <div class="divisor"></div>
        <div class="info-item">
          <div class="icon dimensoes"></div><br>
          Dimensões<br>11cm x 6cm x 4cm
        </div>
      </div>
      <div class="description">
        Com design moderno e iluminação RGB, o mouse TechPro vai transformar sua experiência no computador. Sua ergonomia e desempenho garantem conforto e precisão, seja no trabalho ou em momentos de lazer. Personalize as cores e brilhe em grande estilo!
      </div>
      <button class="button">Próximo</button>
    </div>
  </div>

