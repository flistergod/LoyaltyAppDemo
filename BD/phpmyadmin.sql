-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15-Jul-2019 às 02:03
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estgv16061`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `TELEFONE` decimal(9,0) NOT NULL,
  `DATANASC` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MORADA` varchar(200) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TIPOUTILIZADOR` smallint(6) NOT NULL DEFAULT '1',
  `FOTO_PERFIL` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`ID`, `NOME`, `TELEFONE`, `DATANASC`, `EMAIL`, `MORADA`, `DATA_REGISTO`, `TIPOUTILIZADOR`, `FOTO_PERFIL`) VALUES
(1, 'Rodrigo Amaral', '963541254', '27/04/1998', 'rodrigo98amaral@gmail.com', 'Viseu, Viseu', '2019-07-12 16:19:29', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_notifica_cliente`
--

CREATE TABLE `admin_notifica_cliente` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_notifica_empresa`
--

CREATE TABLE `admin_notifica_empresa` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

CREATE TABLE `areas` (
  `ID_AREA` int(11) NOT NULL,
  `DESIGNACAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associacao`
--

CREATE TABLE `associacao` (
  `EMP_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Data_fidelização` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associacao`
--

INSERT INTO `associacao` (`EMP_ID`, `ID`, `Data_fidelização`) VALUES
(24, 6, '2019-07-06 16:50:33'),
(27, 5, '2019-07-11 11:06:33'),
(28, 5, '2019-07-11 11:06:41'),
(29, 5, '2019-07-06 16:50:33'),
(30, 5, '2019-07-06 16:50:33'),
(31, 6, '2019-05-20 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `associacao_cartoes`
--

CREATE TABLE `associacao_cartoes` (
  `ID_CARTAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `CARIMBOS` int(11) DEFAULT NULL,
  `CODIGO_CARTAO` varchar(10) DEFAULT NULL,
  `DATA_ASSOCIACAO` datetime(6) DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associacao_cartoes`
--

INSERT INTO `associacao_cartoes` (`ID_CARTAO`, `ID`, `CARIMBOS`, `CODIGO_CARTAO`, `DATA_ASSOCIACAO`) VALUES
(1, 5, 2, '8U16BME39O', '2019-07-13 14:15:14.096633'),
(0, 5, 0, NULL, '2019-07-13 15:08:28.108558'),
(2, 5, 0, NULL, '2019-07-14 18:20:10.733579');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanhas`
--

CREATE TABLE `campanhas` (
  `ID_CAMPANHA` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `DATA_INICIO` varchar(30) NOT NULL,
  `DATA_FIM` varchar(30) NOT NULL,
  `DESCONTO` int(11) NOT NULL,
  `TITULO` varchar(30) NOT NULL,
  `PRODUTO_ALVO` varchar(100) NOT NULL,
  `LOCALIZACAO` varchar(30) DEFAULT NULL,
  `GENERO` varchar(20) DEFAULT NULL,
  `ESTADOCIVIL` varchar(30) DEFAULT NULL,
  `IDADE` int(11) DEFAULT NULL,
  `ANIMAIS` varchar(10) DEFAULT NULL,
  `CODIGO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `campanhas`
--

INSERT INTO `campanhas` (`ID_CAMPANHA`, `ID`, `DATA_INICIO`, `DATA_FIM`, `DESCONTO`, `TITULO`, `PRODUTO_ALVO`, `LOCALIZACAO`, `GENERO`, `ESTADOCIVIL`, `IDADE`, `ANIMAIS`, `CODIGO`) VALUES
(1, 25, '2019-05-29', '2019-06-10', 20, 'Black Friday', 'Monitores', 'Viseu', NULL, NULL, NULL, NULL, '10A20B30C'),
(2, 25, '2019-05-29', '2019-06-01', 20, 'Black Friday', 'Computadores', 'Viseu', NULL, NULL, NULL, NULL, '10A20B30D'),
(3, 27, '2019-06-01', '2019-06-20', 20, 'Semana azul', 'Telemoveis', 'Viseu', NULL, NULL, NULL, NULL, '10A20B30E'),
(4, 27, '2019-06-01', '2019-06-10', 20, 'Semana azul', 'Tablets', 'Viseu', NULL, NULL, NULL, NULL, '10A20B30F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `ID_CARTAO` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `DATA_INICIO` varchar(30) NOT NULL,
  `DATA_FIM` varchar(30) NOT NULL,
  `CARIMBOS` decimal(2,0) NOT NULL,
  `DESCONTO` int(11) NOT NULL,
  `DESIGNACAO` varchar(100) NOT NULL,
  `CODIGO` varchar(10) NOT NULL,
  `TITULO` varchar(30) NOT NULL,
  `PRODUTO_ALVO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cartoes`
--

INSERT INTO `cartoes` (`ID_CARTAO`, `EMP_ID`, `DATA_INICIO`, `DATA_FIM`, `CARIMBOS`, `DESCONTO`, `DESIGNACAO`, `CODIGO`, `TITULO`, `PRODUTO_ALVO`) VALUES
(1, 25, '11/07/2019', '26/07/2019', '9', 30, 'Descontos em tecnologia', '2444567889', 'Descontos Fnac', 'Tecnologia'),
(2, 27, '08/06/2019', '08/08/2019', '12', 20, 'Descontos em tecnologia', '10A20B30C', 'Descontos Altice', 'Tecnologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `TELEFONE` decimal(9,0) NOT NULL,
  `DATANASC` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MORADA` varchar(200) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TIPOUTILIZADOR` smallint(6) NOT NULL DEFAULT '3',
  `FOTO_PERFIL` varchar(200) DEFAULT NULL,
  `ESTADOCIVIL` varchar(20) NOT NULL,
  `GENERO` varchar(20) NOT NULL,
  `ANIMAIS` varchar(10) NOT NULL,
  `NIF` decimal(9,0) NOT NULL,
  `CARTAOCIDADAO` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `NOME`, `TELEFONE`, `DATANASC`, `EMAIL`, `MORADA`, `DATA_REGISTO`, `TIPOUTILIZADOR`, `FOTO_PERFIL`, `ESTADOCIVIL`, `GENERO`, `ANIMAIS`, `NIF`, `CARTAOCIDADAO`) VALUES
(5, 'Nelson Andrade', '938249102', '07/03/1998', 'nelson.andrade98@gmail.com', 'Viseu, Orgens', '2019-07-13 21:17:17', 3, '', 'Solteiro(a)', 'Masculino', 'Sim', '875426547', '985645254645'),
(6, 'Margarida Rodrigues', '965874562', '10/03/1997', 'guiro971509@gmail.com', 'Viseu, Viseu', '2019-07-13 21:20:29', 3, '', 'Casado(a)', 'Feminino', 'Sim', '457895123', '547854125645'),
(7, 'Miguel Saramago', '968457632', '26/05/2001', 'msaramago@gmail.com', 'Viseu, Repeses', '2019-07-13 21:22:01', 3, '', 'Solteiro(a)', 'Outro', 'Sim', '587896541', '784587455895'),
(10, 'Beatriz Dias', '967458125', '02/03/1996', 'beatriz@gmail.com', 'Viseu, Carregal do Sal', '2019-07-13 12:35:34', 3, NULL, 'Solteiro(a)', 'Feminino', 'Sim', '258485695', '145789542365'),
(15, 'Cátia Pinto', '965123475', '25/12/1996', 'cpinto@gmail.com', 'Viseu, Viseu', '2019-07-13 12:37:10', 3, NULL, 'Casado(a)', 'Feminino', 'Sim', '778421569', '175489785264'),
(16, 'Daniel Garcia', '965874236', '12/07/1997', 'dgarcia@gmail.com', 'Viseu, Repeses', '2019-07-13 12:37:10', 3, NULL, 'Casado(a)', 'Masculino', 'Sim', '875465652', '459875621236'),
(17, 'João Alexandre', '965874123', '04/01/1997', 'jalexandre@gmail.com', 'Viseu, Orgens', '2019-07-13 12:37:10', 3, NULL, 'Solteiro(a)', 'Masculino', 'Sim', '955524589', '745125698745');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `TELEFONE` decimal(9,0) NOT NULL,
  `DATANASC` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `MORADA` varchar(200) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TIPOUTILIZADOR` smallint(6) NOT NULL DEFAULT '2',
  `FOTO_PERFIL` varchar(200) DEFAULT NULL,
  `NOMEEMPRESA` varchar(70) NOT NULL,
  `NIF` decimal(9,0) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`ID`, `NOME`, `TELEFONE`, `DATANASC`, `EMAIL`, `MORADA`, `DATA_REGISTO`, `TIPOUTILIZADOR`, `FOTO_PERFIL`, `NOMEEMPRESA`, `NIF`, `DESCRICAO`) VALUES
(24, 'Miguel Gouveia', '967854236', '08/03/1997', 'mgouveia@gmail.com', 'Viseu, Repeses', '2019-07-13 12:37:08', 2, '', 'PCdiga', '145698756', 'Descontos em tecnologia'),
(25, 'Rafael Alves', '964785123', '08/03/1997', 'rafaelmiguelalves@hotmail.com', 'Viseu, Viseu', '2019-07-13 12:37:09', 2, '', 'Fnac', '457895625', 'Descontos em tecnologia'),
(26, 'Beatriz Sousa', '967845123', '08/03/1969', 'bsousa@gmail.com', 'Viseu, Orgens', '2019-07-13 12:37:10', 2, '', 'Worten', '478569456', 'Descontos em tecnologia'),
(27, 'Afonso Fidalgo', '967845123', '24/10/1998', 'luis.fidalgo98@gmail.com', 'Viseu, Carregal do Sal', '2019-07-13 12:37:11', 2, '', 'Altice', '784569125', 'Descontos em tecnologia'),
(28, 'Aline Rocha', '967412586', '08/03/1973', 'arocha@gmail.com', 'Viseu, Tondela', '2019-07-13 12:37:12', 2, '', 'Continente', '874591245', 'Desconto em Carnes vermelhas'),
(29, 'Igor Machado', '963587451', '08/03/1998', 'igorm@gmail.com', 'Viseu, Viseu', '2019-07-13 12:37:13', 2, '', 'Lidl', '854621458', 'Descontos em laranjas e abacates'),
(30, 'Maria Martins', '965871236', '08/03/1990', 'mmartins@gmail.com', 'Viseu, Viseu', '2019-07-13 12:37:14', 2, '', 'Zara', '657845692', 'Descontos em roupa, sapatos e acessorios'),
(31, 'Vitoria Castro', '965321057', '08/03/98', 'vcastro@gmail.com', 'Viseu, Tondela', '2019-07-13 12:37:15', 2, '', 'Springfield', '784125639', 'Descontos em toda a loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_notifica_cliente`
--

CREATE TABLE `empresa_notifica_cliente` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_admin`
--

CREATE TABLE `notificacao_admin` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ASSUNTO` varchar(100) NOT NULL,
  `BODY` varchar(400) NOT NULL,
  `TIPONOTIFICACAO` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_empresa`
--

CREATE TABLE `notificacao_empresa` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ASSUNTO` varchar(100) NOT NULL,
  `BODY` varchar(400) NOT NULL,
  `TIPONOTIFICACAO` smallint(6) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `ID_NOTIFICACAO` int(11) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ASSUNTO` varchar(100) NOT NULL,
  `BODY` varchar(400) NOT NULL,
  `TIPONOTIFICACAO` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias`
--

CREATE TABLE `preferencias` (
  `ID_AREA` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tem`
--

CREATE TABLE `tem` (
  `ID_AREA` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `ID_TRANSACAO` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `DESCRICAO_TRANSACAO` varchar(250) DEFAULT NULL,
  `ID_EMP` int(11) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CODIGO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`ID_TRANSACAO`, `ID`, `DESCRICAO_TRANSACAO`, `ID_EMP`, `DATA_REGISTO`, `CODIGO`) VALUES
(1, 5, 'Produtos comprados:\r\nProduto id:1 - \" Iphone 6S\"\r\nPreço: 199,99€\r\n\r\nProduto id:2 - \"Capa Iphone 6S - black\"\r\nPreço: 39,99€\r\n', 27, '2019-07-11 11:07:54', '2444567889'),
(2, 5, 'Produtos comprados:\r\nProduto id:1 - \" Iphone 6S\"\r\nPreço: 199,99€\r\n\r\nProduto id:2 - \"Capa Iphone 6S - black\"\r\nPreço: 39,99€\r\n', 27, '2019-07-11 11:08:40', '2444567889'),
(3, 5, 'Produtos comprados:\r\nProduto id:1 - \" Iphone 6S\"\r\nPreço: 199,99€\r\n\r\nProduto id:2 - \"Capa Iphone 6S - black\"\r\nPreço: 39,99€\r\n', 28, '2019-07-11 11:10:22', '10A20B30C'),
(4, 6, 'ijeoijfew', 31, '2019-07-11 17:12:37', '290384203'),
(5, 5, 'outros dados', 27, '2019-07-13 11:23:59', 'abcde'),
(6, 5, 'kwemweo', 27, '2019-07-14 22:39:32', '12345678'),
(7, 5, 'kwemweo', 27, '2019-07-14 22:39:38', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `TELEFONE` decimal(9,0) NOT NULL,
  `DATANASC` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `MORADA` varchar(200) NOT NULL,
  `DATA_REGISTO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TIPOUTILIZADOR` smallint(6) NOT NULL DEFAULT '0',
  `FOTO_PERFIL` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ID`, `NOME`, `TELEFONE`, `DATANASC`, `EMAIL`, `PASSWORD`, `MORADA`, `DATA_REGISTO`, `TIPOUTILIZADOR`, `FOTO_PERFIL`) VALUES
(1, 'Rodrigo Amaral', '963541254', '27/04/1998', 'rodrigo98amaral@gmail.com', '12345', 'Viseu, Viseu', '2019-07-12 16:19:29', 1, NULL),
(5, 'Nelson Andrade', '938249102', '07/03/1998', 'nelson.andrade98@gmail.com', '12345', 'Viseu, Orgens', '2019-07-13 21:17:17', 3, ''),
(6, 'Margarida Rodrigues', '965874562', '10/03/1997', 'guiro971509@gmail.com', '12345', 'Viseu, Viseu', '2019-07-13 21:20:29', 3, ''),
(7, 'Miguel Saramago', '968457632', '26/05/2001', 'msaramago@gmail.com', '12345', 'Viseu, Repeses', '2019-07-13 21:22:01', 3, ''),
(10, 'Beatriz Dias', '967458125', '02/03/1996', 'beatriz@gmail.com', '12345', 'Viseu, Carregal do Sal', '2019-07-13 12:35:34', 3, NULL),
(15, 'Cátia Pinto', '965123475', '25/12/1996', 'cpinto@gmail.com', '12345', 'Viseu, Viseu', '2019-07-13 12:37:10', 3, NULL),
(16, 'Daniel Garcia', '965874236', '12/07/1997', 'dgarcia@gmail.com', '12345', 'Viseu, Repeses', '2019-07-13 12:37:10', 3, NULL),
(17, 'João Alexandre', '965874123', '04/01/1997', 'jalexandre@gmail.com', '12345', 'Viseu, Orgens', '2019-07-13 12:37:10', 3, NULL),
(24, 'Miguel Gouveia', '967854236', '08/03/1997', 'mgouveia@gmail.com', '12345', 'Viseu, Repeses', '2019-07-13 12:37:08', 2, NULL),
(25, 'Rafael Alves', '964785123', '08/03/1997', 'rafaelmiguelalves@gmail.com', '12345', 'Viseu, Viseu', '2019-07-13 12:37:09', 2, NULL),
(26, 'Beatriz Sousa', '967845123', '08/03/1969', 'bsousa@gmail.com', '12345', 'Viseu, Orgens', '2019-07-13 12:37:10', 2, NULL),
(27, 'Afonso Fidalgo', '967845123', '24/10/1998', 'luis.fidalgo98@gmail.com', '12345', 'Viseu, Carregal do Sal', '2019-07-13 12:37:11', 2, NULL),
(28, 'Aline Rocha', '967412586', '08/03/1973', 'arocha@gmail.com', '12345', 'Viseu, Tondela', '2019-07-13 12:37:12', 2, NULL),
(29, 'Igor Machado', '963587451', '08/03/1998', 'igorm@gmail.com', '12345', 'Viseu, Viseu', '2019-07-13 12:37:13', 2, NULL),
(30, 'Maria Martins', '965871236', '08/03/1990', 'mmartins@gmail.com', '12345', 'Viseu, Viseu', '2019-07-13 12:37:14', 2, NULL),
(31, 'Vitoria Castro', '965321057', '08/03/98', 'vcastro@gmail.com', '12345', 'Viseu, Tondela', '2019-07-13 12:37:15', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin_notifica_cliente`
--
ALTER TABLE `admin_notifica_cliente`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`,`ID`),
  ADD KEY `FK_ADMIN_NO_ADMIN_NOT_CLIENTE` (`ID`);

--
-- Indexes for table `admin_notifica_empresa`
--
ALTER TABLE `admin_notifica_empresa`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`,`ID`),
  ADD KEY `FK_ADMIN_NO_ADMIN_NOT_EMPRESA` (`ID`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indexes for table `associacao`
--
ALTER TABLE `associacao`
  ADD PRIMARY KEY (`EMP_ID`,`ID`),
  ADD KEY `FK_ASSOCIAC_ASSOCIACA_CLIENTE` (`ID`);

--
-- Indexes for table `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`ID_CAMPANHA`),
  ADD KEY `FK_CAMPANHA_EMPRESA_C_EMPRESA` (`ID`);

--
-- Indexes for table `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`ID_CARTAO`),
  ADD KEY `FK_CARTOES_EMPRESA_C_EMPRESA` (`EMP_ID`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `empresa_notifica_cliente`
--
ALTER TABLE `empresa_notifica_cliente`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`,`ID`),
  ADD KEY `FK_EMPRESA__EMPRESA_N_CLIENTE` (`ID`);

--
-- Indexes for table `notificacao_admin`
--
ALTER TABLE `notificacao_admin`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`);

--
-- Indexes for table `notificacao_empresa`
--
ALTER TABLE `notificacao_empresa`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`),
  ADD KEY `FK_NOTIFICA_EMPRESA_N_ADMINIST` (`ID`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`ID_NOTIFICACAO`);

--
-- Indexes for table `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`ID_AREA`,`ID`),
  ADD KEY `FK_PREFEREN_PREFERENC_CLIENTE` (`ID`);

--
-- Indexes for table `tem`
--
ALTER TABLE `tem`
  ADD PRIMARY KEY (`ID_AREA`,`ID`),
  ADD KEY `FK_TEM_TEM2_EMPRESA` (`ID`);

--
-- Indexes for table `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`ID_TRANSACAO`),
  ADD KEY `FK_TRANSACO_CLIENTE_P_CLIENTE` (`ID`),
  ADD KEY `FK_TRANSACAO_C_EMPRESA` (`ID_EMP`) USING BTREE;

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `ID_AREA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `ID_CAMPANHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `ID_CARTAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `ID_NOTIFICACAO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `ID_TRANSACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_ADMINIST_TIPOUTILI_UTILIZAD` FOREIGN KEY (`ID`) REFERENCES `utilizador` (`ID`);

--
-- Limitadores para a tabela `admin_notifica_cliente`
--
ALTER TABLE `admin_notifica_cliente`
  ADD CONSTRAINT `FK_ADMIN_NO_ADMIN_NOT_CLIENTE` FOREIGN KEY (`ID`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `FK_ADMIN_NO_ADMIN_NOT_NOTIFICA2` FOREIGN KEY (`ID_NOTIFICACAO`) REFERENCES `notificacao_admin` (`ID_NOTIFICACAO`);

--
-- Limitadores para a tabela `admin_notifica_empresa`
--
ALTER TABLE `admin_notifica_empresa`
  ADD CONSTRAINT `FK_ADMIN_NO_ADMIN_NOT_EMPRESA` FOREIGN KEY (`ID`) REFERENCES `empresa` (`ID`),
  ADD CONSTRAINT `FK_ADMIN_NO_ADMIN_NOT_NOTIFICA` FOREIGN KEY (`ID_NOTIFICACAO`) REFERENCES `notificacao_admin` (`ID_NOTIFICACAO`);

--
-- Limitadores para a tabela `associacao`
--
ALTER TABLE `associacao`
  ADD CONSTRAINT `FK_ASSOCIAC_ASSOCIACA_CLIENTE` FOREIGN KEY (`ID`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `FK_ASSOCIAC_ASSOCIACA_EMPRESA` FOREIGN KEY (`EMP_ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `campanhas`
--
ALTER TABLE `campanhas`
  ADD CONSTRAINT `FK_CAMPANHA_EMPRESA_C_EMPRESA` FOREIGN KEY (`ID`) REFERENCES `empresa` (`ID`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_CLIENTE_TIPOUTILI_UTILIZAD` FOREIGN KEY (`ID`) REFERENCES `utilizador` (`ID`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `FK_EMPRESA_TIPOUTILI_UTILIZAD` FOREIGN KEY (`ID`) REFERENCES `utilizador` (`ID`);

--
-- Limitadores para a tabela `empresa_notifica_cliente`
--
ALTER TABLE `empresa_notifica_cliente`
  ADD CONSTRAINT `FK_EMPRESA__EMPRESA_N_CLIENTE` FOREIGN KEY (`ID`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `FK_EMPRESA__EMPRESA_N_NOTIFICA` FOREIGN KEY (`ID_NOTIFICACAO`) REFERENCES `notificacao_empresa` (`ID_NOTIFICACAO`);

--
-- Limitadores para a tabela `notificacao_admin`
--
ALTER TABLE `notificacao_admin`
  ADD CONSTRAINT `FK_NOTIFICA_TIPONOTIF_NOTIFICA` FOREIGN KEY (`ID_NOTIFICACAO`) REFERENCES `notificacoes` (`ID_NOTIFICACAO`);

--
-- Limitadores para a tabela `notificacao_empresa`
--
ALTER TABLE `notificacao_empresa`
  ADD CONSTRAINT `FK_NOTIFICA_EMPRESA_N_ADMINIST` FOREIGN KEY (`ID`) REFERENCES `administrador` (`ID`),
  ADD CONSTRAINT `FK_NOTIFICA_TIPONOTIF_NOTIFICA2` FOREIGN KEY (`ID_NOTIFICACAO`) REFERENCES `notificacoes` (`ID_NOTIFICACAO`);

--
-- Limitadores para a tabela `preferencias`
--
ALTER TABLE `preferencias`
  ADD CONSTRAINT `FK_PREFEREN_PREFERENC_AREAS` FOREIGN KEY (`ID_AREA`) REFERENCES `areas` (`ID_AREA`),
  ADD CONSTRAINT `FK_PREFEREN_PREFERENC_CLIENTE` FOREIGN KEY (`ID`) REFERENCES `cliente` (`ID`);

--
-- Limitadores para a tabela `tem`
--
ALTER TABLE `tem`
  ADD CONSTRAINT `FK_TEM_TEM2_EMPRESA` FOREIGN KEY (`ID`) REFERENCES `empresa` (`ID`),
  ADD CONSTRAINT `FK_TEM_TEM_AREAS` FOREIGN KEY (`ID_AREA`) REFERENCES `areas` (`ID_AREA`);

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `FK_TRANSACO_CLIENTE_P_CLIENTE` FOREIGN KEY (`ID`) REFERENCES `cliente` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
