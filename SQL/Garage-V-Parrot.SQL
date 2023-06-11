-- Création de la base de données
CREATE DATABASE `Garage-V-Parrot`;

-- Sélection de la base de données
USE `Garage-V-Parrot`;

-- Création de la table Users
CREATE TABLE `Users` (
  `user_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `user_firstname` VARCHAR(50) NOT NULL,
  `user_lastname` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(255) NOT NULL UNIQUE,
  `user_rights` VARCHAR(10) NOT NULL,
  `user_password` TEXT
);

-- Création de la table admins
CREATE TABLE `admins` (
  `admin_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `admin_info` INT,
  FOREIGN KEY (`admin_info`) REFERENCES `Users` (`user_id`)
);

-- Création de la table Comments
CREATE TABLE `Comments` (
  `comment_id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `comment_author_id` INT,
  `comment_date_post` DATE NOT NULL,
  `content` TEXT NOT NULL,
  `comment_validator` INT,
  `status` VARCHAR(10) NOT NULL,
  FOREIGN KEY (`comment_author_id`) REFERENCES `Users` (`user_id`),
  FOREIGN KEY (`comment_validator`) REFERENCES `admins` (`admin_id`)
);

-- Création de la table Cars
CREATE TABLE `Cars` (
  `car_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `car_admin_id` INT,
  `car_mark` VARCHAR(50) NOT NULL,
  `car_model` VARCHAR(50) NOT NULL,
  `car_km` FLOAT,
  `car_color` VARCHAR(25),
  `car_price` FLOAT,
  `car_info` TEXT,
  `car_picture` VARCHAR(255) NOT NULL UNIQUE,
  FOREIGN KEY (`car_admin_id`) REFERENCES `Users` (`user_id`)
);

-- Insertion des utilisateurs
INSERT INTO `Users` (`user_firstname`, `user_lastname`, `user_email`, `user_rights`, `user_password`)
VALUES ('John', 'Doe', 'john.doe@example.com', 'standard', 'password123'),
       ('Alice', 'Smith', 'alice.smith@example.com', 'standard', 'password123'),
       ('Bob', 'Johnson', 'bob.johnson@example.com', 'standard', 'password456'),
       ('Emily', 'Brown', 'emily.brown@example.com', 'employed', 'password789'),
       ('James', 'Wilson', 'james.wilson@example.com', 'employed', 'password987'),
       ('Sophia', 'Davis', 'sophia.davis@example.com', 'employed', 'password654'),
       ('Sophia', 'Davis', 'sophia.davis@example.com', 'employed', 'password654'),
       ('Vincent', 'Parrot', 'vincent.parrot@example.com', 'admin', 'adminpassword'),
       ('Pierre', 'Cinart', 'cinartpierre@gamil.com', 'admin', 'v-parrot59');


-- Insertion des utilisateurs avec droits 'admin' dans la table admins
INSERT INTO `admins` (`admin_info`)
SELECT `user_id` FROM `Users` WHERE `user_rights` = 'admin';

-- Insertion des utilisateurs avec droits 'employed' dans la table admins
INSERT INTO `admins` (`admin_info`)
SELECT `user_id` FROM `Users` WHERE `user_rights` = 'employed';
