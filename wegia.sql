create schema wegia default charset utf8;

use wegia;

#Função do funcionário na Instituição
create table funcao(
	id_funcao int not null primary key auto_increment,
    
    funcao varchar(30)

)engine = InnoDB;

insert into funcao(funcao)
values
('Agente Administrativo'),
('Assistente Social'),
('Auxiliar Administrativo'),
('Auxiliar de Enfermagem'),
('Cozinheiro(a)'),
('Cuidador(a)'),
('Enfermeira Chefe'),
('Enfermeiro(a)'),
('Fisioterapeuta'),
('Motorista'),
('Nutricionista'),
('Pedreiro'),
('Psicólogo(a)'),
('Recreador(a)'),
('Recepcionista'),
('Serviços Gerais'),
('Técnico de Enfermagem'),
('Técnico de Informática');

#setor de trabalho na instituição
create table setor(
	id_setor int not null primary key auto_increment,
    
    setor varchar(30)

)engine = InnoDB;

insert into setor(setor)
values
('Administração'),
('Equipe Técnica'),
('Enfermagem'),
('Fisoterapia'),
('Lavanderia'),
('Limpeza'),
('Manutenção'),
('Nutrição');

#estado civil do funcionario
create table estado_civil(
	id_estado_civil int not null primary key auto_increment,
    
    estado_civil varchar(30)

)engine = InnoDB;

insert into estado_civil(estado_civil)
values
('Casado(a)'),
('Divorciado(a)'),
('Separado(a)'),
('Solteiro(a)'),
('Viúvo(a)');

#nível de instrução (formação)
create table instrucao(
	id_instrucao int not null primary key auto_increment,
    
    grau_de_instrucao varchar(30)

)engine = InnoDB;

insert into instrucao(grau_de_instrucao)
values
('Analfabeto'),
('Ensino fundamental incompleto'),
('Ensino fundamental completo'),
('Ensino médio incompleto'),
('Ensino médio completo'),
('Superior completo'),
('Pós-Graduação'),
('Mestrado'),
('Doutorado'),
('Pós-Doutorado');

#situação do trabalhado
create table situacao_funcionario(
	id_situacao int not null primary key auto_increment,
    
    situacao varchar(15)

)engine = InnoDB;

insert into situacao_funcionario(situacao)
values
('Ativo'),
('INSS'),
('Demitido');

#Ficha do alocado com todas as informações que temos
create table ficha_interno(
	id_ficha_interno int not null primary key,
	nome varchar(50) not null,
    sexo varchar(10) not null,
    data_nasc date not null,
    local_nasc varchar(40) not null,
    pai varchar(50),
    mae varchar(50),
    internacao date not null,
    saida date,
    readmitido date,
    orbito date
    

)engine = InnoDB;

#Informação da pessoa para qual a instituição deve ligar em urgência
create table contato_urgencia(
	id_cotanto int not null primary key,
    id_ficha_interno int not null,
    
	nome varchar(50),
    telefone_prim int,
    telefone_sec int,
    telefone_terc int,
    
    foreign key (id_ficha_interno) references ficha_interno(id_ficha_interno)
)engine = InnoDB;

#tabela para todos os usuarios do software
create table usuario(
	id_usuario_cpf int not null primary key,
    
    senha varchar(300)
	
) engine = InnoDB;

# Tabela com as informação básicas dos alocados da instituição
create table interno(
	id_interno int not null primary key auto_increment,    
    id_usuario_cpf int not null,
    id_ficha_interno int not null,
    
    nome varchar(50) not null,
    cpf int not null,
    tipo_documento varchar(30),
    orgao_expeditor varchar(20),
    uf varchar (2),
    identidade int not null,
    data_expedicao date,
    uf_nasc varchar(2),
    interncao date not null,
    cartao_sus int not null,
    
	foreign key (id_usuario_cpf) references usuario(id_usuario_cpf),
    foreign key (id_ficha_interno) references ficha_interno(id_ficha_interno)

)engine = InnoDB;

# tabela para o cadastro da instituicao no sistema
create table funcionario(
	id_funcionario int not null primary key,
    id_funcao int not null,
    id_setor int not null,
    id_estado_civil int not null,
    id_situacao int not null,
    id_instrucao int not null,
    id_usuario_cpf int not null,
    
    image varchar(2000),
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
    nome_pai varchar(100),
    
    foreign key (id_funcao) references funcao(id_funcao),
    foreign key (id_situacao) references situacao_funcionario(id_situacao),
    foreign key (id_setor) references setor(id_setor),
    foreign key (id_estado_civil) references estado_civil(id_estado_civil),
    foreign key (id_instrucao) references instrucao(id_instrucao),
    foreign key (id_usuario_cpf) references usuario(id_usuario_cpf)
    
) engine = InnoDB;

# tabela para os socios contribuintes da instituicao
create table socio(
	id_socio int not null primary key auto_increment,
    id_usuario_cpf int not null,
    
	cpf int not null,
    nome varchar(60) not null,
    email varchar(255) not null,
    email_s varchar(255),
    telefone int not null,
    bairro varchar(50) not null,
    rua varchar(100) not null,
    numero int not null,
    complemento varchar(400),
    cidade varchar(200) not null,
    uf varchar(2) not null,
    cep int not null,
    nascimento date not null,
    valor decimal(10,2) not null,
    
    foreign key (id_usuario_cpf) references usuario(id_usuario_cpf)
    
) engine = InnoDB;