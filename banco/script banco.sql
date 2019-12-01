drop database if exists oficina;
create database oficina;
use oficina;
  
create table dadoCarro (
  idCarro  int  not null primary key auto_increment,
  marca varchar(30) not null,
  modelo varchar(30) not null,
  cor varchar(30)not null,
  placa varchar(10) not null,
  anoCarro varchar(4) not null  	
);

create table contato(
  idContato int  not null primary key auto_increment,
  tel1 varchar(10) not null,
  tel2 varchar(11) null,
  email varchar(100) null
);

create table servico(
  idServico int  not null primary key auto_increment,
  descricao varchar(100) not null,
  valor  	double null  
);

create table endereco (
  idEndereco int  not null primary key auto_increment,
  logradouro varchar(100) null,
  numero varchar(10)  null,
  cep    varchar(8) not null,
  bairro varchar(50)  null,
  cidade varchar(50)  null,
  uf varchar(4) not null, 
  complemnto varchar(100)
);

create table cliente (
  idCliente int  not null primary key auto_increment,
  nome varchar(100) not null,
  cpf varchar(11)  not null,
  rg varchar(9)  null,
  carro_cliente int not null, 
  contato_cliente int not null,
  endereco_cliente int not null,
  /*ordemServico_cliente int not null,*/
  
  constraint FK_carro_cliente foreign key(carro_cliente) references dadoCarro(idCarro), 
  constraint FK_contato_cliente foreign key(contato_cliente) references contato(idContato), 
  constraint FK_endereco_cleinte foreign key(endereco_cliente) references endereco(idEndereco)

);

create table ordemServico (
  idordemServico int  not null primary key auto_increment,
  cliente_ordemServ int not null,
  carro_ordemServ int not null,
  servico_ordemServ int not null,
  funcionario varchar(100) not null,
  dataEntrada date,
  dataSaida date, 
  maoDeObra double null,
  valorTotal double not null,
  
  constraint FK_cliente_ordemServ foreign key(cliente_ordemServ) references cliente(idCliente),
  constraint FK_carro_ordemServ foreign key(carro_ordemServ) references dadoCarro(idCarro),
  constraint FK_servico_ordemServ foreign key(servico_ordemServ) references servico(idServico)  
  );
  
  /* comando de chava estrangeira da tabela cliente vinda de ordme de serviço
  ALTER TABLE cliente ADD CONSTRAINT FK_ordemServico_cliente FOREIGN KEY(ordemServico_cliente) REFERENCES ordemServico(idordemServico) ON DELETE CASCADE;*/
