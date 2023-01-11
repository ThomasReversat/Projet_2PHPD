drop database if exists bddThomasVictor;

create database bddThomasVictor default character set utf8;
use bddThomasVictor;
-- ---------------------------- --
--             FILM             --
-- ---------------------------- --
drop table if exists FILM;
create table FILM (id_film integer primary key auto_increment not null,
                   titre varchar(100) not null,
                   description varchar(1000) not null,
                   image_path varchar(100) not null);





-- ---------------------------- --
--             ACTEUR           --
-- ---------------------------- --
drop table if exists ACTEUR;
create table ACTEUR (id_acteur integer primary key auto_increment not null,
                    nom varchar(100) not null,
                    prenom varchar(100) not null,
                    age date);




-- ---------------------------- --
--             CATEGORIE        --
-- ---------------------------- --
drop table if exists CATEGORIE;
create table CATEGORIE (id_categorie integer primary key auto_increment not null,
                        nom_categorie varchar(45) not null);



-- ---------------------------- --
--             USER             --
-- ---------------------------- --
drop table if exists USER;
create table USER (id_user integer primary key auto_increment not null,
                   username varchar(100) not null,
                   mot_de_passe varchar(100) not null,
                   mail varchar(100) not null,
                   nom varchar(100) not null,
                   prenom varchar(100) not null,
                   age date);


-- ---------------------------- --
--             REALISATEUR      --
-- ---------------------------- --
drop table if exists REALISATEUR;
create table REALISATEUR (id_realisateur integer primary key auto_increment not null,
                          nom varchar(100) not null,
                          prenom varchar(100) not null,
                          age date);



-- ---------------------------- --
--             REALISER         --
-- ---------------------------- --
drop table if exists REALISER;
create table REALISER (id_realisateur integer not null,
                       id_film integer not null,
                       foreign key (id_realisateur) references REALISATEUR(id_realisateur),
                       foreign key(id_film) references FILM(id_film));



-- ---------------------------- --
--             CATEGORISER      --
-- ---------------------------- --
drop table if exists CATEGORISER;
create table CATEGORISER(id_categorie integer not null,
                         id_film integer not null,
                         foreign key (id_categorie) references CATEGORIE(id_categorie),
                         foreign key(id_film) references FILM(id_film));




-- ---------------------------- --
--             JOUER            --
-- ---------------------------- --
drop table if exists JOUER;
create table JOUER (id_acteur integer not null,
                    id_film integer not null,
                    foreign key (id_acteur) references ACTEUR(id_acteur),
                    foreign key(id_film) references FILM(id_film));




-- ---------------------------- --
--             ACHETER          --
-- ---------------------------- --
drop table if exists ACHETER;
create table ACHETER(id_user integer not null,
                     id_film integer not null,
                     foreign key (id_user) references USER(id_user),
                     foreign key(id_film) references FILM(id_film));







