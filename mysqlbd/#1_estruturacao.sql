CREATE DATABASE dbHardestwares
	DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE  dbhardestwares;

CREATE TABLE tbDepartamento(
	CodDepartamento int auto_increment,
    Nome varchar(25) not null unique,
    
    primary key(CodDepartamento)
    
) default charset utf8;

CREATE TABLE tbFabricante(
	CodFabricante int auto_increment,
    Nome varchar(35) not null unique,
    
    primary key(CodFabricante)
    
) default charset utf8;

CREATE TABLE tbHardware(
	CodHardware int auto_increment,
    Nome varchar(130) not null,
    CodDepartamento int not null,
    CodFabricante int not null,
    Valor decimal(7,2),
    Especificacoes varchar(255) not null,
    QntEstoque int not null,
    Lancamento boolean not null,
    Imagem varchar(30) not null,
    
    primary key(CodHardware),

	constraint fkFabricante foreign key(CodFabricante) references tbFabricante(CodFabricante),
	constraint fkDepartamento foreign key(CodDepartamento) references tbDepartamento(CodDepartamento)
    
) default charset utf8;

CREATE TABLE tbEstado(
	IdUf tinyint primary key auto_increment,
    Sigla char(2) not null unique
) default charset utf8;

CREATE TABLE tbCidade(
	IdCidade smallint primary key auto_increment,
	Nome varchar(150) not null unique
) default charset utf8;

CREATE TABLE tbCidade_Estado(
    IdCidade smallint,
	IdUf tinyint,
    
    primary key (IdCidade, IdUf),
    foreign key (IdCidade) references tbCidade(IdCidade),
    foreign key (IdUf) references tbEstado(IdUf)
) default charset utf8;

CREATE TABLE tbEndereco(
	Cep char(9) primary key,
    Logradouro varchar(150) not null,
    IdCidade smallint,
    
    foreign key (IdCidade) references tbCidade(IdCidade)
) default charset utf8;

CREATE TABLE tbUsuario(
	CodUsuario int primary key auto_increment,
    Nome varchar(130) not null,
    Email varchar(75) not null unique,
    Senha char(60) not null,
	Privilegio boolean not null,
    NumEndereco mediumint not null,
    Cep char(9) not null,
    
    foreign key (Cep) references tbEndereco(Cep)
) default charset utf8;
