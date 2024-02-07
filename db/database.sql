DROP TABLE IF EXISTS invites;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS cards;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS boards;

CREATE TABLE users (
    id_user INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_user)
);


CREATE TABLE boards (
    id_board INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_board)
);


CREATE TABLE invites (
    id_invite INT(11) NOT NULL AUTO_INCREMENT,
    status VARCHAR(255) NOT NULL, /*accepted, dennied, pending*/
    id_user INT(11) NOT NULL,
    id_board INT(11) NOT NULL,
    FOREIGN KEY(id_user) REFERENCES users(id_user),
    FOREIGN KEY(id_board) REFERENCES boards(id_board),
    PRIMARY KEY(id_invite)
);


CREATE TABLE categories (
    id_category INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    id_board INT(11),
    FOREIGN KEY(id_board) REFERENCES boards(id_board),
    PRIMARY KEY(id_category)
);


CREATE TABLE cards (
    id_card INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content VARCHAR(255),
    priority VARCHAR(255) NOT NULL,    
    id_category INT(11) NOT NULL,
    FOREIGN KEY(id_category) REFERENCES categories(id_category),
    PRIMARY KEY(id_card)
)