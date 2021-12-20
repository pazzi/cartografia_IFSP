-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/12/2021 às 15:12
-- Versão do servidor: 8.0.27-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `map`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ant_curso`
--

CREATE TABLE `ant_curso` (
  `id` int NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempo` int NOT NULL,
  `tipo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `ant_curso`
--

INSERT INTO `ant_curso` (`id`, `nome`, `tempo`, `tipo`) VALUES
(1, 'Tecnologia em Análise e Desenvovimento de Sistemas', 3, 'T'),
(2, 'Licenciatura em Química', 4, 'L'),
(3, 'Tecnologia em Agronegócio', 3, 'T'),
(4, 'Tecnologia em Alimentos', 3, 'T'),
(5, 'Tecnologia em Automação Industrial', 3, 'T'),
(6, 'Tecnologia em Biocombustível', 3, 'T'),
(7, 'Tecnologia em Design de Interiores', 3, 'T'),
(8, 'Tecnologia em Eletrônica Industrial', 3, 'T'),
(9, 'Tecnologia em Fabricação Mecânica', 3, 'T'),
(10, 'Tecnologia em Gastonomia', 3, 'T'),
(11, 'Tecnologia em Gestão Ambiental', 3, 'T'),
(12, 'Tecnologia em Gestão Pública', 3, 'T'),
(13, 'Tecnologia em Gestão de Produção Industrial', 3, 'T'),
(14, 'Tecnologia em Gestão de Recursos Humanos', 3, 'T'),
(15, 'Tecnologia em Gestão de Turismo', 3, 'T'),
(16, 'Tecnologia em Logística', 3, 'T'),
(17, 'Tecnologia em Mecatrônica Industrial', 3, 'T'),
(18, 'Tecnologia em Manutenção de Aeronaves', 3, 'T'),
(19, 'Tecnologia em Processos Gerenciais', 3, 'T'),
(20, 'Tecnologia em Processos Químicos', 3, 'T'),
(21, 'Tecnologia em Sistemas Elétricos', 3, 'T'),
(22, 'Tecnologia em Sistemas para Internet', 3, 'T'),
(23, 'Tecnologia em Viticultura e Enologia', 3, 'T'),
(24, 'Licenciatura em Ciências Biológicas/Biologia', 4, 'L'),
(25, 'Licenciatura em Física', 4, 'L'),
(26, 'Licenciatura em Form. Pedag. de Docentes p/a Educ. Profis. de Nível Médio - EaD\r\n', 2, 'L'),
(27, 'Licenciatura em Geografia', 4, 'L'),
(28, 'Licenciatura em Letras', 4, 'L'),
(29, 'Licenciatura em Matemática', 4, 'L'),
(30, 'Licenciatura em Pedagogia', 4, 'L'),
(31, 'Formação de Docentes para Educação Básica', 4, 'L'),
(32, 'Formação de Docentes para Educação Básica', 4, 'L'),
(33, 'Administração', 4, 'B'),
(34, 'Agronomia', 5, 'B'),
(35, 'Arquitetura e Urbanismo', 5, 'B'),
(36, 'Ciência da Computação', 5, 'B'),
(37, 'Engenharia de Alimentos', 5, 'B'),
(38, 'Engenharia de Biossistemas', 5, 'B'),
(39, 'Engenharia de Computação', 5, 'B'),
(40, 'Engenharia Civil\r\n', 5, 'B'),
(41, 'Engenharia de Controle e Automação\r\n', 5, 'B'),
(42, 'Engenharia Elétrica\r\n', 5, 'B'),
(43, 'Engenharia de Energias Renováveis', 5, 'B'),
(44, 'Engenharia Eletrônica\r\n', 5, 'B'),
(45, 'Engenharia Mecânica\r\n', 5, 'B'),
(46, 'Engenharia de Produção\r\n', 5, 'B'),
(47, 'Química Industrial\r\n', 4, 'B'),
(48, 'Sistemas de Informação\r\n', 4, 'B'),
(49, 'Turismo', 4, 'B');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` int DEFAULT NULL,
  `nivel` int DEFAULT NULL,
  `fic` int DEFAULT NULL,
  `eja` tinyint(1) DEFAULT NULL,
  `duracao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `categoria`, `nivel`, `fic`, `eja`, `duracao`) VALUES
(1, 'Administração', NULL, NULL, 1, NULL, NULL),
(2, 'Automação industrial', NULL, NULL, 1, NULL, NULL),
(3, 'Cervejaria', NULL, NULL, 1, NULL, NULL),
(4, 'Comércio', NULL, NULL, 1, NULL, NULL),
(5, 'Edificações', NULL, NULL, 1, NULL, NULL),
(6, 'Eletroeletronica', NULL, NULL, 1, NULL, NULL),
(7, 'Eletrônica', NULL, NULL, 1, NULL, NULL),
(8, 'Eletrotécnica', NULL, NULL, 1, NULL, NULL),
(9, 'Fabricação Mecânica', NULL, NULL, 1, NULL, NULL),
(10, 'Informática', NULL, NULL, 1, NULL, NULL),
(11, 'Informática para Internet', NULL, NULL, 1, NULL, NULL),
(13, 'Manutenção de Aeronaves em Célula ', NULL, NULL, 1, NULL, NULL),
(14, 'Manutenção e Suporte em Informática', NULL, NULL, 1, NULL, NULL),
(15, 'Marketing', NULL, NULL, 1, NULL, NULL),
(16, 'Mecânica', NULL, NULL, 1, NULL, NULL),
(17, 'Mecatrônica', NULL, NULL, 1, NULL, NULL),
(18, 'Qualidade ', NULL, NULL, 1, NULL, NULL),
(19, 'Agronegócio', NULL, NULL, 1, NULL, NULL),
(20, 'Aquicultura', NULL, NULL, 1, NULL, NULL),
(21, 'Design de Interiores', NULL, NULL, 1, NULL, NULL),
(22, 'Eletromecânica', NULL, NULL, 1, NULL, NULL),
(23, 'Eventos', NULL, NULL, 1, NULL, NULL),
(24, 'Hospedagem', NULL, NULL, 1, NULL, NULL),
(25, 'Logística', NULL, NULL, 1, NULL, NULL),
(26, 'Meio Ambiente', NULL, NULL, 1, NULL, NULL),
(27, 'Química', NULL, NULL, 1, NULL, NULL),
(28, 'Telecomunicações', NULL, NULL, 1, NULL, NULL),
(29, 'Auxiliar em hospedagem Proeja ', NULL, NULL, 2, NULL, NULL),
(30, 'Operador de Computador EJA', NULL, NULL, 2, NULL, NULL),
(31, 'Ciências Biológicas', NULL, NULL, 3, NULL, NULL),
(32, 'Ciências Naturais: habilitação em Física', NULL, NULL, 3, NULL, NULL),
(33, 'Ciências Naturais: habilitação em Química', NULL, NULL, 3, NULL, NULL),
(34, 'Física     ', NULL, NULL, 3, NULL, NULL),
(35, 'Formação de Docentes para Educação Básica', NULL, NULL, 3, NULL, NULL),
(36, 'Geografia     ', NULL, NULL, 3, NULL, NULL),
(37, 'Letras - Português', NULL, NULL, 3, NULL, NULL),
(38, 'Letras - Português e Espanhol', NULL, NULL, 3, NULL, NULL),
(39, 'Letras - Português e Inglês', NULL, NULL, 3, NULL, NULL),
(40, 'Matemática', NULL, NULL, 3, NULL, NULL),
(41, 'Pedagogia', NULL, NULL, 3, NULL, NULL),
(42, 'Química', NULL, NULL, 3, NULL, NULL),
(43, 'Programa Especial de Formação de Docentes para a Educação Básica', NULL, NULL, 3, NULL, NULL),
(44, 'Aeroportos – Projeto e construção ', NULL, NULL, 4, NULL, NULL),
(45, 'Controle e Automação', NULL, NULL, 4, NULL, NULL),
(46, 'Desenvolvimento de Aplicações para Dispositivos Móveis', NULL, NULL, 4, NULL, NULL),
(47, 'Desenvolvimento de Sistemas para Dispositivos Móveis', NULL, NULL, 4, NULL, NULL),
(48, 'Direitos Humanos', NULL, NULL, 4, NULL, NULL),
(49, 'Docência na Educação Básica', NULL, NULL, 4, NULL, NULL),
(50, 'Docência na Educação Superior', NULL, NULL, 4, NULL, NULL),
(51, 'Docência para a Educação Profissional e Tecnológica', NULL, NULL, 4, NULL, NULL),
(52, 'Educação: Ciência', NULL, NULL, 4, NULL, NULL),
(53, 'Educação Profissional Integrada à Educação Básica na EJA', NULL, NULL, 4, NULL, NULL),
(54, 'Ensino de Ciências da Natureza e Matemática', NULL, NULL, 4, NULL, NULL),
(55, 'Ensini Interdisciplinar de Ciências da Natureza e Matemática', NULL, NULL, 4, NULL, NULL),
(56, 'Especialização em Ciência de Dados', NULL, NULL, 4, NULL, NULL),
(57, 'Especialização em Desenvolvimento Web', NULL, NULL, 4, NULL, NULL),
(58, 'Especialização em Educação para Inserção Social', NULL, NULL, 4, NULL, NULL),
(59, 'Especialização em Ensino de Línguas e Literaturas', NULL, NULL, 4, NULL, NULL),
(60, 'Especialização em Gestão da Tecnologia da Informação', NULL, NULL, 4, NULL, NULL),
(61, 'Especialização em Gestão de Projetos', NULL, NULL, 4, NULL, NULL),
(62, 'Especialização em Gestão Estratégica de Tecnologia da Informação (GETI)', NULL, NULL, 4, NULL, NULL),
(63, 'Especialização em Gestão Financeira', NULL, NULL, 4, NULL, NULL),
(64, 'Especialização em Humanidades - Educação', NULL, NULL, 4, NULL, NULL),
(65, 'Especialização em Informática Aplicada à Educação', NULL, NULL, 4, NULL, NULL),
(66, 'Especialização em Microeletrônica e sistemas embarcados', NULL, NULL, 4, NULL, NULL),
(67, 'Especialização em Produção Sucroenergética', NULL, NULL, 4, NULL, NULL),
(68, 'Especialização em Tecnologias da Informação e Comunicação Aplicadas ao Ensino de Ciências', NULL, NULL, 4, NULL, NULL),
(69, 'Gestão da Tecnologia da Informação', NULL, NULL, 4, NULL, NULL),
(70, 'Gestão de sistemas de informação', NULL, NULL, 4, NULL, NULL),
(71, 'Humanidades: Ciência', NULL, NULL, 4, NULL, NULL),
(72, 'Informática na Educação', NULL, NULL, 4, NULL, NULL),
(73, 'Internet das Coisas - IoT', NULL, NULL, 4, NULL, NULL),
(74, 'Logística e Operações', NULL, NULL, 4, NULL, NULL),
(75, 'Metodologia do Ensino das Ciências da Natureza', NULL, NULL, 4, NULL, NULL),
(76, 'Pós-Graduação em Industria 4.0', NULL, NULL, 4, NULL, NULL),
(77, 'Saberes e Práticas para a Docência no Ensino Fundamental I', NULL, NULL, 4, NULL, NULL),
(78, 'Tecnologia da Informação e Comunicação na Educação ', NULL, NULL, 4, NULL, NULL),
(79, 'Temas Transversais', NULL, NULL, 4, NULL, NULL),
(80, 'Cultura e Sociedade', NULL, NULL, 5, NULL, NULL),
(81, 'Mestrado Acadêmico em Engenharia Mecânica    ', NULL, NULL, 5, NULL, NULL),
(82, 'Mestrado Profissional em Automação e Controle de Processos', NULL, NULL, 5, NULL, NULL),
(83, 'Mestrado Profissional em Ensino de Ciências e Matemática', NULL, NULL, 5, NULL, NULL),
(84, 'Mestrado Profissional em Matemática em Rede Nacional', NULL, NULL, 5, NULL, NULL),
(85, 'Política e Sociedade', NULL, NULL, 5, NULL, NULL),
(86, 'Tecnologia e Sociedade', NULL, NULL, 5, NULL, NULL),
(87, 'Administração', NULL, NULL, 6, NULL, NULL),
(88, 'Agronomia', NULL, NULL, 6, NULL, NULL),
(89, 'Análise e Desenvolvimento de Sistemas', NULL, NULL, 6, NULL, NULL),
(90, 'Arquitetura e Urbanismo', NULL, NULL, 6, NULL, NULL),
(91, 'Ciência da Computação', NULL, NULL, 6, NULL, NULL),
(92, 'Eletrônica Industrial', NULL, NULL, 6, NULL, NULL),
(93, 'Engenharia Civil', NULL, NULL, 6, NULL, NULL),
(94, 'Engenharia de Alimentos', NULL, NULL, 6, NULL, NULL),
(95, 'Engenharia de Biossistemas', NULL, NULL, 6, NULL, NULL),
(96, 'Engenharia de Computação  ', NULL, NULL, 6, NULL, NULL),
(97, 'Engenharia de Controle e Automação', NULL, NULL, 6, NULL, NULL),
(98, 'Engenharia de Energias Renováveis', NULL, NULL, 6, NULL, NULL),
(99, 'Engenharia de Produção', NULL, NULL, 6, NULL, NULL),
(100, 'Engenharia Elétrica', NULL, NULL, 6, NULL, NULL),
(101, 'Engenharia Eletrônica', NULL, NULL, 6, NULL, NULL),
(102, 'Engenharia Mecânica', NULL, NULL, 6, NULL, NULL),
(103, 'Gestão Ambiental', NULL, NULL, 6, NULL, NULL),
(104, 'Gestão da Produção Industrial', NULL, NULL, 6, NULL, NULL),
(105, 'Química Industrial', NULL, NULL, 6, NULL, NULL),
(106, 'Sistemas de Informação', NULL, NULL, 6, NULL, NULL),
(107, 'Tecnologia em Agronegócio', NULL, NULL, 6, NULL, NULL),
(108, 'Tecnologia em Alimentos', NULL, NULL, 6, NULL, NULL),
(109, 'Tecnologia em Análise e Desenvolvimento de Sistemas', NULL, NULL, 6, NULL, NULL),
(110, 'Tecnologia em Automação Industrial', NULL, NULL, 6, NULL, NULL),
(111, 'Tecnologia em Biocombustíveis', NULL, NULL, 6, NULL, NULL),
(112, 'Tecnologia em Design de Interiores', NULL, NULL, 6, NULL, NULL),
(113, 'Tecnologia em Eletrônica Industrial', NULL, NULL, 6, NULL, NULL),
(114, 'Tecnologia em Gastronomia', NULL, NULL, 6, NULL, NULL),
(116, 'Tecnologia em Gestão de Recursos Humanos', NULL, NULL, 6, NULL, NULL),
(117, 'Tecnologia em Gestão de Turismo', NULL, NULL, 6, NULL, NULL),
(118, 'Tecnologia em Gestão Pública', NULL, NULL, 6, NULL, NULL),
(119, 'Tecnologia em Manutenção de Aeronaves', NULL, NULL, 6, NULL, NULL),
(120, 'Tecnologia em Mecatrônica Industrial', NULL, NULL, 6, NULL, NULL),
(121, 'Tecnologia em Processos Gerenciais', NULL, NULL, 6, NULL, NULL),
(122, 'Tecnologia em Processos Químicos', NULL, NULL, 6, NULL, NULL),
(123, 'Tecnologia em Sistemas Elétricos', NULL, NULL, 6, NULL, NULL),
(124, 'Tecnologia em Sistemas para Internet', NULL, NULL, 6, NULL, NULL),
(125, 'Tecnológico em Logística', NULL, NULL, 6, NULL, NULL),
(126, 'Tecnológico em Mecatrônica', NULL, NULL, 6, NULL, NULL),
(127, 'Turismo ', NULL, NULL, 6, NULL, NULL),
(128, 'Viticultura e Enologia', NULL, NULL, 6, NULL, NULL),
(129, 'Licenciatura em Pedagogia e EPT', NULL, NULL, 7, NULL, NULL),
(130, 'Formação Pedagógica de Docentes para a EPT de Nível Médio', NULL, NULL, 7, NULL, NULL),
(131, 'Tecnologia em Processos Gerenciais', NULL, NULL, 7, NULL, NULL),
(132, 'EAD - Técnico em Secretaria Escolar', NULL, NULL, 8, NULL, NULL),
(133, 'Administração EJA', NULL, NULL, 9, NULL, NULL),
(135, 'Administração Proeja', NULL, NULL, 9, NULL, NULL),
(136, 'Comunicação Visual EJA', NULL, NULL, 9, NULL, NULL),
(137, 'INFORMÁTICA BÁSICA EJA', NULL, NULL, 9, NULL, NULL),
(138, 'Logística PROEJA', NULL, NULL, 9, NULL, NULL),
(139, 'Mecânica EJA', NULL, NULL, 9, NULL, NULL),
(140, 'Segurança do Trabalho - EJA', NULL, NULL, 9, NULL, NULL),
(141, 'Técnico em Comércio', NULL, NULL, 9, NULL, NULL),
(142, 'Técnico em Hospedagem EJA', NULL, NULL, 9, NULL, NULL),
(143, 'Telecomunicações (PROEJA)', NULL, NULL, 9, NULL, NULL),
(144, 'Açúcar e Álcool', NULL, NULL, 10, NULL, NULL),
(145, 'Administração', NULL, NULL, 10, NULL, NULL),
(146, 'Alimentos', NULL, NULL, 10, NULL, NULL),
(147, 'Automação Industrial', NULL, NULL, 10, NULL, NULL),
(148, 'Edificações', NULL, NULL, 10, NULL, NULL),
(149, 'Eletroeletrônica ', NULL, NULL, 10, NULL, NULL),
(150, 'Eletromecânica', NULL, NULL, 10, NULL, NULL),
(151, 'Eletrônica', NULL, NULL, 10, NULL, NULL),
(152, 'Eletrotécnica', NULL, NULL, 10, NULL, NULL),
(153, 'Informática', NULL, NULL, 10, NULL, NULL),
(154, 'Informática para Internet', NULL, NULL, 10, NULL, NULL),
(155, 'Logística', NULL, NULL, 10, NULL, NULL),
(156, 'Manutenção Automotiva', NULL, NULL, 10, NULL, NULL),
(157, 'Manutenção de Aeronaves em Aviônicos', NULL, NULL, 10, NULL, NULL),
(158, 'Técnico em Mecânica', NULL, NULL, 10, NULL, NULL),
(159, 'Mecatrônica', NULL, NULL, 10, NULL, NULL),
(160, 'Meio Ambiente', NULL, NULL, 10, NULL, NULL),
(161, 'Produção de Áudio e Vídeo', NULL, NULL, 10, NULL, NULL),
(162, 'Qualidade', NULL, NULL, 10, NULL, NULL),
(163, 'Química', NULL, NULL, 10, NULL, NULL),
(164, 'Redes de Computadores', NULL, NULL, 10, NULL, NULL),
(165, 'Agroindústria', NULL, NULL, 10, NULL, NULL),
(166, 'Agropecuária', NULL, NULL, 10, NULL, NULL),
(167, 'Desenho de Construção Civil', NULL, NULL, 10, NULL, NULL),
(168, 'Eventos ', NULL, NULL, 10, NULL, NULL),
(169, 'Lazer', NULL, NULL, 10, NULL, NULL),
(171, 'Física', NULL, NULL, 6, NULL, NULL),
(172, 'Matemática', NULL, NULL, 6, NULL, NULL),
(173, 'Pedagogia', NULL, NULL, 6, NULL, NULL),
(174, 'Mestrado Profissional em Educação Profissional e Tecnológica', NULL, NULL, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fic`
--

CREATE TABLE `fic` (
  `id` int NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `fic`
--

INSERT INTO `fic` (`id`, `descricao`) VALUES
(1, 'Concomitantes Subsequentes'),
(2, 'FIC'),
(3, 'Licenciatura'),
(4, 'Pós Lato Sensu '),
(5, 'Pós Stricto Sensu'),
(6, 'Superior'),
(7, 'Superior Ead'),
(8, 'Técnico Ead'),
(9, 'Técnico EJA'),
(10, 'Técnico Integrado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `markers`
--

CREATE TABLE `markers` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Itapetininga', 'Av. João Olímpio de Oliveira, 1561 - Vila Asem, Itapetininga - SP, 18202-000', -23.587736, -48.019886, 'Edu'),
(2, 'Salto', 'R. Rio Branco, 1780 - Vila Teixeira, Salto - SP, 13320-271', -23.196306, -47.302010, 'Edu'),
(3, 'Capivari', 'Av. Dr. Ênio Pires de Camargo, 2971 - São João Batista, Capivari - SP, 13360-000', -22.976465, -47.473232, 'Edu'),
(4, 'Campinas', 'R. Heitor Lacerda Guedes, 1000 - Cidade Satélite Íris, Campinas - SP, 13059-581', -22.948071, -47.149746, 'Edu'),
(5, 'Hortolândia', 'Av. Thereza Ana Cecon Breda, 1896 - Vila Sao Pedro, Hortolândia - SP, 13183-091', -22.841623, -47.228104, 'Edu'),
(6, 'São Paulo', 'R. Pedro Vicente, 625 - Canindé, São Paulo - SP, 01109-010', -23.544476, -46.679535, 'Edu'),
(7, 'São Roque', 'Rodovia Prefeito Quintino de Lima, 2100 - Paisagem Colonial, São Roque - SP, 18145-090', -23.554550, -47.150303, 'Edu'),
(8, 'Jundiaí', 'Av. Dr. Cavalcanti, 396 - Centro, Jundiaí - SP, 13201-003', -23.192863, -46.877003, 'Edu'),
(9, 'Campos do Jordão', 'Rua Monsenhor José Vita, 280 - Abernéssia, Campos do Jordão - SP, 12460-000', -22.742514, -45.592594, 'Edu'),
(10, 'Cubatão', 'R. Maria Cristina, 50 - Casqueiro, Cubatão - SP, 11533-160', -23.928156, -46.412361, 'Edu'),
(11, 'Registro', 'Av. Clara Gianotti de Souza, Registro - SP, 11900-000', -24.533045, -47.869179, 'Edu'),
(12, 'Araraquara', 'Rua Doutor Aldo Benedito, R. Sebastião Pierri, 250 - Jardim Paulo Freire, Araraquara - SP, 14804-296', -21.783653, -48.210896, 'Edu'),
(13, 'Avaré', 'Av. Prof. Célso Ferreira da Silva, 1333 - Jardim Europa II, Avaré - SP, 18707-150', -23.078159, -48.926270, 'Edu'),
(14, 'Barretos', 'Av. C- Um, 250 – Bairro - Res. Ide Daher, Barretos - SP, 14781-502', -20.540842, -48.549595, 'Edu'),
(15, 'Birigui', 'Residencial Portal da Pérola II - Rua Pedro Cavalo, 709 - Residencial Portal da Pérola II, Birigui - SP, 16201-407', -21.249365, -50.313499, 'Edu'),
(16, 'Boituva', 'R. Zélia de Lima Rosa, 100 - Recanto das Primaveras I, Boituva - SP, 18552-252', -23.288162, -47.652241, 'Edu'),
(17, 'Bragança Paulista', 'Av. Maj. Fernando Valle, 2013 - São Miguel, Bragança Paulista - SP, 12903-000', -22.948547, -46.558475, 'Edu'),
(18, 'Caraguatatuba', 'Av. Bahia, 1739 - Indaiá, Caraguatatuba - SP, 11665-071', -23.636669, -45.425877, 'Edu'),
(19, 'Catanduva', 'Av. Pastor José Dutra de Moraes, 239 - Distrito Industrial Antônio Zácaro, Catanduva - SP, 15808-305', -21.146473, -48.946163, 'Edu'),
(20, 'Guarulhos', 'Av. Salgado Filho, 3501 - Centro, Guarulhos - SP, 07115-000', -23.438601, -46.537434, 'Edu'),
(21, 'Ilha Solteira', 'Alameda Tucuruí, 164, Ilha Solteira - SP, 15385-000', -20.420612, -51.333229, 'Edu'),
(22, 'Matão', 'R. Estéfano D\'avassi, 625 - Nova Cidade, Matão - SP, 15991-502', -21.624083, -48.348137, 'Edu'),
(23, 'Jacareí ', 'R. Antônio Fogaça de Almeida, 200 - Jardim America, Jacareí - SP, 12322-030', -23.317486, -45.983715, 'Edu'),
(24, 'Sertãozinho ', 'R. Américo Ambrósio, 269 - Jardim Canaa, Sertãozinho - SP, 14169-263', -21.143015, -47.972973, 'Edu'),
(25, 'Suzano ', 'Av. Mogi das Cruzes, 1501 - Parque Suzano, Suzano - SP, 08673-010', -23.535414, -46.326752, 'Edu'),
(26, 'São Carlos', 'Estrada Municipal Paulo Eduardo de Almeida Prado - São Carlos - SP - CEP: 13.565-820, São Carlos - S', -21.969973, -47.878510, 'Edu'),
(27, 'São João da Boa Vista', 'Av Marginal 585 Fazenda Nossa Senhora Aparecida do Jaguari, São João da Boa Vista - SP, 13871-298', -21.966873, -46.812706, 'Edu'),
(28, 'Itaquaquecetuba', 'R. Primeiro de Maio, 500 - Estação, Itaquaquecetuba - SP, 08571-050 ', -23.485126, -46.342346, 'Edu'),
(29, 'Piracicaba', 'Santa Rosa Ipes, Piracicaba - State of São Paulo', -22.693308, -47.625542, 'Edu'),
(30, 'Pirituba', 'Av. Mutinga, 951 - Jardim Santo Elias, São Paulo - SP, 05110-000', -23.488420, -46.734707, 'Edu'),
(31, 'Presidente Epitácio', 'R. José Ramos Júnior, 27-50 - Jardim Tropical, Pres. Epitácio - SP, 19470-000', -21.785051, -52.111469, 'Edu'),
(32, 'São José do Rio Preto', 'R. Dr. Eduardo Nielsem, 420 - Jardim Congonhas, São José do Rio Preto - SP, 15030-070', -20.805265, -49.404770, 'Edu'),
(33, 'São Miguel Paulista', 'R. Ten. Miguel Délia, 105 - São Miguel, Paulista - SP, 08021-090', -23.498882, -46.438969, 'Edu'),
(34, 'Sorocaba', 'R. Maria Cinto de Biaggi, 130 - Jardim Santa Rosália, Sorocaba - SP, 18095-410', -23.488354, -47.444443, 'Edu'),
(35, 'Tupã', 'Av. dos Universitários, 145 - Jardim Ipiranga, Tupã - SP, 17607-220', -21.923101, -50.521896, 'Edu'),
(36, 'Votuporanga', 'Av. Jerônimo Figueira da Costa, 3014 - Pozzobon, Votuporanga - SP, 15503-110', -20.403891, -49.968292, 'Edu'),
(37, 'São José dos Campos', 'Rod. Pres. Dutra, km 145 - s/n - Jardim Diamante, São José dos Campos - SP, 12223-201', -23.190969, -45.849300, 'Edu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_curso`
--

CREATE TABLE `tab_curso` (
  `id` int NOT NULL,
  `id_cidade` int NOT NULL,
  `id_curso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tab_curso`
--

INSERT INTO `tab_curso` (`id`, `id_cidade`, `id_curso`) VALUES
(1, 13, 29),
(2, 31, 30),
(3, 14, 29),
(4, 15, 141),
(5, 4, 143),
(6, 3, 133),
(7, 18, 135),
(8, 10, 137),
(9, 23, 138),
(10, 8, 135),
(13, 22, 140),
(14, 33, 136),
(15, 24, 139),
(16, 16, 132),
(17, 12, 158),
(18, 12, 153),
(19, 13, 165),
(20, 13, 169),
(21, 13, 159),
(22, 14, 166),
(23, 14, 146),
(24, 14, 153),
(25, 15, 145),
(26, 15, 153),
(27, 16, 147),
(28, 16, 164),
(29, 17, 149),
(30, 17, 153),
(31, 17, 158),
(32, 4, 153),
(33, 4, 151),
(34, 9, 153),
(35, 9, 148),
(36, 3, 153),
(37, 3, 163),
(38, 18, 153),
(39, 19, 159),
(40, 19, 164),
(41, 10, 153),
(42, 10, 168),
(43, 20, 159),
(44, 20, 153),
(45, 5, 147),
(46, 5, 153),
(47, 5, 158),
(48, 21, 167),
(49, 21, 148),
(50, 1, 153),
(51, 1, 150),
(52, 28, 158),
(53, 23, 153),
(54, 23, 145),
(55, 8, 155),
(56, 22, 163),
(57, 22, 146),
(58, 22, 144),
(59, 29, 153),
(60, 29, 156),
(61, 30, 164),
(62, 30, 155),
(63, 31, 153),
(64, 31, 159),
(65, 2, 147),
(66, 2, 153),
(67, 26, 154),
(68, 26, 157),
(69, 27, 151),
(70, 27, 154),
(71, 33, 161),
(72, 33, 154),
(73, 6, 152),
(74, 6, 153),
(75, 6, 158),
(76, 6, 162),
(77, 7, 146),
(78, 7, 145),
(79, 7, 160),
(80, 24, 163),
(81, 24, 147),
(82, 34, 145),
(83, 34, 149),
(84, 25, 145),
(85, 25, 147),
(86, 35, 152),
(87, 35, 151),
(88, 36, 148),
(89, 36, 153),
(90, 36, 159),
(91, 37, 147),
(92, 37, 158),
(94, 12, 17),
(95, 12, 10),
(96, 13, 23),
(97, 13, 16),
(98, 14, 19),
(99, 14, 23),
(100, 15, 1),
(101, 15, 2),
(102, 16, 2),
(103, 16, 25),
(104, 17, 17),
(105, 4, 10),
(106, 4, 6),
(107, 9, 5),
(108, 9, 23),
(109, 9, 24),
(110, 3, 27),
(111, 18, 1),
(112, 18, 20),
(113, 18, 5),
(114, 18, 11),
(115, 18, 26),
(116, 19, 16),
(117, 10, 2),
(118, 20, 2),
(119, 20, 11),
(120, 5, 6),
(121, 5, 9),
(122, 5, 14),
(123, 21, 5),
(124, 1, 16),
(125, 1, 10),
(126, 1, 22),
(127, 1, 5),
(128, 28, 16),
(129, 23, 21),
(130, 23, 1),
(131, 8, 4),
(132, 29, 16),
(133, 30, 1),
(134, 31, 1),
(135, 31, 5),
(136, 31, 8),
(137, 2, 2),
(138, 2, 10),
(139, 26, 18),
(140, 26, 13),
(141, 27, 1),
(142, 27, 2),
(143, 27, 14),
(144, 37, 2),
(145, 37, 8),
(146, 37, 16),
(147, 6, 5),
(148, 6, 8),
(149, 6, 28),
(150, 24, 1),
(151, 24, 7),
(152, 24, 15),
(153, 24, 3),
(154, 34, 1),
(155, 34, 6),
(156, 34, 17),
(157, 25, 1),
(158, 25, 2),
(159, 35, 7),
(160, 36, 16),
(161, 16, 129),
(162, 3, 131),
(163, 6, 130),
(164, 12, 40),
(165, 13, 38),
(166, 13, 31),
(167, 14, 31),
(168, 14, 42),
(169, 17, 40),
(170, 9, 40),
(171, 9, 41),
(172, 3, 42),
(173, 18, 34),
(174, 18, 40),
(175, 19, 42),
(176, 10, 37),
(177, 20, 40),
(178, 5, 40),
(179, 1, 35),
(180, 1, 40),
(181, 1, 34),
(182, 28, 40),
(183, 23, 41),
(184, 22, 42),
(185, 29, 34),
(186, 30, 39),
(187, 31, 41),
(188, 2, 37),
(189, 2, 40),
(190, 27, 32),
(191, 27, 33),
(192, 37, 40),
(193, 37, 42),
(194, 6, 31),
(195, 6, 34),
(196, 6, 36),
(197, 6, 37),
(198, 6, 40),
(199, 6, 42),
(200, 7, 31),
(201, 24, 35),
(202, 24, 37),
(203, 24, 42),
(204, 34, 41),
(205, 25, 42),
(206, 36, 34),
(207, 12, 89),
(208, 12, 102),
(209, 13, 95),
(210, 13, 114),
(211, 13, 107),
(212, 14, 88),
(213, 14, 89),
(214, 14, 127),
(215, 15, 171),
(216, 15, 172),
(217, 15, 172),
(218, 15, 120),
(219, 15, 124),
(220, 16, 99),
(221, 16, 173),
(222, 16, 89),
(223, 16, 104),
(224, 17, 89),
(225, 17, 97),
(226, 17, 113),
(227, 17, 120),
(228, 4, 89),
(229, 4, 113),
(230, 9, 89),
(231, 9, 117),
(232, 3, 89),
(233, 3, 122),
(234, 18, 89),
(235, 18, 93),
(236, 18, 121),
(237, 19, 89),
(238, 19, 97),
(239, 19, 120),
(240, 10, 110),
(241, 10, 117),
(242, 10, 89),
(243, 10, 97),
(244, 10, 127),
(245, 20, 89),
(246, 20, 97),
(247, 20, 110),
(248, 5, 89),
(249, 5, 97),
(250, 1, 102),
(251, 23, 89),
(252, 23, 97),
(253, 23, 112),
(254, 22, 94),
(255, 22, 98),
(256, 22, 108),
(257, 22, 111),
(258, 29, 110),
(259, 29, 102),
(260, 29, 100),
(261, 29, 96),
(262, 29, 89),
(263, 30, 89),
(264, 30, 99),
(265, 30, 118),
(266, 31, 89),
(267, 31, 91),
(268, 31, 100),
(269, 2, 89),
(270, 2, 91),
(271, 2, 97),
(272, 2, 104),
(273, 26, 89),
(274, 26, 119),
(275, 26, 121),
(276, 27, 91),
(277, 27, 97),
(278, 27, 121),
(279, 27, 124),
(280, 37, 97),
(281, 37, 102),
(282, 6, 89),
(283, 6, 110),
(284, 6, 104),
(285, 6, 117),
(286, 6, 123),
(287, 6, 90),
(288, 6, 93),
(289, 6, 97),
(290, 6, 99),
(291, 6, 100),
(292, 6, 101),
(293, 6, 102),
(294, 7, 87),
(295, 7, 103),
(296, 7, 128),
(297, 24, 100),
(298, 24, 102),
(299, 24, 110),
(300, 24, 116),
(301, 34, 116),
(302, 25, 125),
(303, 25, 126),
(304, 25, 105),
(305, 25, 97),
(306, 36, 93),
(307, 36, 100),
(308, 36, 106),
(309, 12, 54),
(310, 16, 60),
(311, 17, 62),
(312, 4, 56),
(313, 4, 58),
(314, 4, 66),
(315, 4, 68),
(316, 3, 78),
(317, 3, 51),
(318, 18, 63),
(319, 19, 77),
(320, 19, 54),
(321, 19, 73),
(322, 20, 70),
(323, 5, 59),
(324, 1, 65),
(325, 1, 57),
(326, 22, 67),
(327, 29, 48),
(328, 30, 64),
(329, 30, 61),
(330, 2, 79),
(331, 26, 47),
(332, 26, 52),
(333, 27, 46),
(334, 27, 72),
(335, 27, 71),
(336, 37, 49),
(337, 6, 50),
(338, 6, 53),
(339, 6, 44),
(340, 6, 69),
(341, 6, 45),
(342, 7, 75),
(343, 34, 76),
(344, 25, 74),
(345, 30, 85),
(346, 26, 86),
(347, 27, 80),
(348, 6, 82),
(349, 6, 83),
(350, 6, 84),
(351, 6, 81),
(352, 24, 174);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ant_curso`
--
ALTER TABLE `ant_curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fic`
--
ALTER TABLE `fic`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_curso`
--
ALTER TABLE `tab_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_curso` (`id_curso`),
  ADD KEY `fk_id_markers` (`id_cidade`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ant_curso`
--
ALTER TABLE `ant_curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de tabela `fic`
--
ALTER TABLE `fic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tab_curso`
--
ALTER TABLE `tab_curso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tab_curso`
--
ALTER TABLE `tab_curso`
  ADD CONSTRAINT `fk_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_markers` FOREIGN KEY (`id_cidade`) REFERENCES `markers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
