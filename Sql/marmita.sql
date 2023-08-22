CREATE DATABASE marmita;

USE marmita;

CREATE TABLE funcionario (
    falta_aluno BIGINT,
    nome VARCHAR(100) UNIQUE,
    mat BIGINT PRIMARY KEY,
    quant_quent INT NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE TABLE alunos (
    segunda CHAR(3),
    terca CHAR(3),
    quarta CHAR(3),
    quinta CHAR(3),
    sexta CHAR(3),
    feedback VARCHAR(500),
    caminho VARCHAR(500),
    matricula BIGINT PRIMARY KEY,
    nome VARCHAR(100) UNIQUE,
    senha VARCHAR(50) NOT NULL
);