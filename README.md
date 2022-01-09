Este é um projeto que foi desenvolvido para o Challenge da Made4it


Geral	
  Elaborar um CRUD de tarefas	
  Revisão do código

Frontend	
  Colocar por sessão ?status=success

Backend
  Criar um delete e upgrade para mais de um usuário	




COMANDOS A SEREM DADOS NO BANCO DE DADOS

    CREATE DATABASE challenge;
    USE challenge;


    CREATE TABLE `login` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `senha` VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci',
    PRIMARY KEY (`id`) USING BTREE
    )
    COLLATE='utf8_general_ci'
    AUTO_INCREMENT=1;


    CREATE TABLE `clientes` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `email` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `empresa` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    PRIMARY KEY (`id`) USING BTREE
    )
    COLLATE='utf8_general_ci'
    AUTO_INCREMENT=1;


    CREATE TABLE `produtos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `nome` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `preco` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
    `descricao` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
    PRIMARY KEY (`id`) USING BTREE
    )
    COLLATE='utf8_general_ci'
    AUTO_INCREMENT=1;