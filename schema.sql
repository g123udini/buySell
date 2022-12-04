CREATE DATABASE buy_sell
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE buy_sell;

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    type VARCHAR(128) NOT NULL,
    UNIQUE INDEX UI_type (type),
    UNIQUE INDEX UI_name (name)
);

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(320) NOT NULL,
    password CHAR(64) NOT NULL,
    login VARCHAR(320) NOT NULL,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    avatar TEXT DEFAULT NULL,
    phone INT,
    telegram CHAR(64),
    UNIQUE INDEX UI_email (email),
    UNIQUE INDEX UI_login (login)
);

CREATE TABLE publication (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(320) NOT NULL,
    avatar TEXT DEFAULT NULL,
    price INT NOT NULL,
    type ENUM ('buy', 'sell'),
    description TEXT DEFAULT NULL,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    category_id INT NOT NULL,
    seller INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (seller) REFERENCES user (id)
);

CREATE TABLE comment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT
);

CREATE TABLE comment_publication (
    id INT AUTO_INCREMENT PRIMARY KEY,
    publication_id INT NOT NULL,
    comment_id INT NOT NULL,
    FOREIGN KEY (publication_id) REFERENCES publication(id),
    FOREIGN KEY (comment_id) REFERENCES comment(id)
);

CREATE TABLE auth (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    source VARCHAR(128) NOT NULL,
    source_id VARCHAR(128) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    publication_id INT NOT NULL,
    file VARCHAR(255),
    FOREIGN KEY (publication_id) REFERENCES publication(id)
);