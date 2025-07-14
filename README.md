# Projeto Pratico Uninove 
projeto desenvolvido em php , com banco de dados mysql

banco de dados 

tabela de Agendamento

CREATE TABLE agendamento
(
id INT auto_increment primary key,
nome VARCHAR(100),
sobrenome VARCHAR(100),
email VARCHAR(255),
telefone VARCHAR(100),
mensagem VARCHAR(255))
)

tabela de cadastro/login

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) UNIQUE,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;





