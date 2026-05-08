CREATE DATABASE library;
USE library;

CREATE TABLE members (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(100),
    email VARCHAR(100),
    type  VARCHAR(20)   -- 'student' or 'professor'
);

CREATE TABLE books (
    id     INT AUTO_INCREMENT PRIMARY KEY,
    title  VARCHAR(200),
    author VARCHAR(100),
    isbn   VARCHAR(50),
    status VARCHAR(20) DEFAULT 'available'  -- 'available', 'borrowed', 'lost', 'repair'
);

CREATE TABLE loans (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    member_id   INT,
    Foreign Key (member_id) REFERENCES members(id),
    book_id     INT,
    Foreign Key (book_id) REFERENCES books(id),
    due_date    DATE,
    returned_at DATETIME DEFAULT NULL
);

-- Sample data
INSERT INTO members (name, email, type) VALUES
    ('Mohamed', 'mohamed@mail.com', 'student'),
    ('Sara',    'sara@mail.com',    'professor');

INSERT INTO books (title, author, isbn) VALUES
    ('Le Petit Prince', 'Saint-Exupery', '978-1'),
    ('L Etranger',      'Albert Camus',  '978-2'),
    ('Germinal',        'Emile Zola',    '978-3');