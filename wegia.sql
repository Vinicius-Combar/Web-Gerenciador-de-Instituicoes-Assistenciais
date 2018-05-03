create database wegia default charset utf8;

use wegia;

create table funcionario(
	id_funcionario int not null primary key, # cpf do funcionario 
	
    image mediumtext,
    nome varchar(100),
    telefone int,
    vale_transporte int,
    data_admissao date not null,
    data_nascimento date not null,
    registro_geral int not null, 
    orgao_emissor varchar(20) not null,
    data_expedicao date,
	pis int,
    ctps int not null,
    uf_ctps varchar(2),
    zona int not null,
    certificado_reservista_numero int,
	certificado_reservista_serie varchar(1),
    cep int not null,
    cidade varchar(40) not null,
    bairro varchar(40) not null,
    ibge int,
    rua varchar(40) not null,
    numero_endereco int,
    complemento varchar(100),
    nome_mae varchar(100),
    nome_pai varchar(100)
	
)engine = InnoDB;/* criação da tabela funcionario, irá armazenar todos os funcionarios e suas informações. A partir dela
há uma verificação nela antes de ser criado um usuário, só pode haver um usuário de um funcionário se este estiver 
cadastrado na tabela funcionários. Será pedido o CPF na hora do cadastro de uma conta, esse CPF será procurado na tabela
funcionários, se este existir ele reconhecerá que a conta a ser criada pertence ao funcionário com CPF correspondente.
Se não for encontrado esse CPF na tabela funcionário, não poderá ser criada a conta */

create table cargo(
	id_cargo int not null primary key,
    
    nome varchar(30)
    
)engine = InnoDB; /* O cargo que o usuário tiver definirá a quais tabelas ele terá acesso e quais não, se é possível 
modificá-la ou apenas fazer uma consulta nela. */

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
(18,'Técnico de Informática'); /* cargos existentes na tabela CARGO */

create table funcionario_cargo(
	id_cargo int not null,
	id_funcionario int not null,
    
    primary key(id_cargo,id_funcionario),
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_funcionario) references funcionario(id_funcionario)
)engine = InnoDB; /* Definirá quais os cargos o funcionário terá. */

create table usuario(
	id_usuario int not null primary key, # cpf do funcionario 
    
    login varchar(100),
    senha varchar(200),
    
    foreign key(id_usuario) references funcionario(id_funcionario) 

)engine = InnoDB; /* tabela que criará a conta que será utilizada pelo usuário */

create table permissao(
	id_permissao int not null primary key,
	
    descricao varchar(100)
)engine = InnoDB; /* tabela que tem uma ligação de muitos para muitos com o cargo. Ela diz as tabelas que poderão ser 
 acessadas pelos cargos */

insert into permissao(id_permissao,descricao)
values
(01,'alimentos'),
(02,'estoque'); /* tabelas que serão acessadas */

create table cargo_permissao(
	id_cargo int not null,
    id_permissao int not null,
    
    foreign key(id_cargo) references cargo(id_cargo),
    foreign key(id_permissao) references permissao(id_permissao)
)engine = InnoDB; # tabela que vai definir qual cargo acessa qual tabela

insert into cargo_permissao(id_cargo,id_permissao)
values
(05,01),
(05,02);

#select user();

create table categoria(
	id_categoria int not null primary key,
    descricao varchar(50)
)engine = InnoDB;

create table produto(
	id_produto int not null primary key,
    id_categoria int not null,
    descricao varchar(50),

    foreign key(id_categoria) references categoria(id_categoria)
)engine = InnoDB; # vai dizer quais produtos existem na instituição. Ex: arroz, feijão, camisa masculina, casaco, roteador...

create table estoque(
	id_estoque int not null primary key,
    id_produto int not null,
    qtd float,
    
    foreign key(id_produto) references produto(id_produto)
)engine = InnoDB;

create table entrada(
	id_entrada int not null primary key,
    id_funcionario int not null,
    data_entrada date,
    total float,
    
    foreign key(id_funcionario) references funcionario(id_funcionario)
    
)engine = InnoDB;

create table item_entrada(
	id_item_entrada int not null primary key,
    id_entrada int not null,
    id_produto int not null,
    qtd float,
    valor_unitario float,
    
    foreign key(id_entrada) references entrada(id_entrada),
    foreign key(id_produto) references produto(id_produto)
)engine = InnoDB;

create table saida(
	id_saida int not null primary key,
    id_funcionario int not null,
    data_saida date,
    total float,
    
    foreign key(id_funcionario) references funcionario(id_funcionario)
    

)engine = InnoDB;

create table item_saida(
	id_item_saida int not null primary key,
    id_saida int not null,
    id_produto int not null,
    qtd float,
    valor_unitario float,
    
    foreign key(id_saida) references saida(id_saida),
    foreign key(id_produto) references produto(id_produto)

)engine = InnoDB;

/*create table destino(
	
)engine = InnoDB;*/

create table socio(
	id_socio int not null primary key,
    nome varchar(100) not null,
    cpf varchar(14) not null,
	email varchar(80) not null,
    email_secundário varchar(80),
    telefone varchar(13) not null,
    cep varchar(9) not null,
    estado varchar(2),
    cidade varchar(30),
    bairro varchar(40),
    rua varchar(40),
    complemento varchar(100),
    data_nascimento date,
    valor decimal(10,2) not null
)engine = InnoDB;

/*create table log(
);*/