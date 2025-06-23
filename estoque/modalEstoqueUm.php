<style>
  @font-face {
            font-family: 'Poppins';
            src: url(../Fontes/Poppins-Regular.ttf);
        }
  
  * {
    font-family: 'Poppins', sans-serif;
    color: #0D0D0F;
  }

  .modal-container {
    background: white;
    border-radius: 20px;
    display: flex;
    height: 95%;
    width: 80%;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(13, 13, 15, 0.1);
  }

  .edit {
    position: absolute;
    margin-top: 625px;
    width: 50px;
    height: 50px;
    border-radius: 30px;
    justify-content: center;
    background-color: white;
    margin-left: 310px;
    border: 3px solid #4747D9;
  }

  .edit-icon {
    width: 45px;
    height: 45px;
  }

  .produto-name,
  .produto-name::placeholder {
    font-size: 50px;
    color: black;
    width: 600px;
    outline: none;
    border-top: 0px solid transparent;
    border-left: 0px solid transparent;
    border-right: 0px solid transparent;
    border-bottom: 2px solid black;

  }

  .produto-name:focus,
  .produto-name::selection {
    outline: none;
    border-top: 0px solid transparent;
    border-left: 0px solid transparent;
    border-right: 0px solid transparent;
    border-bottom: 2px solid black;
  }
  

  .input1,
  .input2,
  .input3 {
    margin-top: -20px;
    border: 0px solid transparent;
  }

  .input1:focus,
  .input1::selection,
  .input2:focus,
  .input2::selection,
  .input3:focus,
  .input3::selection {
    outline: none;
    border: none;
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

  p {
    font-size: 25px;
    color: black;
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
    margin-top: -15px;
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
    margin-top: -14px;
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
    width: 65px;
    height: 65px;
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

  .input1 {
    font-family: 'Poppins';
    font-size: 15px;
    width: 130px;
    text-align: center;
  }

  .input2 {
    font-family: 'Poppins';
    font-size: 15px;
    width: 130px;
    text-align: center;
  }

  .input3 {
    font-family: 'Poppins';
    font-size: 15px;
    width: 130px;
    text-align: center;
  }

  .chamativo {
    font-family: 'Poppins';
    font-size: 15px;  
    margin-top: -10px;
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
    <div class="edit">
        <img src="../img/icons/edit_icon.png" alt="" class="edit-icon">
    </div>
    <div class="modal-image-section">

      <img src="../img/produtos/imgProduto.png" alt="Mouse Bluetooth">
    </div>
    <div class="modal-content">
      <div class="modal-steps">
        <a href="modalEstoqueUm.php" class="modal-step-dot"></a>

        <div class="modal-linha">
          <div class="modal-metade modal-ativa"></div>
          <div class="modal-metade modal-desativa"></div>
        </div>

        <a href="modalEstoqueDois.php" class="modal-step-dot modal-inactive"></a>
        <div class="modal-linha">
          <div class="modal-metade modal-desativa"></div>
          <div class="modal-metade modal-desativa"></div>
        </div>

        <a href="modalEstoqueTres.php" class="modal-step-dot modal-inactive"></a>
      </div>

      <div class="modal-title">
        <input type="text" placeholder="Nome do Produto" class="produto-name">
      </div>

      <div class="modal-info">
        <div class="modal-info-item">
          <div class="modal-icon modal-tipo"></div>
          <p>Tipo</p>
          <input type="text" placeholder="Selecionar" class="input1">
        </div>
        <div class="modal-divisor"></div>
        <div class="modal-info-item">
          <div class="modal-icon modal-fornecedor"></div>
          <p>Fornecedor</p>
          <input type="text" placeholder="Nome" class="input2">
        </div>
        <div class="modal-divisor"></div>
        <div class="modal-info-item">
          <div class="modal-icon modal-dimensoes"></div>
          <p>Dimensões</p>
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
