-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2017 às 23:45
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

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
-- Estrutura da tabela `dependente`
--

CREATE TABLE `dependente` (
  `idDependente` int(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rg` bigint(11) NOT NULL,
  `celular` bigint(13) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `Afiliado_matricula` int(11) DEFAULT NULL,
  `parentesco` varchar(30) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `eleitor` int(11) DEFAULT NULL,
  `civil` varchar(255) DEFAULT NULL,
  `principal` tinyint(1) DEFAULT NULL,
  `endcep` int(11) DEFAULT NULL,
  `endrua` varchar(150) NOT NULL,
  `endnum` int(11) DEFAULT NULL,
  `endbairro` varchar(255) DEFAULT NULL,
  `endcidade` varchar(255) DEFAULT NULL,
  `enduf` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dependente`
--

INSERT INTO `dependente` (`idDependente`, `cpf`, `nome`, `telefone`, `email`, `rg`, `celular`, `sexo`, `Afiliado_matricula`, `parentesco`, `nascimento`, `eleitor`, `civil`, `principal`, `endcep`, `endrua`, `endnum`, `endbairro`, `endcidade`, `enduf`) VALUES
(1, 1, 'Joselito', 3721897, 'joselito@gmail.com', 65, 1198865670, 'Masculino', 22222, 'Irmao', '20-03-1970', NULL, NULL, NULL, NULL, 'Rua Jatobe', NULL, NULL, NULL, NULL),
(2, 98, 'Henrique', 1130831765, 'henrique.louro@bol.com', 2312412, 11988656702, 'Masculino', 22222, 'Tio', '03/04/2017', NULL, NULL, NULL, NULL, 'rua sebastiao', NULL, NULL, NULL, NULL),
(3, 43423323232, 'teste', 11954437322, 'rafa@gma.com', 23232132, 11232323232, 'Masculino', 22222, 'Primo', '16/03/2017', NULL, NULL, NULL, NULL, 'Rua xxx', NULL, NULL, NULL, NULL),
(4, 53453543543, 'Jucilex', 1130831765, '424@gmail.com', 59829218, 11988656702, 'Feminino', 22212, 'IrmÃ£o', '18/04/2017', NULL, NULL, NULL, NULL, 'rua francisco', NULL, NULL, NULL, NULL),
(5, 78798786219, '78997', 890787879, '678687678686@bol.com', 78797889, 6767867686, 'Masculino', 11111, 'Filho', '07/03/2017', NULL, NULL, NULL, NULL, '79878', NULL, NULL, NULL, NULL),
(6, 46846466486, 'junior', 4648646464, 'j@hotmail.com', 4846464, 48678676886, 'Masculino', 11111111, 'irmao', '27/09/1977', 46546587, 'CASADO', 1, 48987313, 'rua dos jericos', 11, 'golfinho', 'Caraguatuba', 'SP'),
(7, 46846466481, 'Katia', 468432186, 'ka@gmail.com', 48648432, 486481314, 'Feminino', 11111111, 'mae', '27/77/7777', 4644648, 'SOLTEIRO', 0, 48643444, 'rua tange', 11, 'centro', 'Ilhabela', 'SP'),
(8, 89786579808, 'Rodrigo', 39103920438, 'frederico@gmail.com', 401823912, 81293721483, 'Masculino', 11111111, 'Pai', '29/09/1993', 381237124, 'SOLTEIRO', 0, 58319207, 'rua aracaju', 123, 'Pereque', 'Caraguatuba', 'SP');

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
-- Estrutura da tabela `filiado`
--

CREATE TABLE `filiado` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rg` bigint(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `celular` bigint(13) NOT NULL,
  `telefone` bigint(12) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `taxa_rcs` int(11) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `pis` bigint(11) DEFAULT NULL,
  `carteiratrab` bigint(11) DEFAULT NULL,
  `eleitor` int(11) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `agencia` int(11) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `digito` int(11) DEFAULT NULL,
  `civil` varchar(255) DEFAULT NULL,
  `escolaridade` varchar(255) DEFAULT NULL,
  `cnhnum` int(11) DEFAULT NULL,
  `cnhtipo` varchar(255) DEFAULT NULL,
  `cnhvalidade` varchar(255) DEFAULT NULL,
  `endcep` int(11) DEFAULT NULL,
  `endrua` varchar(150) DEFAULT NULL,
  `endnum` int(11) DEFAULT NULL,
  `endbairro` varchar(255) DEFAULT NULL,
  `endcidade` varchar(255) DEFAULT NULL,
  `enduf` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filiado`
--

INSERT INTO `filiado` (`matricula`, `nome`, `email`, `rg`, `cpf`, `celular`, `telefone`, `sexo`, `taxa_rcs`, `nascimento`, `pis`, `carteiratrab`, `eleitor`, `banco`, `agencia`, `conta`, `digito`, `civil`, `escolaridade`, `cnhnum`, `cnhtipo`, `cnhvalidade`, `endcep`, `endrua`, `endnum`, `endbairro`, `endcidade`, `enduf`) VALUES
(11111, 'Georgia', '121', 5511988656702, 876, 65, 0, '5', 20, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Feminino', NULL, NULL, NULL, NULL),
(11112, 'Rafael', 'rafafelipesilva@gmail.com', 403, 49, 49394, 0, 'Masculino', 30, '4939', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rua Trememb', NULL, NULL, NULL, NULL),
(31233, 'Marcelo', '785', 786, 876, 67, 0, 'Masculino', 40, '789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, NULL),
(12345, 'Rodolfo', '59', 6, 875, 67, 0, 'Masculino', 20, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '767', NULL, NULL, NULL, NULL),
(22222, 'Sergio Felipe', 'sergiofelipe@gmail.com', 85938532, 323829318, 119862479, 0, 'Masculino', 20, '05-01-1977', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rua dos Pinheiros', NULL, NULL, NULL, NULL),
(1113123098, '32', '87', 897, 87, 7, 0, 'Masculino', 83, '878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87', NULL, NULL, NULL, NULL),
(677868, '678', '312@gmail.com', 38239820, 38293812093, 3213213232, 0, 'Masculino', 11, '20/03/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '38210938120', NULL, NULL, NULL, NULL),
(11234, '678', '312@gmail.com', 38239820, 38293812093, 3213213232, 0, 'Masculino', 11, '20/03/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '38210938120', NULL, NULL, NULL, NULL),
(44444, 'Inacio', '312321@live.com', 324324234, 42342343243, 21321323212, 0, 'Masculino', 20, '10/03/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rua dos jacares', NULL, NULL, NULL, NULL),
(434324, '432432', '4234234@bol.com', 312312432, 43243243245, 32423432432, 0, 'Feminino', 40, '06/03/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '432423423', NULL, NULL, NULL, NULL),
(45454, 'Neymar Jr', 'neymar@hotmail.com', 439043843, 48329402349, 1143324324, 0, 'Masculino', 10, '03/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rua marquezine', NULL, NULL, NULL, NULL),
(12222, 'fjkdsfjsdkl', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(12346, 'arara', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(12348, 'arara', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(12347, 'bololo', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(12349, 'kkk', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(21212, 'kkk', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(21213, 'john', 'rrr@uol.com.br', 427056219, 32194034830, 1323121323, 0, 'Masculino', 50, '05/04/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'urahfafska', NULL, NULL, NULL, NULL),
(55555, 'Larissa', 'larissinha@hotmail.com', 487056218, 44266671865, 5511988656702, 551138821946, 'Feminino', 10, '30/04/1995', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tijuca', NULL, NULL, NULL, NULL),
(11111111, 'John', 'john@hotmail.com', 487056218, 44266671865, 551198865670, 551130831765, 'Masculino', 25, '27/09/1995', 2012135, 4598420, 4859810, 'Itau', 1661, 4849218, 1, 'CASADO', 'MEDIO', 15645602, 'A', '27/09/1195', 48025479, 'Rua Corinthians', 137, 'Vila Andrade', 'SÃ£o SebastiÃ£o', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentodep`
--

CREATE TABLE `pagamentodep` (
  `idPagamento` int(11) NOT NULL,
  `Afiliado_matricula` int(11) NOT NULL,
  `idDependente` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes` varchar(9) NOT NULL,
  `ano` int(4) NOT NULL,
  `unimed` decimal(10,2) DEFAULT NULL,
  `uniodonto` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamentodep`
--

INSERT INTO `pagamentodep` (`idPagamento`, `Afiliado_matricula`, `idDependente`, `nome`, `data`, `mes`, `ano`, `unimed`, `uniodonto`) VALUES
(1, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(2, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(3, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(4, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(5, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(6, 11111, 0, NULL, '2017-05-08 22:53:18', 'o', 2017, NULL, NULL),
(8, 1, 0, NULL, '2017-05-08 22:53:18', '1', 1, NULL, NULL),
(9, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(10, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(11, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(12, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL),
(13, 1, 0, NULL, '2017-05-08 22:53:18', '1', 1, '1.00', '1.00'),
(14, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '0.00', '0.00'),
(15, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '2.00', '2.00'),
(16, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '200.00', '15.00'),
(17, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '100.00', '15.00'),
(18, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '0.00'),
(19, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '15.00', '0.00'),
(20, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2018, '10.00', '10.00'),
(21, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00'),
(22, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00'),
(23, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2018, '10.00', '10.00'),
(24, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '1.00', '1.00'),
(25, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '1.00', '1.00'),
(26, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00'),
(27, 12345, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2018, '329.00', '321.00'),
(28, 1000, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2017, '10.00', '100.00'),
(29, 12345, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '100.00'),
(30, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '102.00', '21.00'),
(31, 11111, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2017, '100.00', '100.00'),
(32, 11111, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2017, '100.00', '100.00'),
(33, 12345, 0, NULL, '2017-05-08 22:53:18', 'o', 2017, '0.00', '0.00'),
(36, 11111, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '100.00', '20.00'),
(46, 22222, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2017, '370.00', '60.00'),
(45, 22222, 0, NULL, '2017-05-08 22:53:18', 'Abril', 2017, '300.00', '17.00'),
(41, 4, 0, NULL, '2017-05-08 22:53:18', 'Janeiro', 2017, '1000.00', '15.00'),
(47, 1, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2018, '1.00', '1.00'),
(48, 33333, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2017, '10.00', '10.00'),
(49, 22222, 0, NULL, '2017-05-08 22:53:18', 'Fevereiro', 2019, '55.06', '55.78'),
(50, 11111111, 0, NULL, '2017-05-08 22:58:05', 'Janeiro', 2017, '99.99', '50.05'),
(51, 11111111, 0, NULL, '2017-05-10 14:03:37', 'Fevereiro', 2017, '49.99', '10.50'),
(52, 22222, 1, 'Joselito', '2017-05-12 20:51:03', 'Agosto', 2017, '6.00', '9.00'),
(53, 11111111, 7, 'Katia', '2017-05-12 21:40:14', 'Janeiro', 2017, '12.99', '15.45'),
(54, 22222, 2, 'Henrique', '2017-05-12 21:51:17', 'MarÃ§o', 2017, '99.99', '15.00'),
(55, 22222, 3, 'teste', '2017-05-12 21:54:45', 'Janeiro', 2018, '12.00', '33.00'),
(56, 11111111, 6, 'junior', '2017-05-15 19:51:04', 'Janeiro', 2017, '10.01', '5.20'),
(57, 11111111, 6, 'junior', '2017-05-15 19:53:04', 'Fevereiro', 2017, '10.01', '11.00'),
(58, 11111111, 7, 'Katia', '2017-05-15 19:56:30', 'Fevereiro', 2017, '10.00', '10.00'),
(59, 11111111, 6, 'junior', '2017-05-15 20:14:47', 'MarÃ§o', 2017, '10.00', '10.00'),
(60, 11111111, 7, 'Katia', '2017-05-15 20:17:12', 'MarÃ§o', 2017, '100.00', '200.00'),
(61, 22222, 1, 'Joselito', '2017-05-15 20:28:19', 'Fevereiro', 2019, '100.00', '100.00'),
(62, 22222, 2, 'Henrique', '2017-05-15 20:35:36', 'Fevereiro', 2019, '11.00', '11.00'),
(63, 22222, 3, 'teste', '2017-05-15 20:36:49', 'Fevereiro', 2019, '5.50', '9.90'),
(64, 11111111, 8, 'Rodrigo', '2017-05-25 23:03:06', 'MarÃ§o', 2017, '10.00', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentofil`
--

CREATE TABLE `pagamentofil` (
  `idPagamento` int(11) NOT NULL,
  `Afiliado_matricula` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes` varchar(9) NOT NULL,
  `ano` int(4) NOT NULL,
  `unimed` decimal(10,2) DEFAULT NULL,
  `uniodonto` decimal(10,2) DEFAULT NULL,
  `rcs` decimal(10,2) DEFAULT NULL,
  `das` decimal(10,2) DEFAULT NULL,
  `adicional` decimal(10,2) DEFAULT NULL,
  `desconto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamentofil`
--

INSERT INTO `pagamentofil` (`idPagamento`, `Afiliado_matricula`, `data`, `mes`, `ano`, `unimed`, `uniodonto`, `rcs`, `das`, `adicional`, `desconto`) VALUES
(1, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 11111, '2017-05-08 22:53:18', 'o', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, '2017-05-08 22:53:18', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, '2017-05-08 22:53:18', '1', 1, '1.00', '1.00', '1.00', '1.00', NULL, NULL),
(14, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '0.00', '0.00', '18.00', '10.00', NULL, NULL),
(15, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '2.00', '2.00', '14.00', '10.00', NULL, NULL),
(16, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '200.00', '15.00', '0.00', '100.00', NULL, NULL),
(17, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, '100.00', '15.00', '65.00', '100.00', NULL, NULL),
(18, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '0.00', '18.00', '10.00', NULL, NULL),
(19, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '15.00', '0.00', '18.00', '10.00', NULL, NULL),
(20, 11111, '2017-05-08 22:53:18', 'Janeiro', 2018, '10.00', '10.00', '18.00', '10.00', NULL, NULL),
(21, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00', '18.00', '10.00', NULL, NULL),
(22, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00', '18.00', '10.00', NULL, NULL),
(23, 11111, '2017-05-08 22:53:18', 'Janeiro', 2018, '10.00', '10.00', '18.00', '10.00', NULL, NULL),
(24, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '1.00', '1.00', '18.00', '10.00', NULL, NULL),
(25, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '1.00', '1.00', '0.18', '0.10', NULL, NULL),
(26, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '10.00', '18.00', '10.00', NULL, NULL),
(27, 12345, '2017-05-08 22:53:18', 'Fevereiro', 2018, '329.00', '321.00', '56.16', '31.20', NULL, NULL),
(28, 1000, '2017-05-08 22:53:18', 'Fevereiro', 2017, '10.00', '100.00', '0.00', '100.00', '35.00', NULL),
(29, 12345, '2017-05-08 22:53:18', 'Janeiro', 2017, '10.00', '100.00', '18.00', '10.00', NULL, NULL),
(30, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '102.00', '21.00', '180.00', '100.00', NULL, NULL),
(31, 11111, '2017-05-08 22:53:18', 'Fevereiro', 2017, '100.00', '100.00', '250.00', '250.00', '50.00', NULL),
(32, 11111, '2017-05-08 22:53:18', 'Fevereiro', 2017, '100.00', '100.00', '250.00', '250.00', '50.00', NULL),
(33, 12345, '2017-05-08 22:53:18', 'o', 2017, '0.00', '0.00', '180.00', '100.00', NULL, NULL),
(36, 11111, '2017-05-08 22:53:18', 'Janeiro', 2017, '100.00', '20.00', '160.00', '0.00', NULL, NULL),
(46, 22222, '2017-05-08 22:53:18', 'Fevereiro', 2017, '370.00', '60.00', '1400.00', '0.00', '220.00', NULL),
(45, 22222, '2017-05-08 22:53:18', 'Abril', 2017, '300.00', '17.00', '1983.00', '50.00', '220.00', NULL),
(41, 4, '2017-05-08 22:53:18', 'Janeiro', 2017, '1000.00', '15.00', '0.00', '0.00', '1014.90', NULL),
(47, 1, '2017-05-08 22:53:18', 'Fevereiro', 2018, '1.00', '1.00', '0.00', '0.00', NULL, NULL),
(48, 33333, '2017-05-08 22:53:18', 'Fevereiro', 2017, '10.00', '10.00', '0.00', '0.00', '19.90', NULL),
(49, 22222, '2017-05-08 22:53:18', 'Fevereiro', 2019, '55.06', '55.78', '-325.24', '0.00', NULL, NULL),
(50, 11111111, '2017-05-08 22:58:05', 'Janeiro', 2017, '99.99', '30.00', '20.00', '10.99', NULL, NULL),
(51, 11111111, '2017-05-10 14:03:37', 'Fevereiro', 2017, '49.99', '10.50', '20.00', '0.00', '50.10', 'DINHEIRO'),
(52, 11111111, '2017-05-15 20:14:07', 'MarÃ§o', 2017, '100.00', '100.00', '0.00', '50.00', '50.00', 'DAS');

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
-- Indexes for table `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`idConvenio`),
  ADD KEY `fk_Convenio_DAS` (`DAS_Afiliado_matricula`),
  ADD KEY `fk_Convenio_RCS` (`RCS_Afiliado_matricula`);

--
-- Indexes for table `dependente`
--
ALTER TABLE `dependente`
  ADD PRIMARY KEY (`idDependente`),
  ADD KEY `fk_Dependente_Afiliado` (`Afiliado_matricula`);

--
-- Indexes for table `encargo`
--
ALTER TABLE `encargo`
  ADD PRIMARY KEY (`idEncargo`);

--
-- Indexes for table `filiado`
--
ALTER TABLE `filiado`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `pagamentodep`
--
ALTER TABLE `pagamentodep`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `fk_FolhaDePagamento_Afiliado` (`Afiliado_matricula`);

--
-- Indexes for table `pagamentofil`
--
ALTER TABLE `pagamentofil`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `fk_FolhaDePagamento_Afiliado` (`Afiliado_matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convenio`
--
ALTER TABLE `convenio`
  MODIFY `idConvenio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dependente`
--
ALTER TABLE `dependente`
  MODIFY `idDependente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `encargo`
--
ALTER TABLE `encargo`
  MODIFY `idEncargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pagamentodep`
--
ALTER TABLE `pagamentodep`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `pagamentofil`
--
ALTER TABLE `pagamentofil`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
