<style>
  * {
    font-family: 'Poppins', sans-serif;
    color: #0D0D0F;
  }

  .modal-container {
    background: white;
    border-radius: 20px;
    display: flex;
    height: 90%;
    width: 80%;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(13, 13, 15, 0.1);
  }

  .modal-image-section {
    object-fit: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #9999FF;
    width: 400px;
  }

  .modal-image-section img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .modal-content {
    width: 60%;
    padding: 50px;
    padding-left: 100px;
    position: relative;
  }

  .modal-steps {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 10px 100px 50px;
  }

  .modal-step-dot {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #4747D9;
    flex-shrink: 0;
    cursor: pointer;
  }

  .modal-step-dot.modal-inactive {
    opacity: 0.3;
  }

  .modal-linha {
    display: flex;
    flex-grow: 1;
    height: 5px;
    margin: 0 10px;
    border-radius: 2px;
    overflow: hidden;
  }

  .modal-linha .modal-metade {
    flex: 1;
    height: 100%;
  }

  .modal-linha .modal-ativa {
    background-color: #4747D9;
  }

  .modal-linha .modal-desativa {
    background-color: #9999FF;
  }

  .modal-title {
    font-size: 50px;
    font-weight: regular;
    margin-bottom: 50px;
    letter-spacing: 2px;
  }

  .modal-info {
    display: flex;
    align-items: center;
    gap: 50px;
    margin-bottom: 20px;
    margin-left: 15px;
  }

  .modal-info-item {
    text-align: center;
    font-size: 14px;
    width: 120px;
  }

  .modal-description {
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 30px;
    margin: 30px 0;
    font-size: 18px;
    width: 600px;
  }

  .modal-button {
    background-color: #4747D9;
    color: white;
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

  .modal-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #9999FF;
    background-size: 60%;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0 auto 5px;
  }

  .modal-icon.modal-tipo {
    background-image: url('../img/icons/icone.png');
  }

  .modal-icon.modal-fornecedor {
    background-image: url('../img/icons/fornecedorIcone.png');
  }

  .modal-icon.modal-dimensoes {
    background-image: url('../img/icons/dimensoesIcone.png');
  }

  .modal-divisor {
    width: 1px;
    height: 50px;
    background-color: black;
  }

  .chamativo {
    width: 630px;
    height: 160px;
    padding-top: 10px;
    padding-left:10px;
    border: 2px solid black;
    border-radius: 20px;
  }
</style>

<div class="modal-overlay" id="modalConteudo">
  <div class="modal-container">
    <div class="modal-image-section">

      <img src="../img/produtos/imgProduto.png" alt="Mouse Bluetooth">
    </div>
    <div class="modal-content">
      <div class="modal-steps">
        <a href="modalProdutoUm.php" class="modal-step-dot"></a>

        <div class="modal-linha">
          <div class="modal-metade modal-ativa"></div>
          <div class="modal-metade modal-desativa"></div>
        </div>

        <a href="modalProdutoDois.php" class="modal-step-dot modal-inactive"></a>
        <div class="modal-linha">
          <div class="modal-metade modal-desativa"></div>
          <div class="modal-metade modal-desativa"></div>
        </div>

        <a href="modalProdutoTres.php" class="modal-step-dot modal-inactive"></a>
      </div>

      <div class="modal-title">Mouse Bluetooth</div>

      <div class="modal-info">
        <div class="modal-info-item">
          <div class="modal-icon modal-tipo"></div><br>
          Tipo<br>
          <input type="text" placeholder="Selecionar" class="input1">
        </div>
        <div class="modal-divisor"></div>
        <div class="modal-info-item">
          <div class="modal-icon modal-fornecedor"></div><br>
          Fornecedor<br>
          <input type="text" placeholder="Nome" class="input2">
        </div>
        <div class="modal-divisor"></div>
        <div class="modal-info-item">
          <div class="modal-icon modal-dimensoes"></div><br>
          Dimensões<br>
          <input type="text" placeholder="0cmx0cmx0cm" class="input3">
        </div>
      </div>

      <div class="modal-description">
        <textarea name="chamativo" id="chamativo" class="chamativo" placeholder="Resumo chamativo do produto"></textarea>
      </div>

      <button class="modal-button" data-proximo="modalProdutoDois.php">Próximo</button>
    </div>
  </div>
</div>
