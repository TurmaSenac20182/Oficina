
CREATE DATABASE oficina;
USE `oficina` ;
-- -----------------------------------------------------
-- Table `oficina`.`funcionario`
-- -----------------------------------------------------
 CREATE TABLE IF NOT EXISTS `oficina`.`funcionario` (
  `idFuncionario` INT  PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(255) NOT NULL  
  );
-- -----------------------------------------------------
-- Table `oficina`.`contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`contato` (
  `idContato` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tel` VARCHAR(12) NULL DEFAULT NULL,
  `cel` VARCHAR(13) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL
   );
-- -----------------------------------------------------
-- Table `Oficina2`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`endereco` (
  `idEndereco` INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,  
  `logradouro` VARCHAR(100) NULL,
  `numero` INT NULL,
  `cep` VARCHAR(9)  NULL,
  `bairro` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NULL,
  `uf` VARCHAR(2) NULL,
  `complemento` VARCHAR(100) NULL
   );
-- -----------------------------------------------------
-- Table `Oficina2`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`servico` (
  `idservico` INT  PRIMARY KEY AUTO_INCREMENT NOT NULL ,
  `nomeServico` VARCHAR(45) NOT NULL,
  `valor` double NULL
   );
-- -----------------------------------------------------
-- Table `Oficina2`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`cliente` (
  `idCliente` INT  PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `rg` VARCHAR(9) NOT NULL,
  `contato_idContato` INT NOT NULL,
  `idEndereco` INT NOT NULL,        
  CONSTRAINT `fk_cliente_Contato` FOREIGN KEY (`contato_idContato`)  REFERENCES `oficina`.`Contato` (`idContato`),   
  CONSTRAINT `fk_cliente_endereco`FOREIGN KEY (`idEndereco`)  REFERENCES `oficina`.`endereco` (`idEndereco`)
 
  );  
  -- -----------------------------------------------------
-- Table `Oficina2`.`carro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`dadocarro` (
  `idcarro` INT  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `marcaVeiculo` VARCHAR(30) NOT NULL,
  `modeloVeiculo` VARCHAR(30) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `anoCarro` VARCHAR(4) NOT NULL,
  `idCliente_carro` INT NOT NULL,
   CONSTRAINT `fk_carro_cliente` FOREIGN KEY (`idCliente_carro`) REFERENCES `oficina`.`cliente` (`idCliente`)
   );  
   -- -----------------------------------------------------
-- Table `Oficina2`.`ordemServico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`ordemServico` (
  `idordemServico` INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `idFuncionario` INT  NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida`   date NULL,
  `valorTotal` DOUBLE NULL, 
  `finalizado` tinyint default false,   
   CONSTRAINT `fk_idcliente`FOREIGN KEY (`idCliente`) REFERENCES `oficina`.`cliente` (`idCliente`),
   CONSTRAINT `fk_idfuncionario`FOREIGN KEY (`idFuncionario`) REFERENCES `oficina`.`funcionario` (`idFuncionario`)
  );  
  -- -----------------------------------------------------
-- Table `oficina`.`servico_has_ordemservico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`servico_e_ordemservico` (
  `servico_idServico` INT   NOT NULL,
  `ordemservico_idordemServico` INT   NOT NULL,   
  CONSTRAINT `fk_servico` FOREIGN KEY (`servico_idServico`) REFERENCES `oficina`.`servico` (`idServico`),
  CONSTRAINT `fk_ordemservico`FOREIGN KEY (`ordemservico_idordemServico`) REFERENCES `oficina`.`ordemservico` (`idordemServico`)
  );    
  -- -----------------------------------------------------
-- Table `Oficina2`.`pre_cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`pre_cadastro` (
  `idPreCadastro` INT PRIMARY KEY NOT NULL,
  `nomeCliente` VARCHAR(45) NULL,
  `marcaVeicolo` VARCHAR(45) NULL,
  `modeloVeiculo` VARCHAR(45) NULL,
  `tel` VARCHAR(45) NULL
  );
-- -----------------------------------------------------
-- Table `oficina`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`agendamento` (
  `idAgendamento` INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  `data` VARCHAR(10) NOT NULL,
  `hora` VARCHAR(10) NULL,
  `pre_cadastro_id` INT NOT NULL,    
  CONSTRAINT `fk_pre_cadastro` FOREIGN KEY (`pre_cadastro_id`) REFERENCES `oficina`.`pre_cadastro` (`idPreCadastro`)
   );   
   -- -----------------------------------------------------
-- Table `oficina`.`agendamento_has_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `oficina`.`agendamento_has_cliente` (
  `idAgendamento` INT NOT NULL,
  `idCliente` INT NOT NULL,  
  CONSTRAINT `fk_id_agendamento` FOREIGN KEY (`idAgendamento`) REFERENCES `oficina`.`agendamento` (`idAgendamento`), 
  CONSTRAINT `fk_id_cliente`   FOREIGN KEY (`idCliente`) REFERENCES `oficina`.`cliente` (`idCliente`)
);