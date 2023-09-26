CREATE DATABASE marmita;

USE marmita;

CREATE TABLE funcionario (
    nome VARCHAR(100) UNIQUE,
    mat BIGINT PRIMARY KEY,
    quant_quent INT NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE TABLE alunos (

    feedback VARCHAR(500),
    matricula BIGINT PRIMARY KEY,
    nome VARCHAR(100) UNIQUE,
    senha VARCHAR(50) NOT NULL

);
CREATE TABLE quent_dias(
    segunda CHAR(3),
    terca CHAR(3),
    quarta CHAR(3),
    quinta CHAR(3),
    sexta CHAR(3),
    matricula BIGINT,
    Foreign Key (matricula) REFERENCES alunos(matricula)
)
CREATE TABLE faltas (
    nome varchar(100),
    matricula BIGINT,
    falta_aluno BIGINT,
    dia_falta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    caminho VARCHAR(500),
    just_escrita VARCHAR(500),
    FOREIGN KEY (matricula) REFERENCES alunos(matricula)
);
CREATE TABLE extras(
    nome VARCHAR(100),
    mat BIGINT PRIMARY KEY,
    dia VARCHAR(10)
)