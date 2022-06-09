DROP DATABASE IF EXISTS taskforce;

CREATE DATABASE taskforce
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE tasks (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `category` INT NOT NULL, 
    `location` VARCHAR(255),
    `budget` INT UNSIGNED,
    `date_due` DATETIME NOT NULL,
    `customer_id` INT,
    `worker_id` INT,
    `date_creation` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` TINYINT DEFAULT 0,
    `file` VARCHAR(255)
);

CREATE TABLE users_profile (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `avatar` VARCHAR(255),
    `name` VARCHAR(255),
    `email` VARCHAR(255),
    `birthday` DATETIME,
    `phone` VARCHAR(255),
    `telegram` VARCHAR(255),
    `about` TEXT,
    `categories_id` INT
);

CREATE TABLE categories (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(255),
    `category_icon` VARCHAR(255)
);

CREATE TABLE users (
    `name` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `date_register` DATETIME,
    `response` TINYINT DEFAULT 0
);

CREATE TABLE users_statistics (
    `user_id` INT,
    `tasks_done` INT,
    `tasks_failed` INT,
    `raiting` FLOAT,
    `status_open` TINYINT DEFAULT 0
);

CREATE TABLE reviews (
    `user_id` INT,
    `task_name` VARCHAR(255) NOT NULL,
    `review_text` TEXT,
    `raiting` INT

)
