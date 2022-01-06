  CREATE TABLE `clientes` (
  	`id` INT(11) NOT NULL AUTO_INCREMENT,
  	`nome` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  	`empresa` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  	PRIMARY KEY (`id`) USING BTREE
  )
  COLLATE='utf8_general_ci'
  AUTO_INCREMENT=1;