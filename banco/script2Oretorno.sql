
CREATE DATABASE db_oficina;
USE `db_oficina` ;

-- -----------------------------------------------------
-- Table `oficina`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_oficina`.`contato` ;

CREATE TABLE IF NOT EXISTS `db_oficina`.`contato` (
  `idContato` INT(11) NOT NULL AUTO_INCREMENT,
  `tel` VARCHAR(12) NULL DEFAULT NULL,
  `cel` VARCHAR(13) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idContato`));

-- -----------------------------------------------------
-- Table `Oficina2`.`endereco`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `db_oficina`.`endereco` (
  `idendereco` INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tipoLogradouro` VARCHAR(4) NULL,
  `logradouro` VARCHAR(100) NULL,
  `numero` INT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `bairro` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NULL,
  `uf` VARCHAR(2) NULL,
  `complemento` VARCHAR(100) NULL
   );

-- -----------------------------------------------------
-- Table `Oficina2`.`servico`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `db_oficina`.`servico` (
  `idservico` INT  PRIMARY KEY AUTO_INCREMENT NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NULL
   );

-- -----------------------------------------------------
-- Table `Oficina2`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_oficina`.`cliente` (
  `idcliente` INT  PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `rg` VARCHAR(9) NOT NULL,
  `Contato_idContato` INT NOT NULL,
  `idEndereco` INT NOT NULL,        
  CONSTRAINT `fk_cliente_Contato` FOREIGN KEY (`Contato_idContato`)  REFERENCES `db_oficina`.`Contato` (`idContato`),   
  CONSTRAINT `fk_cliente_endereco`FOREIGN KEY (`idEndereco`)  REFERENCES `db_oficina`.`endereco` (`idendereco`)
 
  );
  
  -- -----------------------------------------------------
-- Table `Oficina2`.`carro`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `db_oficina`.`carro` (
  `idcarro` INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(30) NOT NULL,
  `modelo` VARCHAR(30) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `anoCarro` VARCHAR(4) NOT NULL,
  `idCliente_carro` INT NOT NULL,
   CONSTRAINT `fk_carro_cliente` FOREIGN KEY (`idCliente_carro`) REFERENCES `db_oficina`.`cliente` (`idcliente`)
   );
   
   -- -----------------------------------------------------
-- Table `Oficina2`.`ordemServico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_oficina`.`ordemServico` (
  `idordemServico` INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `idcliente` INT NOT NULL,
  `funcionario` VARCHAR(100) NOT NULL,
  `dataEntrada` VARCHAR(15) NOT NULL,
  `dataSaida`   VARCHAR(15) NOT NULL,
  `valorTotal` DOUBLE NOT NULL, 
  `finalizado` tinyint default false,   
   CONSTRAINT `fk_idcliente`FOREIGN KEY (`idcliente`) REFERENCES `db_oficina`.`cliente` (`idcliente`)  
  );

-- -----------------------------------------------------
-- Table `oficina`.`servico`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `db_oficina`.`servico` (
  `idServico` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `maoDeObra` VARCHAR(255) NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL
  );
  
  -- -----------------------------------------------------
-- Table `oficina`.`servico_has_ordemservico`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `db_oficina`.`servico_e_ordemservico` (
  `servico_idServico` INT   NOT NULL,
  `ordemservico_idordemServico` INT   NOT NULL,   
  CONSTRAINT `fk_servico` FOREIGN KEY (`servico_idServico`) REFERENCES `db_oficina`.`servico` (`idServico`),
  CONSTRAINT `fk_ordemservico`FOREIGN KEY (`ordemservico_idordemServico`) REFERENCES `db_oficina`.`ordemservico` (`idordemServico`)
  );  
  
  -- -----------------------------------------------------
-- Table `Oficina2`.`pre_cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_oficina`.`pre_cadastro` (
  `id` INT PRIMARY KEY NOT NULL,
  `nome` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  `tel` VARCHAR(45) NULL
  );

-- -----------------------------------------------------
-- Table `oficina`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_oficina`.`agendamento` (
  `id` INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `data` VARCHAR(10) NOT NULL,
  `hora` VARCHAR(10) NULL,
  `pre_cadastro_id` INT NOT NULL,    
  CONSTRAINT `fk_pre_cadastro1` FOREIGN KEY (`pre_cadastro_id`) REFERENCES `db_oficina`.`pre_cadastro` (`id`)
   );


