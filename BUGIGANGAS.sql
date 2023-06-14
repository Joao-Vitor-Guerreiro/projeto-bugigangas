DROP DATABASE IF EXISTS bugigangas;

CREATE DATABASE IF NOT EXISTS bugigangas;

USE bugigangas;

CREATE TABLE locatario (
    cpfLoca CHAR(11) PRIMARY KEY NOT NULL,
    nomeLoca VARCHAR(80) NOT NULL,
    enderecoLoca VARCHAR(80)
);

CREATE TABLE item (
    idItem INT PRIMARY KEY AUTO_INCREMENT,
    nomeItem VARCHAR(80) NOT NULL,
    proprietarioItem VARCHAR(80)
);

CREATE TABLE emprestimos (
    idEmprestimos INT PRIMARY KEY AUTO_INCREMENT,
    nomeItem VARCHAR(80) NOT NULL,
    proprietarioItem VARCHAR(80),
    nomeLoca VARCHAR(80) NOT NULL,
    devolucao DATE NOT NULL
);


SELECT *
FROM emprestimos
WHERE devolucao < CURDATE();

SELECT *
FROM item;




