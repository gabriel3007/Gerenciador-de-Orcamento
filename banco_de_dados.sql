CREATE TABLE usuarios (id INTEGER AUTO_INCREMENT PRIMARY KEY,
     email VARCHAR(255), nome VARCHAR(255), senha varchar(255));

CREATE TABLE orcamento (id INTEGER AUTO_INCREMENT PRIMARY KEY,
     valor decimal(10, 2), tipo varchar(255), descricao text, data date);

ALTER TABLE orcamento ADD COLUMN usuario_id INTEGER;