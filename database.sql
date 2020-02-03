DROP DATABASE IF EXISTS gatosderua;

CREATE DATABASE gatosderua CHARACTER SET utf8 COLLATE utf8_general_ci;

USE gatosderua;

CREATE TABLE contatos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    nome VARCHAR(255),
    email VARCHAR(255),
    assunto VARCHAR(255),
    mensagem TEXT,
    campo1 TEXT COMMENT 'Para uso futuro.',
    campo2 TEXT COMMENT 'Para uso futuro.',
    status ENUM('recebido', 'lido', 'respondido', 'apagado') DEFAULT 'recebido'
);