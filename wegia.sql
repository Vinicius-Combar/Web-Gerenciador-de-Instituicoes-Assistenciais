create database wegia default charset utf8;

use wegia;

create table funcionario(
	id_funcionario int not null primary key, # cpf do funcionario 
	
    image mediumtext,
    nome varchar(100),
    telefone int,
    vtp int,
    dt_adm date not null,
    dt_nasc date not null,
    idade int not null,
    rg int not null, 
    orgao_emissor varchar(20) not null,
    data_expedicao date,
    cpf_funcionario int not null,
	pis int,
    ctps int not null,
    uf_ctps varchar(2),
    zona int not null,
    cert_reser_num int,
	cert_reser_serie varchar(1),
    cep int not null,
    cidade varchar(40) not null,
    bairro varchar(40) not null,
    ibge int,
    rua varchar(40) not null,
    numero_endereco int,
    complemento varchar(100),
    nome_mae varchar(100),
    nome_pai varchar(100)
	
)engine = InnoDB;

create table cargo(
	id_cargo int not null primary key,
    
    nome varchar(30)
    
)engine = InnoDB;

insert into cargo(id_cargo,nome)
values
(01,'Agente Administrativo'),
(02,'Assistente Social'),
(03,'Auxiliar Administrativo'),
(04,'Auxiliar de Enfermagem'),
(05,'Cozinheiro(a)'),
(06,'Cuidador(a)'),
(07,'Enfermeira Chefe'),
(08,'Enfermeiro(a)'),
(09,'Fisioterapeuta'),
(10,'Motorista'),
(11,'Nutricionista'),
(12,'Pedreiro'),
(13,'Psicólogo(a)'),
(14,'Recreador(a)'),
(15,'Recepcionista'),
(16,'Serviços Gerais'),
(17,'Técnico de Enfermagem'),
(18,'Técnico de Informática');

create table funcionario_cargo(
	id_cargo int not null,
	id_funcionario int not null,
    
    primary key(id_cargo,id_funcionario),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_funcionario) references funcionario(id_funcionario)
)engine = InnoDB;

create table usuario(
	id_usuario int not null primary key, # cpf do funcionario 
    
    login varchar(100),
    senha varchar(200),
    
    foreign key(id_usuario) references funcionario(id_funcionario) 

)engine = InnoDB;

create table funcionalidade(
	id_funcionalidade int not null primary key,
	
    descricao varchar(100)
)engine = InnoDB;

insert into funcionalidade(id_funcionalidade,descricao)
values
(01,'alimentos'),
(02,'estoque');

create table cargo_funcionalidade(
	id_cargo int not null,
    id_funcionalidade int not null,
    
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_funcionalidade) references funcionalidade(id_funcionalidade)
)engine = InnoDB;

insert into cargo_funcionalidade(id_cargo,id_funcionalidade)
values
(05,01);

select user();