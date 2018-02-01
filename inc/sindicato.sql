-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2017 às 23:33
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sindicato`
--
CREATE DATABASE IF NOT EXISTS `sindicato` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sindicato`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `afiliado`
--

CREATE TABLE `afiliado` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `rg` bigint(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `celular` bigint(13) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `taxa_rcs` int(11) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `telefone` bigint(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `afiliado`
--

INSERT INTO `afiliado` (`matricula`, `nome`, `email`, `endereco`, `rg`, `cpf`, `celular`, `sexo`, `taxa_rcs`, `nascimento`, `telefone`) VALUES
(11111, 'Georgia', '876', '65', 5, 121, 5511988656702, 'Feminino', 20, '5', NULL),
(11112, 'Rafael', 'rafafelipesilva@gmail.com', 'Rua Trememb', 403, 49, 49394, 'Masculino', 30, '4939', NULL),
(31233, 'Marcelo', '785', '6', 786, 876, 67, 'Masculino', 40, '789', NULL),
(12345, 'Rodolfo', '59', '767', 6, 875, 67, 'Masculino', 20, '6', NULL),
(22222, 'Sergio Felipe', 'sergiofelipe@gmail.com', 'Rua dos Pinheiros', 85938532, 323829318, 119862479, 'Masculino', 20, '05-01-1977', NULL),
(1113123098, '32', '87', '87', 897, 87, 7, 'Masculino', 83, '878', NULL),
(677868, '678', '312@gmail.com', '38210938120', 38239820, 38293812093, 3213213232, 'Masculino', 11, '20/03/2017', NULL),
(11234, '678', '312@gmail.com', '38210938120', 38239820, 38293812093, 3213213232, 'Masculino', 11, '20/03/2017', 123455312),
(44444, 'Inacio', '312321@live.com', 'Rua dos jacares', 324324234, 42342343243, 21321323212, 'Masculino', 20, '10/03/2017', 32132132132),
(434324, '432432', '4234234@bol.com', '432423423', 312312432, 43243243245, 32423432432, 'Feminino', 40, '06/03/2017', 4324234324);

-- --------------------------------------------------------

--
-- Estrutura da tabela `afiliado_has_convenio`
--

CREATE TABLE `afiliado_has_convenio` (
  `Afiliado_matricula` int(11) NOT NULL,
  `Convenio_idConvenio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenio`
--

CREATE TABLE `convenio` (
  `cnpj` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `mensalidade` varchar(45) NOT NULL,
  `DAS_Afiliado_matricula` int(11) NOT NULL,
  `RCS_Afiliado_matricula` int(11) NOT NULL,
  `desconto` varchar(3) DEFAULT NULL,
  `idConvenio` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convenio`
--

INSERT INTO `convenio` (`cnpj`, `nome`, `categoria`, `empresa`, `mensalidade`, `DAS_Afiliado_matricula`, `RCS_Afiliado_matricula`, `desconto`, `idConvenio`) VALUES
(1, 'uni', 'uni', 'uni', '312', 1, 1, 'DAS', 1),
(43242, 'unimed baby', 'dico', 'unimed', '1000', 1000, 1000, 'RCS', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `das`
--

CREATE TABLE `das` (
  `Afiliado_matricula` int(11) NOT NULL,
  `porcentagem` decimal(3,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependente`
--

CREATE TABLE `dependente` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `rg` bigint(11) NOT NULL,
  `celular` bigint(13) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `Afiliado_matricula` int(11) DEFAULT NULL,
  `parentesco` varchar(30) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dependente`
--

INSERT INTO `dependente` (`cpf`, `nome`, `telefone`, `email`, `endereco`, `rg`, `celular`, `sexo`, `Afiliado_matricula`, `parentesco`, `nascimento`) VALUES
(1, 'Joselito', 3721897, 'joselito@gmail.com', 'Rua Jatobe', 65, 1198865670, 'Masculino', 22222, 'Irmao', '20-03-1970'),
(98, 'Henrique', 98, '80', '98', 98, 90, 'Feminino', 8, '8', '908'),
(43423323232, 'teste', 11954437322, 'rafa@gma.com', 'Rua xxx', 23232132, 11232323232, 'Masculino', 22222, 'Primo', '16/03/2017'),
(53453543543, 'Jucilei', 112323234, '424@hotmail.com', 'rr', 2432423, 1232323233, 'Masculino', 22222, 'Pai', '20/03/2017'),
(78798786219, '78997', 890787879, '678687678686@bol.com', '79878', 78797889, 6767867686, 'Masculino', 11111, 'Filho', '07/03/2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependente_has_convenio`
--

CREATE TABLE `dependente_has_convenio` (
  `Dependente_cpf` int(11) NOT NULL,
  `Convenio_idConvenio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao_das`
--

CREATE TABLE `devolucao_das` (
  `valor` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `DAS_Afiliado_matricula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao_rcs`
--

CREATE TABLE `devolucao_rcs` (
  `valor` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `RCS_Afiliado_matricula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encargo`
--

CREATE TABLE `encargo` (
  `idEncargo` int(11) NOT NULL,
  `Afiliado_matricula` int(11) NOT NULL,
  `mes` varchar(9) NOT NULL,
  `ano` int(4) NOT NULL,
  `decimoterceiro` float NOT NULL,
  `refeicao` float NOT NULL,
  `ferias` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encargo`
--

INSERT INTO `encargo` (`idEncargo`, `Afiliado_matricula`, `mes`, `ano`, `decimoterceiro`, `refeicao`, `ferias`) VALUES
(1, 1, '1', 1, 0, 0, 0),
(2, 22222, 'Fevereiro', 2017, 0, 0, 0),
(3, 22222, 'Fevereiro', 2017, 0, 0, 0),
(4, 22222, 'Fevereiro', 2017, 0, 0, 0),
(5, 1, 'Janeiro', 2017, 0, 0, 0),
(6, 22222, 'Fevereiro', 2017, 0, 0, 0),
(7, 22222, 'Fevereiro', 2017, 0, 0, 0),
(8, 1, 'Janeiro', 2017, 0, 0, 0),
(9, 22222, 'Fevereiro', 2017, 0, 0, 0),
(10, 22222, 'Fevereiro', 2017, 0, 0, 0),
(11, 22222, 'Abril', 2017, 10, 5, 100),
(12, 11111, 'Fevereiro', 2017, 0, 0, 0),
(13, 11111, 'Janeiro', 2018, 0, 0, 0),
(14, 12345, 'Janeiro', 2017, 0, 0, 0),
(15, 22222, 'Janeiro', 2017, 200, 100, 220),
(16, 22222, 'Fevereiro', 2017, 2, 9, 2),
(17, 22222, 'o', 2017, 2205, 9850, 2299),
(19, 11111, 'Janeiro', 2017, 100, 200, 50),
(20, 12345, 'Junho', 2017, 180, 85.6, 199),
(21, 12345, 'Junho', 2018, 180, 85.6, 199),
(22, 11111, 'Abril', 2017, 135, 12.222, 12.4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folhadepagamento`
--

CREATE TABLE `folhadepagamento` (
  `idPagamento` int(11) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `devendo` decimal(10,2) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `adicional` decimal(10,2) DEFAULT NULL,
  `Afiliado_matricula` int(11) NOT NULL,
  `mes` varchar(9) NOT NULL,
  `ano` int(4) NOT NULL,
  `bruto` decimal(10,2) DEFAULT NULL,
  `taxa_rcs` decimal(10,2) DEFAULT NULL,
  `rcs` decimal(10,2) DEFAULT NULL,
  `das` decimal(10,2) DEFAULT NULL,
  `unimed` decimal(10,2) DEFAULT NULL,
  `uniodonto` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `folhadepagamento`
--

INSERT INTO `folhadepagamento` (`idPagamento`, `salario`, `devendo`, `data`, `adicional`, `Afiliado_matricula`, `mes`, `ano`, `bruto`, `taxa_rcs`, `rcs`, `das`, `unimed`, `uniodonto`) VALUES
(1, '2000.00', NULL, NULL, NULL, 12345, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2000.00', NULL, NULL, NULL, 12345, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2000.00', NULL, NULL, NULL, 12345, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '1500.00', NULL, NULL, NULL, 11111, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '1000.00', NULL, NULL, NULL, 12345, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '10000.00', NULL, NULL, NULL, 11111, 'o', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '1.00', NULL, NULL, NULL, 1, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '20.00', NULL, NULL, NULL, 11111, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '20.00', NULL, NULL, NULL, 11111, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '100.00', NULL, NULL, NULL, 11111, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '500.00', NULL, NULL, NULL, 11111, 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '1.00', '1.00', NULL, NULL, 1, '1', 1, '1.00', '1.00', '1.00', '1.00', '1.00', '1.00'),
(14, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '0.00', '0.00'),
(15, '86.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '14.00', '10.00', '2.00', '2.00'),
(16, '720.00', '35.00', NULL, NULL, 11111, 'Janeiro', 2017, '1000.00', '20.00', '0.00', '100.00', '200.00', '15.00'),
(17, '785.00', '0.00', NULL, NULL, 12345, 'Janeiro', 2017, '1000.00', '20.00', '65.00', '100.00', '100.00', '15.00'),
(18, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '10.00', '0.00'),
(19, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '15.00', '0.00'),
(20, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2018, '100.00', '20.00', '18.00', '10.00', '10.00', '10.00'),
(21, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '10.00', '10.00'),
(22, '90.00', '0.00', NULL, NULL, 12345, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '10.00', '10.00'),
(23, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2018, '100.00', '20.00', '18.00', '10.00', '10.00', '10.00'),
(24, '90.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '1.00', '1.00'),
(25, '0.90', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '1.00', '20.00', '0.18', '0.10', '1.00', '1.00'),
(26, '90.00', '0.00', NULL, NULL, 12345, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '10.00', '10.00'),
(27, '280.80', '0.00', NULL, NULL, 12345, 'Fevereiro', 2018, '312.00', '20.00', '56.16', '31.20', '329.00', '321.00'),
(28, '900.00', '0.00', NULL, '35.00', 1000, 'Fevereiro', 2017, '1000.00', NULL, '0.00', '100.00', '10.00', '100.00'),
(29, '90.00', '0.00', NULL, NULL, 12345, 'Janeiro', 2017, '100.00', '20.00', '18.00', '10.00', '10.00', '100.00'),
(30, '900.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '1000.00', '20.00', '180.00', '100.00', '102.00', '21.00'),
(31, '2050.00', '0.00', NULL, '50.00', 11111, 'Fevereiro', 2017, '2500.00', '20.00', '250.00', '250.00', '100.00', '100.00'),
(32, '2050.00', '0.00', NULL, '50.00', 11111, 'Fevereiro', 2017, '2500.00', '20.00', '250.00', '250.00', '100.00', '100.00'),
(33, '900.00', '0.00', NULL, NULL, 12345, 'o', 2017, '1000.00', '20.00', '180.00', '100.00', '0.00', '0.00'),
(36, '880.00', '0.00', NULL, NULL, 11111, 'Janeiro', 2017, '1000.00', '20.00', '160.00', '0.00', '100.00', '20.00'),
(46, '3290.00', '0.00', NULL, '220.00', 22222, 'Fevereiro', 2017, '3500.00', '40.00', '1400.00', '0.00', '370.00', '60.00'),
(45, '4683.00', '150.00', NULL, '220.00', 22222, 'Abril', 2017, '5500.00', '40.00', '1983.00', '50.00', '300.00', '17.00'),
(41, '0.90', '0.00', NULL, '1014.90', 4, 'Janeiro', 2017, '1.00', NULL, '0.00', '0.00', '1000.00', '15.00'),
(47, '0.90', '1.90', NULL, NULL, 1, 'Fevereiro', 2018, '1.00', NULL, '0.00', '0.00', '1.00', '1.00'),
(48, '0.90', '0.00', NULL, '19.90', 33333, 'Fevereiro', 2017, '1.00', NULL, '0.00', '0.00', '10.00', '10.00'),
(49, '186.48', '38.32', NULL, NULL, 22222, 'Fevereiro', 2019, '259.00', '20.00', '0.00', '0.00', '55.06', '55.78');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rcs`
--

CREATE TABLE `rcs` (
  `Afiliado_matricula` int(11) NOT NULL,
  `porcentagem` decimal(3,2) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`) VALUES
('admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `afiliado_has_convenio`
--
ALTER TABLE `afiliado_has_convenio`
  ADD KEY `fk_Afiliado_has_Convenio_Afiliado` (`Afiliado_matricula`),
  ADD KEY `fk_Afiliado_has_Convenio_Convenio` (`Convenio_idConvenio`);

--
-- Indexes for table `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`idConvenio`),
  ADD KEY `fk_Convenio_DAS` (`DAS_Afiliado_matricula`),
  ADD KEY `fk_Convenio_RCS` (`RCS_Afiliado_matricula`);

--
-- Indexes for table `das`
--
ALTER TABLE `das`
  ADD KEY `fk_DAS_Afiliado` (`Afiliado_matricula`);

--
-- Indexes for table `dependente`
--
ALTER TABLE `dependente`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_Dependente_Afiliado` (`Afiliado_matricula`);

--
-- Indexes for table `dependente_has_convenio`
--
ALTER TABLE `dependente_has_convenio`
  ADD KEY `fk_Dependente_has_Convenio_Dependente` (`Dependente_cpf`),
  ADD KEY `fk_Dependente_has_Convenio_Convenio` (`Convenio_idConvenio`);

--
-- Indexes for table `devolucao_das`
--
ALTER TABLE `devolucao_das`
  ADD KEY `fk_Devolucao_DAS_DAS` (`DAS_Afiliado_matricula`);

--
-- Indexes for table `devolucao_rcs`
--
ALTER TABLE `devolucao_rcs`
  ADD KEY `fk_Devolucao_RCS_RCS` (`RCS_Afiliado_matricula`);

--
-- Indexes for table `encargo`
--
ALTER TABLE `encargo`
  ADD PRIMARY KEY (`idEncargo`);

--
-- Indexes for table `folhadepagamento`
--
ALTER TABLE `folhadepagamento`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `fk_FolhaDePagamento_Afiliado` (`Afiliado_matricula`);

--
-- Indexes for table `rcs`
--
ALTER TABLE `rcs`
  ADD KEY `fk_RCS_Afiliado` (`Afiliado_matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convenio`
--
ALTER TABLE `convenio`
  MODIFY `idConvenio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `encargo`
--
ALTER TABLE `encargo`
  MODIFY `idEncargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `folhadepagamento`
--
ALTER TABLE `folhadepagamento`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
