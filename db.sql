-- SQL untuk membuat database dan tabel hasil kuis
CREATE DATABASE IF NOT EXISTS sosialrum;
USE sosialrum;

CREATE TABLE IF NOT EXISTS quiz_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nilai INT NOT NULL,
    misi INT NOT NULL,
    created_at DATETIME NOT NULL
);
