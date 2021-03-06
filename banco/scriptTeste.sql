drop database if exists oficina;
create database oficina;
use oficina;

create table servico(
    idServico int not null primary key auto_increment,
    descricao text not null,
    maoDeObra varchar(150) null,
    valor decimal null
);

create table endereco (
    idEndereco int  not null primary key auto_increment,
    logradouro varchar(100) null,
    numero varchar(10)  null,
    cep varchar(9) not null,
    bairro varchar(50)  null,
    cidade varchar(50)  null,
    uf varchar(4) not null, 
    complemento varchar(100)
);

create table contato(
    idContato int  not null primary key auto_increment,
    tel varchar(12) null,
    cel varchar(13) not null,
    email varchar(100) null
);

create table cliente (
    idCliente int  not null primary key auto_increment,
    nome varchar(100) not null,
    cpf varchar(14) not null,
    rg varchar(12)  null,
    contato_cliente int not null,
    endereco_cliente int not null,

    constraint FK_contato_cliente foreign key(contato_cliente) references contato(idContato),
    constraint FK_endereco_cliente foreign key(endereco_cliente) references endereco(idEndereco)
);

create table dadoCarro (
    idCarro  int  not null primary key auto_increment,
    marca varchar(30) not null,
    modelo varchar(30) not null,
    cor varchar(30)not null,
    placa varchar(10) not null,
    anoCarro varchar(4) not null,
    FK_Cliente int not null,

    foreign key (FK_Cliente) references cliente(idCliente)
);

create table funcionario (
    idFuncionario int not null primary key auto_increment,
    nomeFuncionario varchar (100) not null,
    usuario varchar (50) not null,
    senha varchar (255) not null
);

create table ordemServico (
    idordemServico int  not null primary key auto_increment,
    funcionario varchar(100) not null,
    dataEntrada date not null,
    dataSaida varchar(10) not null, 
    valorTotal double not null,
    finalizada tinyint default false,
    cliente_ordemServ int not null,
    Fk_Funcionario int not null,

    constraint FK_cliente_ordemServ foreign key(cliente_ordemServ) references cliente(idCliente),
    foreign key (Fk_Funcionario) references funcionario(idFuncionario)
);
  
create table servico_has_ordemservico (
    Fk_Servico int not null,
    Fk_OrdemServico int not null,

    foreign key (Fk_Servico) references servico(idServico),
    foreign key (Fk_OrdemServico) references ordemServico(idordemServico)
); 

create table agendamento (
    idAgendamento int primary key not null auto_increment,
    tituloAgendamento varchar (150) not null,
    data varchar(10) not null,
    hora varchar(10) null
);

create table agendamento_has_cliente (
    Fk_Cliente_2 int not null,
    Fk_Agendamento int not null,

    foreign key (Fk_Cliente_2) references cliente(idCliente),
    foreign key (Fk_Agendamento) references agendamento(idAgendamento)
); 

create table preCadastro (
    idPrecadastro int primary key not null,
    nome varchar(45) null,
    marca varchar(45) null,
    modelo varchar(45) null,
    tel varchar(45) null,
    Fk_Agendamento_2 int not null,

    foreign key (Fk_Agendamento_2) references agendamento(idAgendamento)
);



  