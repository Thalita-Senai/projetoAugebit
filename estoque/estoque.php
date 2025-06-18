<?php
// produtos.php

// Conexão com banco de dados
$host = 'localhost';
$db   = 'produtos';    // seu banco de dados
$user = 'root';       // seu usuário MySQL
$pass = '';           // sua senha MySQL (se houver)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Buscar produtos
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Estoque - Produtos</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
    body {
        font-family: 'Poppins';
            src: url(../estilo/Fontes/Poppins-Regular.ttf);
    background: #f9f9f9;
    margin: 0;
    padding: 20px;
}
* {
            font-family: 'Poppins';
            src: url(../estilo/Fontes/Poppins-Regular.ttf);
        }
@font-face {
            font-family: 'Poppins';
            src: url(../estilo/Fontes/Poppins-Regular.ttf);
        }
header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 65px;
            display: flex;
            align-items: center;
            margin-left: 20px;
            z-index: 1000;
            background-color: transparent;
            transition: background-color 0.3s ease, color 0.3s ease;
            }

            .logo {
            margin-left: 175px;
            margin-right: 360px;
            height: 50px;
            width: 60px;
            cursor: pointer;
            }

            /* Estilo base */
            .botao1, .botao2 {
            width: 158px;
            height: 47px;
            border-radius: 27px;
            font-size: 20px;
            margin-right: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            }
            /* modo azul */
            header .botao1 {
            background-color: #5C00FF;
            color: white;
            border: none;
            }

            header .botao1:hover {
            background-color: transparent;
            color: #5C00FF;
            border: 3px solid #5C00FF;
            }

            header .botao2 {
            background-color: transparent;
            color: #5C00FF;
            border: 3px solid #5C00FF;
            }

            header .botao2:hover {
            background-color: #5C00FF;
            color: white;
            }
            @font-face {
            font-family: 'Poppins';
            src: url(./Fontes/Poppins-Regular.ttf);
        }


.container {
    width: 95%;
    max-width: 1200px;
    margin: auto;
}

.top-bar {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 20px;
}
.titulos-grid,
.produto-card {
    display: grid;
    grid-template-columns:
        260px /* Produto */
        120px /* Tipo */
        190px /* Fornecedor */
        130px /* ID */
        150px /* Disponível */
        140px /* Valor */
        140px /* Demanda */
        40px; /* Menu */
    align-items: center;
    padding: 10px 15px;
    margin-bottom: 10px;
    background: white;
    border-radius: 10px;
    border: 1px solid #ccc;
}


.titulos-grid {
    font-weight: 600;
    color: #444;
    background: transparent;
    border: none;
}



.col-tipo {
    text-align: center;
}


/* Conteúdo da coluna de produto */
.col-produto-content {
    display: flex;
    align-items: center;
    gap: 10px;
}

.search-container {
    position: relative;
    flex: 1;
}

.lupa-icon {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #888;
    font-size: 16px;
    pointer-events: none;
}

.search-input {
    width: 850px;
    padding: 10px 15px 10px 40px; /* espaço extra à esquerda p/ a lupa */
    border-radius: 25px;
    border: 1px solid #ccc;
    font-size: 14px;
}


.btn {
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    cursor: pointer;
}

.categorias {
    background-color: #003087;
    color: white;
}

.filtrar {
    background-color: #d8c16a;
    color: #000;
}

.titulos {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: 600;
    color: #444;
}

.col-produto {
    display: flex;
    align-items: center;
    gap: 10px;
}



.produto-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: 14px;
}
.produto-info small {
    display: -webkit-box;
    -webkit-line-clamp: 2;  /* número máximo de linhas visíveis */
    -webkit-box-orient: vertical;  
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 12px;
    color: #777;
}
.produto-info strong {
    display: block;
    font-size: 14px;
    margin-bottom: 3px;
}
.produto-info div {
    font-size: 13px;
    color: #555;
    margin-bottom: 3px;
}

/* Outras colunas */
.col-tipo,
.col-fornecedor,
.col-id,
.col-disponivel,
.col-valor,
.col-demanda,
.col-menu {
    text-align: center;
    font-size: 14px;

}
.produto-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 30px;
    margin-right: 20px;
    border: 1px solid black;
}



.col-menu {
    font-size: 20px;
    cursor: pointer;
}


.menu {
    font-size: 20px;
    cursor: pointer;
}
.dropdown-categorias {
    position: absolute;
    top: 500px; /* Ajuste conforme altura da barra */
    right: 160px; /* Ajuste baseado na posição do botão */
    background: white;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 250px;
    display: none;
    z-index: 10;
    border-radius: 10px;
    border: 1px solid #4747D9;
}

.dropdown-categorias ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.dropdown-categorias li {

    padding: 10px 15px;
    cursor: pointer;
    transition: background 0.2s;
}
.ata {
        border-bottom: 1px solid #4747D9;
}
.dropdown-categorias li:hover {
    background: #f2f2f2;
}
.cmc {
    margin: 50px 125px;
    gap: 15px;
}
.cmc img {
    border-radius: 25px;
}
.novo {
    height: 325px;
    width: 325px;
}
.pizza {
    width: 440px;
    height: 325px;
}
.grafico {
    width: 440px;
    height: 325px;
}
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-conteudo {
  background: white;
  padding: 20px;
  width: 90%;
  max-width: 600px;
  border-radius: 10px;
  position: relative;
}




</style>
<body>

<?php include_once('../estilo/headerAzul.php'); ?>

    <div class="cmc">
        <img class="grafico" src="../estilo/imgs/Grafico.png" alt="">
        <img class="pizza" src="../estilo/imgs/Pizza.png" alt="">
        <img class="novo" src="../estilo/imgs/novoProduto.png" alt="">
    </div>
    <div class="container">
    <div class="top-bar">
        <div class="search-container">
            <i class="fa fa-search lupa-icon"></i>
            <input type="text" placeholder="Pesquisar produto" class="search-input">
        </div>

        <button class="btn categorias">Categorias <span class="seta">▾</span></button>
        <div class="dropdown-categorias">
    <ul>
        <li class="ata">Todos</li>
        <li class="ata">Periféricos</li>
        <li class="ata">Equipamentos</li>
        <li class="ata">Cabos e conectividade</li>
        <li class="ata">Impressão e digitalização</li>
        <li class="eita">Manutenção e peças</li>
    </ul>
</div>
        <button class="btn filtrar" onclick="abrirModalProduto()">Adicionar &emsp;<span class="icone-adicionar">+</span></button>
        <!-- Container para os modais -->
<div id="containerModalProduto" class="modal-overlay" style="display: none;"></div>
    </div>

   <div class="titulos-grid">
        <span class="col-produto">Produto</span>
        <span class="col-tipo">Tipo</span>
        <span class="col-fornecedor">Fornecedor</span>
        <span class="col-id">ID</span>
        <span class="col-disponivel">Disponível</span>
        <span class="col-valor">Valor</span>
        <span class="col-demanda">Demanda</span>
        <span class="col-menu"></span>
    </div>






    <?php foreach ($produtos as $produto): ?>
        <?php
            // Extrair dados para variáveis para passar para o card
            $id = $produto['id'];
            $imagemPainel = $produto['imagemPainel'];
            $imagemPng = $produto['imagemPng'];
            $nome = $produto['nome'];
            $tipo = $produto['tipo'];
            $fornecedor = $produto['fornecedor'];
            $dimensoes = $produto['dimensoes'];
            $estoque = $produto['estoque'];
            $valor = $produto['valor'];
            $resumo = $produto['resumo'];
            $detalhes = $produto['detalhes'];
            $demanda = $produto['demanda'];

            // Incluir o card
            include 'produto-card.php';
        ?>
    <?php endforeach; ?>

</div>
<script>
 const btnCategorias = document.querySelector('.btn.categorias');
const dropdown = document.querySelector('.dropdown-categorias');

btnCategorias.addEventListener('click', () => {
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

// Fecha o dropdown se clicar fora
window.addEventListener('click', (e) => {
    if (!btnCategorias.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});

const categoriaItens = document.querySelectorAll('.dropdown-categorias li');
const produtoCards = document.querySelectorAll('.produto-card');

categoriaItens.forEach(item => {
    item.addEventListener('click', () => {
        const tipoSelecionado = item.textContent.trim();

        if (tipoSelecionado === 'Todos') {
            produtoCards.forEach(card => {
                card.style.display = 'grid'; // mostra todos
            });
        } else {
            produtoCards.forEach(card => {
                const tipoProduto = card.getAttribute('data-tipo');
                if (tipoProduto === tipoSelecionado) {
                    card.style.display = 'grid'; // mostra
                } else {
                    card.style.display = 'none'; // esconde
                }
            });
        }

        // Esconde o dropdown depois de selecionar
        dropdown.style.display = 'none';
    });
});

const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', () => {
    const termo = searchInput.value.trim().toLowerCase();

    produtoCards.forEach(card => {
        const nome = card.getAttribute('data-nome');
        const id = card.getAttribute('data-id');

        const corresponde = nome.includes(termo) || id.includes(termo);

        card.style.display = corresponde ? 'grid' : 'none';
    });
});

function abrirModalProduto() {
  carregarModal('modalProdutoUm.php');
}

function carregarModal(url) {
  fetch(url)
    .then(res => res.text())
    .then(html => {
      const container = document.getElementById('containerModalProduto');
      container.innerHTML = html;
      container.style.display = 'flex';

      // Depois que o modal abrir, adiciona o evento de clique para fechar ao clicar fora
      container.onclick = function(event) {
        const conteudo = document.querySelector('#modalConteudo .modal-container');
        if (conteudo && !conteudo.contains(event.target)) {
          fecharModalProduto();
        }
      };
    })
    .catch(err => {
      console.error('Erro ao carregar modal:', err);
    });
}

function fecharModalProduto() {
  const container = document.getElementById('containerModalProduto');
  container.style.display = 'none';
  container.innerHTML = '';
  container.onclick = null;
}


// Usa delegação para ouvir cliques dentro do modal
document.addEventListener('click', function (e) {
  if (e.target.classList.contains('modal-button')) {
    const proximo = e.target.getAttribute('data-proximo');
    if (proximo) {
      carregarModal(proximo); // já definida no seu código anterior
    }
  }
});



</script>
</body>
</html>
