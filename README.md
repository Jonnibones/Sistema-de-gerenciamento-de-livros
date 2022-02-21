# Sistema de Gerenciamento de livros em php

Código fonte de um sistema de gerenciamento de livros em php\
Frameworks: Codeigniter 4, Bootstrap\
Plugins: Datatables\
API's: Sweet Alert

## Banco de dados

Crie um banco de dados(de prefêrencia com o nome: db_library) e execute as instruções SQLs abaixo para criação das tabelas:

--
-- Estrutura para tabela `tb_books`
--

DROP TABLE IF EXISTS `tb_books`;
CREATE TABLE IF NOT EXISTS `tb_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `pub_company` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `avaliable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_reservation`
--

DROP TABLE IF EXISTS `tb_reservation`;
CREATE TABLE IF NOT EXISTS `tb_reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `school` varchar(100) DEFAULT NULL,
  `level` int(4) NOT NULL,
  `logged` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

## Configuração

* Crie um virtual host(de preferência com o nome de: t-max-test) no seu servidor local(localhost)
* Altere a linha 26 do arquivo: ./app/Config/App.php\ para -> public $baseURL = 'http://t-max-test';
* Altere a linha 39 do arquivo: ./app/Config/App.php\ para -> public $indexPage = '';
* As credenciais do banco de dados estão no arquivo ./app/Config/Database.php e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).
