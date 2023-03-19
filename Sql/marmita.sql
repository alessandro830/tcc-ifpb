create schema marmita;
    create table funcionario(
	  falta_aluno bigint,
    nome varchar(100) unique,
    matricula bigint primary key,
    quant_quent int not null
);

create table alunos(
    segunda char(3),
    terça char(3),
    quarta char(3),
    quinta char(3),
    sexta char(3),
    feedback varchar(500),
    just_falt varchar(500),
    matricula bigint primary key,
    nome varchar(100) unique,
    senha varchar(50)
    );
 
