DROP DATABASE IF EXISTS m07uf3;
CREATE DATABASE m07uf3;
USE m07uf3;

CREATE TABLE estadistiques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modalitat VARCHAR(25) NOT NULL,
    nivell VARCHAR(100) NOT NULL,
    data_partida DATETIME DEFAULT CURRENT_TIMESTAMP,
    intents INT NOT NULL
);

insert into estadistiques(modalitat, nivell, intents) values("usuario", "facil", 5);