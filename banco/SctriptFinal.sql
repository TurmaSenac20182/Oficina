-- -----------------------------------------------------
-- Schema petshop
-- -----------------------------------------------------
CREATE Database `petshop`;
USE `petshop` ;

-- -----------------------------------------------------
-- Table `petshop`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`compras` (
  `idcompras` INT(11) NOT NULL,
  `produtos` VARCHAR(45) NOT NULL,
  `data` DATE NOT NULL,
  `hora` DATETIME NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `valort` INT(11) NOT NULL,
  `valoru` INT(11) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcompras`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `petshop`.`contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`contato` (
  `idcontato` INT PRIMARY KEY NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NULL DEFAULT NULL
  );
-- -----------------------------------------------------
-- Table `petshop`.`endereço`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`endereço` (
  `cep` INT  PRIMARY KEY  NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(45) NOT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `complemento` VARCHAR(45) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NOT NULL
  );
-- -----------------------------------------------------
-- Table `petshop`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`cliente` (
  `cpf` INT PRIMARY KEY NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `nascimento` DATE NOT NULL,
  `contato_idcontato` INT NOT NULL,
  `endereço_cep` INT NOT NULL,
  `compras_idcompras` INT NOT NULL,   
  CONSTRAINT `fk_cliente_compras1`   FOREIGN KEY (`compras_idcompras`)  REFERENCES `petshop`.`compras` (`idcompras`),
  CONSTRAINT `fk_cliente_contato`    FOREIGN KEY (`contato_idcontato`)  REFERENCES `petshop`.`contato` (`idcontato`),
  CONSTRAINT `fk_cliente_endereço1`  FOREIGN KEY (`endereço_cep`)       REFERENCES `petshop`.`endereço` (`cep`)
  );
-- -----------------------------------------------------
-- Table `petshop`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`produtos` (
  `idprodutos` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `custo` INT(11) NOT NULL,
  `estoque` INT(11) NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `foto` LONGBLOB NOT NULL,
  `preco` INT(11) NOT NULL,
  `marca` VARCHAR(45) NOT NULL
  );
-- -----------------------------------------------------
-- Table `petshop`.`compras_has_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`compras_has_produtos` (
  `compras_idcompras` INT PRIMARY KEY NOT NULL,
  `produtos_idprodutos` INT  NOT NULL,   
  CONSTRAINT `fk_compras_has_produtos_compras1`  FOREIGN KEY (`compras_idcompras`)  REFERENCES `petshop`.`compras` (`idcompras`),
  CONSTRAINT `fk_compras_has_produtos_produtos1` FOREIGN KEY (`produtos_idprodutos`)REFERENCES `petshop`.`produtos` (`idprodutos`)
  );
-- -----------------------------------------------------
-- Table `petshop`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`usuario` (
  `senha` VARCHAR(40) PRIMARY KEY  NOT NULL,
  `nivel` INT UNSIGNED NOT NULL DEFAULT '1',
  `cliente_cpf` INT(11) NOT NULL,  
  CONSTRAINT `fk_usuario_cliente1`  FOREIGN KEY (`cliente_cpf`)  REFERENCES `petshop`.`cliente` (`cpf`)
    );