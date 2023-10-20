-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 16/05/2023 às 22h19min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `boutique`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fragrancia`
--

CREATE TABLE IF NOT EXISTS `fragrancia` (
  `codigo` int(5) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fragrancia`
--

INSERT INTO `fragrancia` (`codigo`, `tipo`) VALUES
(1, 'Perfume'),
(2, 'Eua de Parfum'),
(3, 'ColÃ´nia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `codigo` int(5) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`codigo`, `sexo`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`codigo`, `nome`) VALUES
(1, 'oBoticario'),
(2, 'Natura'),
(3, 'Carolina Herrera');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `codfragrancia` int(5) NOT NULL,
  `codmarca` int(5) NOT NULL,
  `codgenero` int(5) NOT NULL,
  `descricao` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `valor` float(8,2) NOT NULL,
  `conteudo` varchar(50) NOT NULL,
  `fotochamada` varchar(100) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codfragrancia` (`codfragrancia`),
  KEY `codmarca` (`codmarca`),
  KEY `codgenero` (`codgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`codigo`, `nome`, `codfragrancia`, `codmarca`, `codgenero`, `descricao`, `valor`, `conteudo`, `fotochamada`, `foto1`) VALUES
(1, 'Malbec ', 1, 1, 1, 'Malbec Ã© a primeira ColÃ´nia fabricada em processo instigante e sofisticado, que tem tudo a ver com vocÃª. Feito de notas frescas e amadeiradas com base de ameixa, carvalho e baunilha, Malbec representa a masculinidade de forma Ãºnica. Combina com homens que sabem se impor. Que sÃ£o notados por ond', 299.00, '100ml', 'fotos/malbec.jfif', 'fotos/malbec.jpg'),
(2, 'Egeo Dolce ColÃ´nia', 3, 1, 2, 'O Egeo feminino Ã© tÃ£o irresistÃ­vel quanto um doce! Com uma combinaÃ§Ã£o de cheiros adocicados, ela Ã© perfeita para mulheres que querem seduzir com um toque de diversÃ£o.  ', 178.99, '75ml', 'fotos/egeo.jpg', 'fotos/egeo.jpg'),
(3, ' Essencial Oud Deo Parfum', 2, 2, 2, 'O poder de um amadeirado para a mulher. A imponÃªncia do oud, madeira mais nobre do mundo com a sensualidade da CopaÃ­ba uma madeira brasileira realÃ§adas pela feminilidade de intensas facetas florais. Instiga ao mesmo tempo que conquista', 245.99, '75ml', 'fotos/Oud.jpg', 'fotos/Oud.jpg'),
(4, ' Essencial Ãšnico Deo Parfum', 2, 2, 1, 'Uma verdadeira obra de arte co-criada por renomados perfumistas. Um amadeirado intenso Ãºnico que traz a presenÃ§a marcante da CopaÃ­ba, preciosa madeira da biodiversidade amazÃ´nica, envolvida pelo coraÃ§Ã£o do Vetiver na sua forma mais pura, acessando as notas mais nobres deste ingrediente.', 299.00, '100ml', 'fotos/deo perfum.jfif', 'fotos/deo perfum.jfif'),
(5, 'Good Girl Blush', 2, 3, 2, 'Good Girl Blush Eau de Parfum Ã© uma explosÃ£o fresca e floral de feminilidade em um delicado salto agulha rosa-claro', 799.00, '85ml', 'fotos/good.jfif', 'fotos/good.jfif'),
(6, '212 VIP Black', 1, 3, 1, 'O 212 VIP Black traz o contraste entre o intenso absinto e a delicada lavanda, uma composiÃ§Ã£o que combina ousadia confiante e postura destemida, enquanto os tons secundÃ¡rios do almÃ­scar preto e da baunilha produzem um resultado sedutoramente suave.', 679.99, '100ml', 'fotos/212.jfif', 'fotos/212.jfif'),
(7, ' Horus Desodorante', 3, 2, 1, 'Esta fragrÃ¢ncia Ã© uma combinaÃ§Ã£o refrescante de notas amadeiradas do patchouli com o cÃ­trico do LimÃ£o e Bergamota. Revigorante de forte personalidade. Para vocÃª que gosta de se perfumar em abundÃ¢ncia.', 187.00, '100ml', 'fotos/horus.jfif', 'fotos/horus.jfif'),
(8, 'Luckycharms Call Me Darling', 2, 3, 1, 'AlegrÃ­a de Vivir Eau de Parfum Ã© uma fragrÃ¢ncia sensual que usa seu coraÃ§Ã£o de flor de laranjeira em sua manga, desenhando vocÃª com notas de base de Tonka Bean e surpreendentes notas de topo de Leite de Cereja.', 899.00, '75ml', 'fotos/carolina.jfif', 'fotos/carolina.jfif'),
(9, 'Quasar Brave Desodorante', 3, 1, 1, 'Da combinaÃ§Ã£o entre o Ã¡lcool do saquÃª e as notas amadeiradas das folhas do ChÃ¡ Preto, vem a fragrÃ¢ncia masculina exclusiva de Quasar Brave Desodorante ColÃ´nia. Perfeita para homens audaciosos e de muita bravura.', 99.00, '100ml', 'fotos/qsar.jpg', 'fotos/qsar.jpg');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`codfragrancia`) REFERENCES `fragrancia` (`codigo`),
  ADD CONSTRAINT `modelos_ibfk_2` FOREIGN KEY (`codmarca`) REFERENCES `marcas` (`codigo`),
  ADD CONSTRAINT `modelos_ibfk_3` FOREIGN KEY (`codgenero`) REFERENCES `genero` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
