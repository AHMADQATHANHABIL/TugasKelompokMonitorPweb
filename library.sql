CREATE DATABASE library;

USE library;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    publisher VARCHAR(255),
    year INT,
    description TEXT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES ('Fiction'), ('Non-fiction');

INSERT INTO books (title, author, publisher, year, description, category_id) VALUES
('Book Title1', 'Author Name1', 'Publisher Name', 2020, 'Description', 1),
('Book Title2', 'Author Name2', 'Publisher Name', 2019, 'Description', 2);
