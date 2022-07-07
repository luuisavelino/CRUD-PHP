CREATE TABLE `usuarios` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`usuario` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`senha` VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci',
`email` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`empresa` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`permissao` ENUM('superadmin','admin','usuario') NOT NULL COLLATE 'utf8_general_ci',
PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
AUTO_INCREMENT=1;

INSERT INTO usuarios (usuario, senha, email, empresa, permissao) VALUES ('root',md5('admin'),'root@root.com','CRUD-PHP','superadmin');

CREATE TABLE `produtos` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`codigo` INT(11) NOT NULL COLLATE 'utf8_general_ci',
`nome` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`preco` decimal(15,2) NOT NULL COLLATE 'utf8_general_ci',
`quantidade` INT(11) NOT NULL COLLATE 'utf8_general_ci',
`descricao` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
AUTO_INCREMENT=1;

CREATE TABLE `tarefas` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`tarefa` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`prazo` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
`status` ENUM('fazer','fazendo','cancelado','finalizado') NOT NULL COLLATE 'utf8_general_ci',
PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
AUTO_INCREMENT=1;

CREATE TABLE `estoque` (
`data` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
`codigo` INT(11) NOT NULL COLLATE 'utf8_general_ci',
`preco` decimal(15,2) NOT NULL COLLATE 'utf8_general_ci',
`quantidade` INT(11) COLLATE 'utf8_general_ci'
);