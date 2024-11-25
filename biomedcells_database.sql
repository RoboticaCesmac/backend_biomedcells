-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/11/2024 às 05:57
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biomedcells`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `celula`
--

DROP TABLE IF EXISTS `celula`;
CREATE TABLE IF NOT EXISTS `celula` (
  `id` int NOT NULL,
  `nome` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagem_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `imagem_2` text COLLATE utf8mb4_general_ci,
  `imagem_3` text COLLATE utf8mb4_general_ci,
  `descricao` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `celula`
--

INSERT INTO `celula` (`id`, `nome`, `imagem_1`, `imagem_2`, `imagem_3`, `descricao`) VALUES
(1, 'Neutrofilos', 'files/images/celulas/neutrofilos1_674283389c544.jpg', 'files/images/celulas/neutrofilos2_67428238012d6.jpg', 'files/images/celulas/neutrofilos3_6742a34f0a8c2.png', 'Neutrófilos são células do sangue que atuam na defesa contra infecções, principalmente bacterianas, realizando fagocitose. São os leucócitos mais abundantes e têm um núcleo segmentado.'),
(2, 'Monocitos', 'files/images/celulas/monocitos1_6742830c2c663.jpg', 'files/images/celulas/monocitos2_674282e5d6593.jpg', NULL, 'Monócitos são células do sangue que fagocitam microorganismos e detritos, e se transformam em macrófagos ou células dendríticas nos tecidos.'),
(3, 'Eosinofilos', 'files/images/celulas/eosinofilo1.jpg', 'files/images/celulas/eosinofilo2.jpg', NULL, 'Os eosinófilos são células do sangue envolvidas na defesa contra parasitas e reações alérgicas. Possuem granulações em seu citoplasma e um núcleo bilobado.'),
(4, 'Basofilos', 'files/images/celulas/basofilo1.jpg', 'files/images/celulas/basofilo2.jpg', NULL, 'Os basófilos são células do sangue envolvidas em respostas alérgicas e inflamatórias. Possuem granulações com histamina e heparina e um núcleo bilobado.'),
(5, 'Linfocitos Típicos', 'files/images/celulas/linfocito_t1.jpg', 'files/images/celulas/linfocito_t2.png', NULL, 'Linfócitos típicos são células do sistema imunológico com características normais, responsáveis pela defesa contra infecções e pela produção de anticorpos, com um núcleo arredondado e citoplasma em pouca quantidade.'),
(6, 'Linfocito Atípicos', 'files/images/celulas/linfocito_a1.jpg', 'files/images/celulas/linfocito_a2.png', NULL, 'Linfócitos atípicos são células com características irregulares, geralmente encontradas em infecções virais ou doenças hematológicas.'),
(7, 'Blastos', 'files/images/celulas/blasto1.png', 'files/images/celulas/blasto2.jpg', 'files/images/celulas/blasto3.jpg', 'Blastos são células sanguíneas imaturas da medula óssea, responsáveis pela formação de outros tipos de células. Sua presença excessiva pode indicar leucemia.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lamina`
--

DROP TABLE IF EXISTS `lamina`;
CREATE TABLE IF NOT EXISTS `lamina` (
  `id` int NOT NULL,
  `nome` mediumtext COLLATE utf8mb4_general_ci,
  `neutrofilo_relativo` int NOT NULL,
  `monocito_relativo` int NOT NULL,
  `eosilofilo_relativo` int NOT NULL,
  `basofilo_relativo` int NOT NULL,
  `linfocito_t_relativo` int NOT NULL,
  `linfocito_a_relativo` int NOT NULL,
  `blastos_relativo` int NOT NULL,
  `imagem` text COLLATE utf8mb4_general_ci NOT NULL,
  `neutrofilo_absoluto` int DEFAULT NULL,
  `monocito_absoluto` int DEFAULT NULL,
  `eosilofilo_absoluto` int DEFAULT NULL,
  `basofilo_absoluto` int DEFAULT NULL,
  `linfocito_t_absoluto` int DEFAULT NULL,
  `linfocito_a_absoluto` int DEFAULT NULL,
  `blastos_absoluto` int DEFAULT NULL,
  `hemacias` int DEFAULT NULL,
  `hemoglobina` int DEFAULT NULL,
  `hematocrito` int DEFAULT NULL,
  `volume_corp_medio` int DEFAULT NULL,
  `hemoglobina_corp_medio` int DEFAULT NULL,
  `concentracao_hemoglobina` int DEFAULT NULL,
  `rdw` int DEFAULT NULL,
  `plaquetas` int DEFAULT NULL,
  `observacao` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lamina`
--

INSERT INTO `lamina` (`id`, `nome`, `neutrofilo_relativo`, `monocito_relativo`, `eosilofilo_relativo`, `basofilo_relativo`, `linfocito_t_relativo`, `linfocito_a_relativo`, `blastos_relativo`, `imagem`, `neutrofilo_absoluto`, `monocito_absoluto`, `eosilofilo_absoluto`, `basofilo_absoluto`, `linfocito_t_absoluto`, `linfocito_a_absoluto`, `blastos_absoluto`, `hemacias`, `hemoglobina`, `hematocrito`, `volume_corp_medio`, `hemoglobina_corp_medio`, `concentracao_hemoglobina`, `rdw`, `plaquetas`, `observacao`) VALUES
(1, 'lamina01', 123, 123, 123, 123, 123, 123, 123, 'files/images/laminas/lamina01_674281b92e542.png', 12, 12, 12, 12, 12, 12, 12, 1, 1, 1, 0, 1, 1, 12, 1, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, '),
(2, 'lamina02', 112, 345, 634, 345, 546, 345, 345, 'files/images/laminas/lamina02_674281c8b9d5a.png', 12, 35, 24, 35, 53, 35, 35, 57, 57, 85, 57, 57, 57, 57, 6, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, '),
(3, 'lamina03', 65, 1, 234, 19, 21, 32, 12, 'files/images/laminas/lamina03_674281d92f46e.png', 64, 12, 65, 12, 22, 32, 53, 12, 12, 1, 23, 34, 63, 35, 35, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, '),
(4, 'lamina04', 123, 123, 123, 123, 123, 123, 123, 'files/images/laminas/lamina04_674281eaef60a.png', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 31, 12, 23, 123, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, '),
(5, 'lamina05', 231, 65, 12, 789, 4, 789, 679, 'files/images/laminas/lamina05_67428201c9ffa.png', 11, 80, 12, 66, 54, 90, 79, 89, 67, 67, 78, 78, 7, 78, 678, 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, '),
(6, 'lamina06', 10, 10, 10, 12, 10, 8, 10, 'files/images/laminas/lamina06_6742a317a52d1.png', 10, 53, 11, 23, 20, 35, 10, 12, 35, 78, 98, 65, 56, 45, 467, 'observação da lâmina 06, teste de edição');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
