create database New_Way_ECommerce;
use New_Way_ECommerce;

create table usuarios(
    nome varchar(50) NOT NULL PRIMARY KEY,
    cpf varchar(12) NOT NULL,
    email varchar(100) NOT NULL,
    senha varchar(20) NOT NULL,
    produtos_carrinho INT,
    data_criacao date NOT NULL
);

use New_Way_ECommerce;

create table produtos(
codigo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome varchar(200) NOT NULL,
descricao varchar(300) NOT NULL,
preco decimal(10,2) NOT NULL, 
qtdvendas int NOT NULL,
nome_foto varchar(1000) NOT NULL,
tipo varchar(1000) NOT NULL,
conteudo longblob NOT NULL
);


/*DROP DATABASE New_Way_ECommerce;