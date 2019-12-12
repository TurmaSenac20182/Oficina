-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Oficina2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Oficina2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Oficina2` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema oficina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema oficina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `oficina` DEFAULT CHARACTER SET latin1 ;
USE `Oficina2` ;

-- -----------------------------------------------------
-- Table `Oficina2`.`Contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`Contato` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`Contato` (
  `idContato` INT NOT NULL AUTO_INCREMENT,
  `celular` VARCHAR(11) NOT NULL,
  `residencial` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idContato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`endereco` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`endereco` (
  `idendereco` INT NOT NULL AUTO_INCREMENT,
  `tipoLogradouro` VARCHAR(4) NULL,
  `logradouro` VARCHAR(100) NULL,
  `numero` INT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `bairro` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NULL,
  `uf` VARCHAR(2) NULL,
  `complemento` VARCHAR(100) NULL,
  PRIMARY KEY (`idendereco`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`carro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`carro` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`carro` (
  `idcarro` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(30) NOT NULL,
  `modelo` VARCHAR(30) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `anoCarro` VARCHAR(4) NOT NULL,
  PRIMARY KEY (`idcarro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`servico` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`servico` (
  `idservico` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `valor` VARCHAR(45) NULL,
  PRIMARY KEY (`idservico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`ordemServico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`ordemServico` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`ordemServico` (
  `idordemServico` INT NOT NULL AUTO_INCREMENT,
  `cliente_ordemServico_idordemServico` INT NOT NULL,
  `cliente_carro_idcarro` INT NOT NULL,
  `servico_idservico` INT NOT NULL,
  `funcionario` VARCHAR(45) NOT NULL,
  `dataEntrada` VARCHAR(45) NOT NULL,
  `dataSaida` VARCHAR(45) NOT NULL,
  `maoDeObra` DOUBLE NULL,
  `valorTotal` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idordemServico`, `cliente_ordemServico_idordemServico`, `cliente_carro_idcarro`, `servico_idservico`),
  INDEX `fk_ordemServico_servico1_idx` (`servico_idservico` ASC) VISIBLE,
  INDEX `fk_ordemServico_cliente1_idx` (`cliente_carro_idcarro` ASC, `cliente_ordemServico_idordemServico` ASC) VISIBLE,
  CONSTRAINT `fk_ordemServico_servico1`
    FOREIGN KEY (`servico_idservico`)
    REFERENCES `Oficina2`.`servico` (`idservico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ordemServico_cliente1`
    FOREIGN KEY (`cliente_carro_idcarro` , `cliente_ordemServico_idordemServico`)
    REFERENCES `Oficina2`.`cliente` (`carro_idcarro` , `ordemServico_idordemServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`cliente` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `rg` VARCHAR(9) NOT NULL,
  `Contato_idContato` INT NOT NULL,
  `idEndereco` INT NOT NULL,
  `carro_idcarro` INT NOT NULL,
  `ordemServico_idordemServico` INT NOT NULL,
  PRIMARY KEY (`idcliente`, `Contato_idContato`, `idEndereco`, `carro_idcarro`, `ordemServico_idordemServico`),
  INDEX `fk_cliente_Contato_idx` (`Contato_idContato` ASC) VISIBLE,
  INDEX `fk_cliente_endereco1_idx` (`idEndereco` ASC) VISIBLE,
  INDEX `fk_cliente_carro1_idx` (`carro_idcarro` ASC) VISIBLE,
  INDEX `fk_cliente_ordemServico1_idx` (`ordemServico_idordemServico` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_Contato`
    FOREIGN KEY (`Contato_idContato`)
    REFERENCES `Oficina2`.`Contato` (`idContato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_endereco1`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `Oficina2`.`endereco` (`idendereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_carro1`
    FOREIGN KEY (`carro_idcarro`)
    REFERENCES `Oficina2`.`carro` (`idcarro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_ordemServico1`
    FOREIGN KEY (`ordemServico_idordemServico`)
    REFERENCES `Oficina2`.`ordemServico` (`idordemServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Oficina2`.`pre_cadastro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Oficina2`.`pre_cadastro` ;

CREATE TABLE IF NOT EXISTS `Oficina2`.`pre_cadastro` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  `tel` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

USE `oficina` ;

-- -----------------------------------------------------
-- Table `oficina`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`contato` ;

CREATE TABLE IF NOT EXISTS `oficina`.`contato` (
  `idContato` INT(11) NOT NULL AUTO_INCREMENT,
  `tel` VARCHAR(12) NULL DEFAULT NULL,
  `cel` VARCHAR(13) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idContato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`endereco` ;

CREATE TABLE IF NOT EXISTS `oficina`.`endereco` (
  `idEndereco` INT(11) NOT NULL AUTO_INCREMENT,
  `logradouro` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `cep` VARCHAR(9) NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `cidade` VARCHAR(50) NOT NULL,
  `uf` VARCHAR(4) NOT NULL,
  `complemento` VARCHAR(100) NULL,
  PRIMARY KEY (`idEndereco`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`cliente` ;

CREATE TABLE IF NOT EXISTS `oficina`.`cliente` (
  `idCliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `rg` VARCHAR(12) NULL DEFAULT NULL,
  `contato_cliente` INT(11) NOT NULL,
  `endereco_cliente` INT(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `FK_contato_cliente` (`contato_cliente` ASC) VISIBLE,
  INDEX `FK_endereco_cliente` (`endereco_cliente` ASC) VISIBLE,
  CONSTRAINT `FK_contato_cliente`
    FOREIGN KEY (`contato_cliente`)
    REFERENCES `oficina`.`contato` (`idContato`),
  CONSTRAINT `FK_endereco_cliente`
    FOREIGN KEY (`endereco_cliente`)
    REFERENCES `oficina`.`endereco` (`idEndereco`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`dadocarro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`dadocarro` ;

CREATE TABLE IF NOT EXISTS `oficina`.`dadocarro` (
  `idCarro` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(30) NOT NULL,
  `modelo` VARCHAR(30) NOT NULL,
  `cor` VARCHAR(30) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `anoCarro` VARCHAR(4) NOT NULL,
  `FK_Cliente` INT(11) NOT NULL,
  PRIMARY KEY (`idCarro`),
  INDEX `FK_Cliente` (`FK_Cliente` ASC) VISIBLE,
  CONSTRAINT `dadocarro_ibfk_1`
    FOREIGN KEY (`FK_Cliente`)
    REFERENCES `oficina`.`cliente` (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`agendamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`agendamento` ;

CREATE TABLE IF NOT EXISTS `oficina`.`agendamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `data` VARCHAR(10) NOT NULL,
  `agendamentocol` VARCHAR(45) NULL,
  `pre_cadastro_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agendamento_pre_cadastro1_idx` (`pre_cadastro_id` ASC) VISIBLE,
  CONSTRAINT `fk_agendamento_pre_cadastro1`
    FOREIGN KEY (`pre_cadastro_id`)
    REFERENCES `Oficina2`.`pre_cadastro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`ordemservico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`ordemservico` ;

CREATE TABLE IF NOT EXISTS `oficina`.`ordemservico` (
  `idordemServico` INT(11) NOT NULL AUTO_INCREMENT,
  `funcionario` VARCHAR(100) NOT NULL,
  `dataEntrada` DATE NOT NULL,
  `dataSaida` VARCHAR(10) NULL,
  `valorTotal` DOUBLE NULL,
  `cliente_idCliente` INT(11) NOT NULL,
  `finalizada` TINYINT NULL,
  PRIMARY KEY (`idordemServico`),
  INDEX `fk_ordemservico_cliente1_idx` (`cliente_idCliente` ASC) VISIBLE,
  CONSTRAINT `fk_ordemservico_cliente1`
    FOREIGN KEY (`cliente_idCliente`)
    REFERENCES `oficina`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`servico` ;

CREATE TABLE IF NOT EXISTS `oficina`.`servico` (
  `idServico` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `maoDeObra` VARCHAR(150) NULL DEFAULT NULL,
  `valor` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`idServico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `oficina`.`servico_has_ordemservico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oficina`.`servico_has_ordemservico` ;

CREATE TABLE IF NOT EXISTS `oficina`.`servico_has_ordemservico` (
  `servico_idServico` INT(11) NOT NULL,
  `ordemservico_idordemServico` INT(11) NOT NULL,
  PRIMARY KEY (`servico_idServico`, `ordemservico_idordemServico`),
  INDEX `fk_servico_has_ordemservico_ordemservico1_idx` (`ordemservico_idordemServico` ASC) VISIBLE,
  INDEX `fk_servico_has_ordemservico_servico1_idx` (`servico_idServico` ASC) VISIBLE,
  CONSTRAINT `fk_servico_has_ordemservico_servico1`
    FOREIGN KEY (`servico_idServico`)
    REFERENCES `oficina`.`servico` (`idServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_has_ordemservico_ordemservico1`
    FOREIGN KEY (`ordemservico_idordemServico`)
    REFERENCES `oficina`.`ordemservico` (`idordemServico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
