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

CREATE TABLE autor (
    id_autor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    thumbnail VARCHAR(255),
    nome VARCHAR(255),
    nometela VARCHAR(127),
    descricao TEXT,
    nascimento DATE,
    email VARCHAR(255),
    site VARCHAR(255),
    campo1 TEXT,
    campo2 TEXT,
    campo3 TEXT,
    status ENUM('inativo', 'ativo') DEFAULT 'ativo'
);

CREATE TABLE categoria (
    id_categoria INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255)
);

CREATE TABLE artigo (
    id_artigo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    thumbnail VARCHAR(255),
    titulo VARCHAR(255),
    resumo VARCHAR(255),
    texto LONGTEXT,
    autor_id INT,
    campo1 TEXT,
    campo2 TEXT,
    campo3 TEXT,
    status ENUM('inativo', 'ativo') DEFAULT 'ativo',
    FOREIGN KEY (autor_id) REFERENCES autor(id_autor)
);

CREATE TABLE art_cat (
    id_art_cat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    artigo_id INT,
    categoria_id INT,
    FOREIGN KEY (artigo_id) REFERENCES artigo (id_artigo),
    FOREIGN KEY (categoria_id) REFERENCES categoria (id_categoria)
);

-- Dados da tabela autor
INSERT INTO autor
    (thumbnail, nome, nometela, descricao, nascimento, email, site)
VALUES 
    (
        'https://picsum.photos/200', 'Joca da Silva', 'Joca',
        'Autor da série de livros, como programar PHP no cinema.'
        '1989-03-22', 'joca@silva.com', 'http://wwww.joca.com'    
    ),
    (
        'https://picsum.photos/200', 'Dilermano dos Santos', 'Dilermano',
        'Autor da série de livros, como programar PHP no cinema.'
        '1989-03-22', 'joca@silva.com', 'http://wwww.joca.com'    
    ),
    (
        'https://picsum.photos/200', 'Marineuza Soares', 'Marineuza',
        'Autor da série de livros, como programar PHP no cinema.'
        '1989-03-22', 'joca@silva.com', 'http://wwww.joca.com'    
    )
;