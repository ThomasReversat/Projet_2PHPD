SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BDD2PHPD
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS BDD2PHPD ;

-- -----------------------------------------------------
-- Schema BDD2PHPD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS BDD2PHPD DEFAULT CHARACTER SET utf8 ;
USE BDD2PHPD ;

-- -----------------------------------------------------
-- Table FILM
-- -----------------------------------------------------
DROP TABLE IF EXISTS FILM ;

CREATE TABLE IF NOT EXISTS FILM (
                                             id_film INT NOT NULL AUTO_INCREMENT,
                                             titre VARCHAR(100) NOT NULL,
                                             description VARCHAR(1000) NOT NULL,
                                             image VARCHAR(100) NOT NULL,
                                             PRIMARY KEY (id_film),
                                             UNIQUE INDEX id_film_UNIQUE (id_film ASC) VISIBLE)





-- -----------------------------------------------------
-- Table ACTEUR
-- -----------------------------------------------------
DROP TABLE IF EXISTS ACTEUR ;

CREATE TABLE IF NOT EXISTS ACTEUR (
                                               id_acteur INT NOT NULL AUTO_INCREMENT,
                                               nom VARCHAR(45) NOT NULL,
                                               prenom VARCHAR(45) NOT NULL,
                                               age DATE NOT NULL,
                                               PRIMARY KEY (id_acteur),
                                               UNIQUE INDEX id_acteur_UNIQUE (id_acteur ASC) VISIBLE)



-- -----------------------------------------------------
-- Table REALISATEUR
-- -----------------------------------------------------
DROP TABLE IF EXISTS REALISATEUR ;

CREATE TABLE IF NOT EXISTS REALISATEUR (
                                                    id_realisateur INT NOT NULL AUTO_INCREMENT,
                                                    nom VARCHAR(45) NOT NULL,
                                                    prenom VARCHAR(45) NOT NULL,
                                                    age DATE NOT NULL,
                                                    PRIMARY KEY (id_realisateur),
                                                    UNIQUE INDEX id_realisateur_UNIQUE (id_realisateur ASC) VISIBLE)



-- -----------------------------------------------------
-- Table CATEGORIE
-- -----------------------------------------------------
DROP TABLE IF EXISTS CATEGORIE ;

CREATE TABLE IF NOT EXISTS CATEGORIE (
                                                  id_categorie INT NOT NULL AUTO_INCREMENT,
                                                  nom_categorie VARCHAR(45) NOT NULL,
                                                   VARCHAR(45) NULL,
                                                  PRIMARY KEY (id_categorie),
                                                  UNIQUE INDEX id_categorie_UNIQUE (id_categorie ASC) VISIBLE)



-- -----------------------------------------------------
-- Table USER
-- -----------------------------------------------------
DROP TABLE IF EXISTS USER ;

CREATE TABLE IF NOT EXISTS USER (
                                             id_user INT NOT NULL AUTO_INCREMENT,
                                             username VARCHAR(100) NOT NULL,
                                             mot_de_passe VARCHAR(100) NOT NULL,
                                             mail VARCHAR(100) NOT NULL,
                                             nom VARCHAR(100) NOT NULL,
                                             prenom VARCHAR(100) NOT NULL,
                                             age INT NOT NULL,
                                             PRIMARY KEY (id_user),
                                             UNIQUE INDEX id_user_UNIQUE (id_user ASC) VISIBLE)



-- -----------------------------------------------------
-- Table JOUER
-- -----------------------------------------------------
DROP TABLE IF EXISTS JOUER ;

CREATE TABLE IF NOT EXISTS JOUER (
                                              id_acteur INT NOT NULL,
                                              id_film INT NOT NULL,
                                              PRIMARY KEY (id_acteur, id_film),
                                              INDEX id_film_idx (id_film ASC) VISIBLE,
                                              CONSTRAINT id_acteur
                                                  FOREIGN KEY (id_acteur)
                                                      REFERENCES ACTEUR (id_acteur)
                                                      ON DELETE NO ACTION
                                                      ON UPDATE NO ACTION,
                                              CONSTRAINT id_film
                                                  FOREIGN KEY (id_film)
                                                      REFERENCES FILM (id_film)
                                                      ON DELETE NO ACTION
                                                      ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table REALISER
-- -----------------------------------------------------
DROP TABLE IF EXISTS REALISER ;

CREATE TABLE IF NOT EXISTS REALISER (
                                                 id_realisateur INT NOT NULL,
                                                 id_film INT NOT NULL,
                                                 PRIMARY KEY (id_realisateur, id_film),
                                                 INDEX id_film_idx (id_film ASC) VISIBLE,
                                                 CONSTRAINT id_realisateur
                                                     FOREIGN KEY (id_realisateur)
                                                         REFERENCES REALISATEUR (id_realisateur)
                                                         ON DELETE NO ACTION
                                                         ON UPDATE NO ACTION,
                                                 CONSTRAINT id_film
                                                     FOREIGN KEY (id_film)
                                                         REFERENCES FILM (id_film)
                                                         ON DELETE NO ACTION
                                                         ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table ACHETER
-- -----------------------------------------------------
DROP TABLE IF EXISTS ACHETER ;

CREATE TABLE IF NOT EXISTS ACHETER (
                                                id_user INT NOT NULL,
                                                id_film INT NOT NULL,
                                                PRIMARY KEY (id_user, id_film),
                                                INDEX id_film_idx (id_film ASC) VISIBLE,
                                                CONSTRAINT id_user
                                                    FOREIGN KEY (id_user)
                                                        REFERENCES USER (id_user)
                                                        ON DELETE NO ACTION
                                                        ON UPDATE NO ACTION,
                                                CONSTRAINT id_film
                                                    FOREIGN KEY (id_film)
                                                        REFERENCES FILM (id_film)
                                                        ON DELETE NO ACTION
                                                        ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table CATEGORISER
-- -----------------------------------------------------
DROP TABLE IF EXISTS CATEGORISER ;

CREATE TABLE IF NOT EXISTS CATEGORISER (
                                                    id_categorie INT NOT NULL,
                                                    id_film INT NOT NULL,
                                                    PRIMARY KEY (id_categorie, id_film),
                                                    INDEX id_film_idx (id_film ASC) VISIBLE,
                                                    CONSTRAINT id_categorie
                                                        FOREIGN KEY (id_categorie)
                                                            REFERENCES CATEGORIE (id_categorie)
                                                            ON DELETE NO ACTION
                                                            ON UPDATE NO ACTION,
                                                    CONSTRAINT id_film
                                                        FOREIGN KEY (id_film)
                                                            REFERENCES FILM (id_film)
                                                            ON DELETE NO ACTION
                                                            ON UPDATE NO ACTION)



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


