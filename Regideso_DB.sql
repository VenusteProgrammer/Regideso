create database Regideso_DB;

use Regideso_DB;

create table Adresse(id_adr int(5) primary key auto_increment,pays varchar(25), province varchar(25), commune varchar(25), quartier varchar(25));

create table Client(id_client int(5) primary key auto_increment,nom varchar(25),prenom varchar(25),adresse int(5),telephone varchar(25),email varchar(25),username varchar(25),password varchar(25));

alter table Client add constraint fk_adr_to_cl foreign key (adresse) references Adresse(id_adr) ON DELETE CASCADE;

create table Compteur(id_compt int(5) primary key auto_increment, client int(5), num_compteur int(50), type enum('Eau','Electricite') default 'Eau');

alter table Compteur add constraint fk_cl_to_compt foreign key (client) references Client(id_client) ON DELETE CASCADE;

create table Facture(id_fact int(5) primary key auto_increment,compteur int(5), montant double,date_pay TIMESTAMP DEFAULT CURRENT_TIMESTAMP, etat enum('0','1') default '0');

alter table Facture add constraint fk_compt_to_fact foreign key (compteur) references Compteur(id_compt) ON DELETE CASCADE;

create table Reclamation(id_recl int(5) primary key auto_increment,num_fact int(5),description varchar(100),date_recl TIMESTAMP DEFAULT CURRENT_TIMESTAMP,etat enum('0','1') default '0');

alter table Reclamation add constraint fk_fact_to_recl foreign key (num_fact) references Facture(id_fact) ON DELETE CASCADE;

create table Publication(id_pub int(5) primary key auto_increment,objectif varchar(25),publicite varchar(200),date_pub TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

create table Contactez_nous(id_cont int(5) primary key auto_increment, nom varchar(25),prenom varchar(25),adresse varchar(50),telephone varchar(25),objet varchar(25),message varchar(100));

create table Administrateur(id_admin int(5) primary key auto_increment,username varchar(25), password varchar(25)); 

create table commentaire(id_comm int(5) primary key auto_increment,commentaire varchar(100),publication int(5));

alter table commentaire add constraint fk_pub_to_comm foreign key (publication) references Publication(id_pub) on delete cascade;





INSERT INTO Adresse (pays, province, commune, quartier) VALUES
('Burundi', 'Bujumbura Mairie', 'Ntahangwa', 'Kigobe'),
('Burundi', 'Makamba', 'Makamba', 'giswahili'),
('Burundi', 'Gitega', 'Gitega', 'Nyabututsi'),
('Burundi', 'Bururi', 'Matana', 'Buganda'),
('Burundi', 'Cibitoke', 'Mabayi', 'Rugombo');



 INSERT INTO Client (nom, prenom,adresse, telephone, email, username, password) VALUES
('NDAYISHIMIYE', 'Évariste', 1, '+257 22 22 22 22', 'endayishimiye@gmail.com', 'Neva', '123'),
('NDAYISENGA', 'Jules Cesar Junior', 2, '+257 79 234 567', 'jnimbona@gmail.com', 'StarK', '123'),
('NDAYIZEYE', 'Venuste', 3, '+257 69 876 543', 'muwimana@hotmail.com', 'LioIT', '123'),
('NDAYIZEYE', 'Claver', 4, '+257 72 123 456', 'phakizimana@yahoo.fr', 'Cleva', '123'),
('NDERAGAKURA', 'Zebede', 5, '+257 68 901 234', 'snzayisenga@outlook.com', 'zebede', '123');


INSERT INTO Compteur (client, num_compteur, type) VALUES
(1, '12345', 'Electricité'),
(2, '67890', 'Eau'),
(3, '54321', 'Electricité'),
(4, '98765', 'Eau'),
(5, '23456', 'Electricité');


INSERT INTO Facture (compteur, montant) VALUES
(1, 12000),
(2, 8500),
(3, 15000),
(4, 9500),
(5, 11000);

ALTER TABLE Reclamation ADD COLUMN image_path VARCHAR(255);


