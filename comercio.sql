-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/04/2025 às 18:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `comercio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bancarias`
--

CREATE TABLE `bancarias` (
  `id` int(11) NOT NULL,
  `banco` varchar(25) NOT NULL,
  `agencia` varchar(20) NOT NULL,
  `conta` varchar(20) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `bancarias`
--

INSERT INTO `bancarias` (`id`, `banco`, `agencia`, `conta`, `tipo`, `pessoa`, `doc`) VALUES
(1, 'Banco do Brasil', '0125-7', '55889-7', 'Corrente', 'Física', '255.455.555-55'),
(2, 'Nubank', '0125-8', '55819-1', 'Corrente', 'Jurídica', '25.485.555/5555-55'),
(5, 'Santander', '1558-9', '44255-5', 'Corrente', 'Física', '125.555.555-55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `bancos`
--

INSERT INTO `bancos` (`id`, `nome`) VALUES
(1, 'Bradesco'),
(2, 'Itaú'),
(3, 'Banco do Brasil'),
(4, 'Santander'),
(5, 'Caixa Econômica'),
(6, 'Nubank'),
(7, 'Mercado Pago');

-- --------------------------------------------------------

--
-- Estrutura para tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(11) NOT NULL,
  `data_ab` date NOT NULL,
  `valor_ab` decimal(8,2) DEFAULT NULL,
  `usuario_ab` int(11) NOT NULL,
  `data_fec` date DEFAULT NULL,
  `usuario_fec` int(11) NOT NULL,
  `saldo` decimal(8,2) DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `caixa`
--

INSERT INTO `caixa` (`id`, `data_ab`, `valor_ab`, `usuario_ab`, `data_fec`, `usuario_fec`, `saldo`, `status`) VALUES
(7, '2025-04-20', 600.00, 1, NULL, 0, NULL, 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cat_despesas`
--

CREATE TABLE `cat_despesas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cat_despesas`
--

INSERT INTO `cat_despesas` (`id`, `nome`) VALUES
(2, 'Empresa'),
(3, 'Residência'),
(6, 'Despesa Pessoal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cat_produtos`
--

CREATE TABLE `cat_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cat_produtos`
--

INSERT INTO `cat_produtos` (`id`, `nome`) VALUES
(1, 'Sapatos'),
(2, 'Bermudas'),
(3, 'Calças'),
(8, 'Camisas'),
(9, 'Camisetas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `pessoa`, `doc`, `telefone`, `endereco`, `ativo`, `obs`, `data`, `banco`, `agencia`, `conta`, `email`) VALUES
(1, 'Alana', 'Física', '000.000.000-50', '', NULL, 'Sim', NULL, '2025-03-27', NULL, NULL, NULL, 'cliente@cliente.com'),
(3, 'Empresa A', 'Jurídica', '44.455.555/5555-52', '(55) 88888-8888', 'Rua D', 'Sim', 'Nenhuma', '2025-04-13', 'Nubank', '0125-7', '55889-7', 'empresax@hotmail.com'),
(5, 'Marina Silva', 'Física', '454.885.555-57', '(58) 65555-5555', 'Rua C', 'Sim', 'Rua C', '2025-04-19', '', '', '', 'marina@hotmail.com'),
(6, 'Karolina Souza', 'Física', '648.525.555-55', '(11) 97139-0746', 'Rua D', 'Sim', '', '2025-02-09', '', '', '', 'karol@hotmail.com'),
(7, 'Empresa BC', 'Jurídica', '55.415.555/5555-75', '(84) 55555-5555', 'Rua D', 'Sim', '', '2025-04-19', '', '', '', 'empresabc@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cobrancas`
--

CREATE TABLE `cobrancas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cobrancas`
--

INSERT INTO `cobrancas` (`id`, `data`, `quantidade`) VALUES
(3, '2025-01-27', 3),
(4, '2025-01-13', 0),
(5, '2025-02-14', 0),
(6, '2025-03-27', 0),
(7, '2025-01-06', 0),
(198, '2025-04-23', 0),
(199, '2025-04-24', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `lancamento` varchar(50) NOT NULL,
  `data_lanc` date NOT NULL,
  `data_pgto` date NOT NULL,
  `parcelas` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`id`, `valor`, `usuario`, `pagamento`, `lancamento`, `data_lanc`, `data_pgto`, `parcelas`, `status`, `cliente`) VALUES
(1, 150.00, 1, 'Dinheiro', 'Bradesco', '2025-04-22', '2025-04-22', 1, 'Concluída', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nome_sistema` varchar(50) NOT NULL,
  `email_adm` varchar(50) NOT NULL,
  `endereco_site` varchar(150) DEFAULT NULL,
  `telefone_fixo` varchar(20) DEFAULT NULL,
  `telefone_whatsapp` varchar(20) DEFAULT NULL,
  `cnpj_site` varchar(25) DEFAULT NULL,
  `rodape_relatorios` varchar(1000) NOT NULL,
  `valor_multa` int(11) NOT NULL,
  `valor_juros_dia` decimal(8,2) NOT NULL,
  `frequencia_automatica` varchar(5) NOT NULL,
  `relatorio_pdf` varchar(5) NOT NULL,
  `fonte_comprovante` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `icone` varchar(100) NOT NULL,
  `dias_carencia` int(11) NOT NULL,
  `alerta` date NOT NULL,
  `impressao_automatica` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `config`
--

INSERT INTO `config` (`id`, `nome_sistema`, `email_adm`, `endereco_site`, `telefone_fixo`, `telefone_whatsapp`, `cnpj_site`, `rodape_relatorios`, `valor_multa`, `valor_juros_dia`, `frequencia_automatica`, `relatorio_pdf`, `fonte_comprovante`, `logo`, `icone`, `dias_carencia`, `alerta`, `impressao_automatica`) VALUES
(1, 'Comercio', 'admin@gmail.com', 'Rua Francisco Antonio Zeller, 20 - Ferraz de Vasconcellos', '(11) 3333-3333', '(11) 98765-4321', '11.111.111/0001-11', 'Desenvolvido pelo terceiro ano @Todos os Direitos Reservados!!', 2, 0.15, 'Não', 'Sim', 12, 'logo.png', 'icone.png', 0, '2025-04-24', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_despesa`
--

CREATE TABLE `contas_despesa` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `lancamento` varchar(50) NOT NULL,
  `documento` varchar(35) DEFAULT NULL,
  `plano_conta` varchar(50) DEFAULT NULL,
  `fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contas_despesa`
--

INSERT INTO `contas_despesa` (`id`, `descricao`, `valor`, `data`, `usuario`, `lancamento`, `documento`, `plano_conta`, `fornecedor`) VALUES
(11, 'Paula Marta', 700.00, '2025-04-22', 1, 'Caixa', 'Dinheiro', 'Aluguel - Despesa Pessoal', 2),
(12, 'Matheus Silva', 50.00, '2025-04-22', 1, 'Caixa', 'Boleto', 'Aluguel - Despesa Pessoal', 3),
(13, 'Teste', 49.00, '2025-03-26', 1, 'Caixa', 'Boleto', 'Aluguel - Despesa Pessoal', 3),
(14, 'Paula Marta', 50.00, '2025-03-26', 1, 'Bradesco', 'Boleto', 'Aluguel - Despesa Pessoal', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `saida` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `plano_conta` varchar(50) NOT NULL,
  `data_emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `frequencia` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `data_recor` date DEFAULT NULL,
  `juros` decimal(8,2) DEFAULT NULL,
  `multa` decimal(8,2) DEFAULT NULL,
  `desconto` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `id_compra` int(11) NOT NULL,
  `arquivo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `descricao`, `cliente`, `saida`, `documento`, `plano_conta`, `data_emissao`, `vencimento`, `frequencia`, `valor`, `usuario_lanc`, `usuario_baixa`, `status`, `data_recor`, `juros`, `multa`, `desconto`, `subtotal`, `data_baixa`, `id_compra`, `arquivo`) VALUES
(5, 'Fornecedor - Higor', NULL, 'Caixa', 'Dinheiro', 'Compra de Produtos - Empresa', '2025-04-23', '2025-04-23', 'Uma Vez', 200.00, 1, NULL, 'Pendente', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'sem-foto.jpg'),
(6, 'Fornecedor - Higor', NULL, 'Caixa', 'Dinheiro', 'Compra de Produtos - Empresa', '2025-04-23', '2025-04-23', 'Uma Vez', 1000.00, 1, NULL, 'Pendente', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'sem-foto.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `entrada` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `plano_conta` varchar(50) NOT NULL,
  `data_emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `frequencia` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `data_recor` date DEFAULT NULL,
  `juros` decimal(8,2) DEFAULT NULL,
  `multa` decimal(8,2) DEFAULT NULL,
  `desconto` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `id_venda` int(11) NOT NULL,
  `arquivo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cat_despesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `despesas`
--

INSERT INTO `despesas` (`id`, `nome`, `cat_despesa`) VALUES
(1, 'Luz', 2),
(2, 'Água', 2),
(3, 'Telefone', 2),
(6, 'Internet', 3),
(10, 'Água', 3),
(12, 'Aluguel', 6),
(13, 'Compras', 6),
(14, 'Supermercado', 6),
(15, 'Outra', 6),
(16, 'Viagem', 6),
(17, 'Folha de Pagamento', 2),
(18, 'Compra de Produtos', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `formas_pgtos`
--

CREATE TABLE `formas_pgtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `taxa` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `formas_pgtos`
--

INSERT INTO `formas_pgtos` (`id`, `nome`, `taxa`) VALUES
(1, 'Boleto', 0.00),
(2, 'Carnê', 2.00),
(3, 'Cartão de Débito', 2.00),
(4, 'Cartão de Crédito', 5.00),
(5, 'Cheque', 4.00),
(6, 'Dinheiro', 0.00),
(7, 'Transferência', 0.00),
(8, 'Pix', 0.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `pessoa`, `doc`, `telefone`, `endereco`, `ativo`, `obs`, `data`, `banco`, `agencia`, `conta`, `email`) VALUES
(1, 'Higor', 'Física', '000.000.000-60', '', '', 'Sim', '', '2025-03-26', '', '', '', 'fornecedor@fornecedor.com'),
(2, 'Paula Marta', 'Jurídica', '66.455.555/5555-55', '(15) 54555-5555', 'Rua 6', 'Sim', '', '2025-03-14', '', '', '', 'paula@hotmail.com'),
(3, 'Matheus Silva', 'Física', '151.555.555-55', '(15) 45555-5555', 'Rua A', 'Sim', '', '2025-03-14', '', '', '', 'mateus@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `frequencias`
--

CREATE TABLE `frequencias` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `dias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `frequencias`
--

INSERT INTO `frequencias` (`id`, `nome`, `dias`) VALUES
(1, 'Uma Vez', 0),
(2, 'Diária', 1),
(3, 'Semanal', 7),
(4, 'Mensal', 30),
(5, 'Trimestral', 90),
(6, 'Semestral', 180),
(7, 'Anual', 365);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_compra`
--

CREATE TABLE `itens_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `itens_compra`
--

INSERT INTO `itens_compra` (`id`, `id_compra`, `produto`, `valor`, `quantidade`, `total`, `usuario`) VALUES
(1, 1, 15, 100.00, 1, 100.00, 1),
(2, 1, 27, 50.00, 1, 50.00, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `usuario` int(11) NOT NULL,
  `valor_custo` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id`, `id_venda`, `produto`, `valor`, `quantidade`, `total`, `usuario`, `valor_custo`) VALUES
(1, 1, 15, 210.00, 1, 210.00, 1, 100.00),
(2, 1, 14, 75.00, 1, 75.00, 1, 50.00),
(3, 2, 15, 210.00, 1, 210.00, 1, 100.00),
(4, 2, 14, 75.00, 2, 150.00, 1, 50.00),
(5, 3, 14, 75.00, 2, 150.00, 1, 50.00),
(6, 4, 14, 75.00, 2, 150.00, 1, 50.00),
(7, 5, 15, 210.00, 1, 210.00, 1, 100.00),
(8, 5, 14, 75.00, 1, 75.00, 1, 50.00),
(9, 5, 15, 210.00, 3, 630.00, 1, 100.00),
(10, 5, 15, 210.00, 2, 420.00, 1, 100.00),
(11, 6, 15, 210.00, 1, 210.00, 1, 100.00),
(12, 6, 14, 75.00, 1, 75.00, 1, 50.00),
(13, 7, 15, 210.00, 1, 210.00, 1, 100.00),
(14, 7, 14, 75.00, 1, 75.00, 1, 50.00),
(15, 7, 13, 50.00, 1, 50.00, 1, 5.00),
(16, 8, 15, 210.00, 2, 420.00, 1, 100.00),
(17, 8, 14, 75.00, 1, 75.00, 1, 50.00),
(18, 8, 13, 50.00, 1, 50.00, 1, 5.00),
(19, 9, 14, 75.00, 1, 75.00, 1, 50.00),
(20, 9, 13, 50.00, 1, 50.00, 1, 5.00),
(21, 9, 13, 50.00, 1, 50.00, 1, 5.00),
(22, 10, 12, 134.99, 1, 134.99, 1, 89.99),
(23, 10, 11, 192.00, 1, 192.00, 1, 120.00),
(24, 11, 14, 75.00, 1, 75.00, 1, 50.00),
(25, 11, 13, 50.00, 1, 50.00, 1, 5.00),
(26, 12, 14, 75.00, 1, 75.00, 1, 50.00),
(27, 12, 13, 50.00, 1, 50.00, 1, 5.00),
(28, 13, 14, 75.00, 1, 75.00, 1, 50.00),
(29, 13, 13, 50.00, 1, 50.00, 1, 5.00),
(30, 14, 13, 50.00, 1, 50.00, 1, 5.00),
(31, 14, 14, 75.00, 1, 75.00, 1, 50.00),
(32, 14, 12, 134.99, 1, 134.99, 1, 89.99),
(33, 15, 13, 50.00, 1, 50.00, 1, 5.00),
(34, 15, 12, 134.99, 1, 134.99, 1, 89.99),
(35, 16, 12, 134.99, 1, 134.99, 1, 89.99),
(36, 16, 13, 50.00, 1, 50.00, 1, 5.00),
(37, 17, 14, 75.00, 1, 75.00, 1, 50.00),
(38, 17, 13, 50.00, 1, 50.00, 1, 5.00),
(39, 18, 13, 50.00, 1, 50.00, 1, 5.00),
(40, 18, 14, 75.00, 1, 75.00, 1, 50.00),
(41, 18, 11, 192.00, 1, 192.00, 1, 120.00),
(42, 19, 15, 210.00, 1, 210.00, 1, 100.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` date NOT NULL,
  `lancamento` varchar(35) DEFAULT NULL,
  `plano_conta` varchar(35) DEFAULT NULL,
  `documento` varchar(35) DEFAULT NULL,
  `caixa_periodo` int(11) DEFAULT NULL,
  `id_mov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `usuario`, `data`, `lancamento`, `plano_conta`, `documento`, `caixa_periodo`, `id_mov`) VALUES
(1, 'Entrada', 'Venda', 'Venda - Diversos', 285.00, 1, '2025-02-08', 'Caixa', 'Venda', 'Dinheiro', 7, 1),
(2, 'Entrada', 'Venda', 'Venda - Diversos', 360.00, 1, '2025-02-08', 'Caixa', 'Venda', 'Dinheiro', 7, 2),
(3, 'Entrada', 'Venda', 'Venda - Empresa A', 150.00, 1, '2025-01-08', 'Caixa', 'Venda', 'Dinheiro', 7, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis`
--

CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `nivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `niveis`
--

INSERT INTO `niveis` (`id`, `nivel`) VALUES
(1, 'Administrador'),
(2, 'Comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `lucro` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `descricao`, `estoque`, `valor_compra`, `valor_venda`, `fornecedor`, `categoria`, `foto`, `ativo`, `lucro`, `nivel`) VALUES
(6, '123', 'Bermuda Jeans', 'Bermuda xxxxxxxx', 0, 0.00, 69.99, 0, 2, '14-04-2021-13-19-01-bermuda.jpg', 'Sim', NULL, 5),
(7, '12345', 'Sapato Social', 'Sapato Social de Couro', 14, 100.00, 150.00, 3, 1, '14-04-2021-13-19-18-cat-6.jpg', 'Sim', 50, 0),
(10, '0236', 'Camisa Polo', 'Camisa Polo Diversos Tamanhos', 125, 25.00, 49.99, 1, 8, '14-04-2021-13-20-29-camisa-masc.jpg', 'Sim', NULL, 0),
(11, '589222', 'Calça Masculina', 'Calça Masculina Jeans', 30, 120.00, 192.00, 3, 3, '14-04-2021-13-21-06-calca-masc.jpg', 'Sim', 60, 0),
(12, '4586223', 'Camisa Feminina', 'Camisa Feminina ', 34, 89.99, 134.99, 3, 8, '14-04-2021-13-24-18-camisa-femin.jpg', 'Sim', 50, 0),
(13, '58555', 'Regata Masculina', 'Camiseta Regata Masculina', 24, 50.00, 50.00, 1, 8, '14-04-2021-13-27-09-regata-masculina.jpg', 'Sim', 0, 15),
(14, '585558901', 'Regata Feminina', 'Camiseta Feminina', 108, 50.00, 75.00, 0, 9, '14-04-2021-13-28-27-regata-feminina.jpg', 'Sim', 50, 0),
(15, '688955566', 'Sapato Feminino', 'Sapato', 84, 100.00, 210.00, 0, 1, '14-04-2021-13-29-25-sapato-feminino.jpg', 'Sim', 40, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(4, 'ExponentPushToken[y997UnFY-C0H-lvUHq-Agq]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'ADM', 'admin@gmail.com', 'teste50', 'Administrador'),
(4, 'Fernanda Silva', 'fernanda@gmail.com', '123', 'Comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `valor_parcial`
--

CREATE TABLE `valor_parcial` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `valor_parcial`
--

INSERT INTO `valor_parcial` (`id`, `id_conta`, `tipo`, `valor`, `data`, `usuario`) VALUES
(16, 132, 'Pagar', 25.00, '2025-04-21', 1),
(17, 132, 'Pagar', 50.00, '2025-04-21', 1),
(18, 132, 'Pagar', 30.00, '2025-04-21', 1),
(19, 147, 'Pagar', 50.00, '2024-04-21', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `lancamento` varchar(50) NOT NULL,
  `data_lanc` date NOT NULL,
  `data_pgto` date NOT NULL,
  `desconto` decimal(8,2) DEFAULT NULL,
  `acrescimo` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `cliente` int(11) NOT NULL,
  `valor_custo` decimal(8,2) NOT NULL,
  `recebido` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `valor`, `usuario`, `pagamento`, `lancamento`, `data_lanc`, `data_pgto`, `desconto`, `acrescimo`, `subtotal`, `parcelas`, `status`, `cliente`, `valor_custo`, `recebido`) VALUES
(1, 285.00, 1, 'Dinheiro', 'Caixa', '2025-02-08', '2025-02-08', 0.00, 0.00, 285.00, 1, 'Concluída', 0, 150.00, 0.00),
(2, 360.00, 1, 'Dinheiro', 'Caixa', '2025-02-08', '2025-02-08', 0.00, 0.00, 360.00, 1, 'Concluída', 0, 150.00, 0.00),
(3, 150.00, 1, 'Dinheiro', 'Caixa', '2025-02-08', '2025-02-08', 0.00, 0.00, 150.00, 1, 'Concluída', 3, 50.00, 0.00),
(4, 150.00, 1, 'Dinheiro', 'Caixa', '2025-02-08', '2025-02-08', 0.00, 0.00, 150.00, 1, 'Concluída', 0, 100.00, 0.00),
(5, 1335.00, 1, 'Dinheiro', 'Caixa', '2025-02-08', '2025-02-08', 0.00, 0.00, 1335.00, 4, 'Pendente', 3, 650.00, 0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bancarias`
--
ALTER TABLE `bancarias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cat_despesas`
--
ALTER TABLE `cat_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cat_produtos`
--
ALTER TABLE `cat_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cobrancas`
--
ALTER TABLE `cobrancas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_despesa`
--
ALTER TABLE `contas_despesa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `formas_pgtos`
--
ALTER TABLE `formas_pgtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `frequencias`
--
ALTER TABLE `frequencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `valor_parcial`
--
ALTER TABLE `valor_parcial`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bancarias`
--
ALTER TABLE `bancarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cat_despesas`
--
ALTER TABLE `cat_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cat_produtos`
--
ALTER TABLE `cat_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cobrancas`
--
ALTER TABLE `cobrancas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contas_despesa`
--
ALTER TABLE `contas_despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `formas_pgtos`
--
ALTER TABLE `formas_pgtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `frequencias`
--
ALTER TABLE `frequencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `valor_parcial`
--
ALTER TABLE `valor_parcial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
