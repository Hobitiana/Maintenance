create database Maintenance;
use Maintenance;

create table Equipement(
idEquipement int AUTO_INCREMENT NOT NULL,
nom varchar(50),
reference varchar(50),
nbrMaintenance int,
primary key(idEquipement)
);

calcule debut =fin
fin =Fin+totalSousEnsemble/nbrMaintenance
calcule Semaine
semaine + 52/nbrMaintenance

INSERT INTO Equipement VALUES ( 1,'Ordie','ORDIN',10); 
INSERT INTO Equipement VALUES ( 2,'Atcom','ATCOM',2); 
INSERT INTO Equipement VALUES ( 3,'Cat','CAT',10); 
INSERT INTO Equipement VALUES ( 4,'Atom02','ATM02',10); 
INSERT INTO Equipement VALUES ( 5,'Meteo','METEO',8); 
INSERT INTO Equipement VALUES ( 6,'Suppo','SUPPO',10); 



create table SousEnsemble(
idSousEnsemble int AUTO_INCREMENT NOT NULL,
idEquipement int,
designation varchar(50),
nom varchar(50),
emplacement varchar(50),
primary key(idSousEnsemble),
FOREIGN KEY(idEquipement) REFERENCES Equipement(idEquipement)
);

create or replace view ViewEquipement as
select E.idEquipement,E.nom,E.nbrMaintenance,E.semaine,S.designation,S.emplacement
from SousEnsemble S
JOIN Equipement E on S.idEquipement=E.idEquipement;

create or replace view ViewEquipement as
select S.idSousEnsemble,E.idEquipement,E.nbrMaintenance,S.designation,S.emplacement
from SousEnsemble S
JOIN Equipement E on S.idEquipement=E.idEquipement;

Ordin
INSERT INTO SousEnsemble VALUES (1,1,'PC SUPERVISION MCU','PC HP','BT 1° ETAGE - CAT'); 
INSERT INTO SousEnsemble VALUES (2,1,'PC AFTN USER CAT','PC HP','BT 1° ETAGE - CAT'); 
INSERT INTO SousEnsemble VALUES (3,1,'PC AFTN USER BAT','PC HP','BT 1° ETAGE -  BAT'); 
INSERT INTO SousEnsemble VALUES (4,1,'PC AFTN USER CRT','PC HP','BT 1° ETAGE - CRT'); 
INSERT INTO SousEnsemble VALUES (5,1,'PC AFTN USER CU TEL','PC HP','BT 1° ETAGE - CU TEL'); 
INSERT INTO SousEnsemble VALUES (6,1,'PC AFTN USER VMA','PC HP','BT 1° ETAGE - VMA'); 


CAT
INSERT INTO SousEnsemble VALUES (7,3,'BAIE AMHS','PBAIE AMHS','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (8,3,'SERVEUR CN1-MHS','SERVEUR CN1','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (9,3,'SERVEUR CN2-MHS','SERVEUR CN2','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (10,3,'SERVEUR CN3-AIS','SERVEUR CN3','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (11,3,'SERVEUR CN4-AIS','SERVEUR CN4','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (12,3,'SERVEUR MOBA','SERVEUR MOBA','STR - SALLE TECH.'); 



Atcom
INSERT INTO SousEnsemble VALUES (13,2,'VOIP GATEWAY FXS 1','ATCOM 1','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (14,2,'VOIP GATEWAY FXS 2','ATCOM 2','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (15,2,'KVM','ATCOM 3','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (16,2,'GATEWAY FXO GRANDSTREAM 1','ATCOM 4','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (17,2,'GATEWAY GSM','ATCOM 5','STR 1° ETAGE - SIMU'); 

create table semaine(
idSemaine int AUTO_INCREMENT NOT NULL,
idSousEnsemble int,
semaine int,
primary key(idSemaine),
FOREIGN KEY(idSousEnsemble) REFERENCES SousEnsemble(idSousEnsemble)
);

create or replace view ViewDetail as
select V.designation,V.emplacement,S.idSousEnsemble,S.semaine,V.idEquipement
from viewequipement V
JOIN semaine S on S.idSousEnsemble=V.idSousEnsemble;

/*
create table Equipement(
idEquipement int AUTO_INCREMENT NOT NULL,
nom varchar(50),
reference varchar(50),
nbrMaintenance int,
semaine int,
debut int,
fin int,
primary key(idEquipement)
);

calcule debut =fin
fin =Fin+totalSousEnsemble/nbrMaintenance
calcule Semaine
semaine + 52/nbrMaintenance

INSERT INTO Equipement VALUES ( 1,'Ordie','ORDIN',10,1,1,2); 
INSERT INTO Equipement VALUES ( 2,'Atcom','ATCOM',2,2,1,2); 
INSERT INTO Equipement VALUES ( 3,'Cat','CAT',10,3,1,2); 
INSERT INTO Equipement VALUES ( 4,'Atom02','ATM02',10,4,1,2); 
INSERT INTO Equipement VALUES ( 5,'Meteo','METEO',8,5,1,2); 
INSERT INTO Equipement VALUES ( 6,'Suppo','SUPPO',10,6,1,2); 



create table SousEnsemble(
idSousEnsemble int AUTO_INCREMENT NOT NULL,
idEquipement int,
designation varchar(50),
nom varchar(50),
emplacement varchar(50),
primary key(idSousEnsemble),
FOREIGN KEY(idEquipement) REFERENCES Equipement(idEquipement)
);

create or replace view ViewEquipement as
select E.idEquipement,E.nbrMaintenance,E.semaine,E.debut,E.fin,S.designation,S.emplacement
from SousEnsemble S
JOIN Equipement E on S.idEquipement=E.idEquipement;

Ordin
INSERT INTO SousEnsemble VALUES (1,1,'PC SUPERVISION MCU','PC HP','BT 1° ETAGE - CAT'); 
INSERT INTO SousEnsemble VALUES (2,1,'PC AFTN USER CAT','PC HP','BT 1° ETAGE - CAT'); 
INSERT INTO SousEnsemble VALUES (3,1,'PC AFTN USER BAT','PC HP','BT 1° ETAGE -  BAT'); 
INSERT INTO SousEnsemble VALUES (4,1,'PC AFTN USER CRT','PC HP','BT 1° ETAGE - CRT'); 
INSERT INTO SousEnsemble VALUES (5,1,'PC AFTN USER CU TEL','PC HP','BT 1° ETAGE - CU TEL'); 
INSERT INTO SousEnsemble VALUES (6,1,'PC AFTN USER VMA','PC HP','BT 1° ETAGE - VMA'); 


CAT
INSERT INTO SousEnsemble VALUES (7,3,'BAIE AMHS','PBAIE AMHS','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (8,3,'SERVEUR CN1-MHS','SERVEUR CN1','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (9,3,'SERVEUR CN2-MHS','SERVEUR CN2','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (10,3,'SERVEUR CN3-AIS','SERVEUR CN3','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (11,3,'SERVEUR CN4-AIS','SERVEUR CN4','STR - SALLE TECH.'); 
INSERT INTO SousEnsemble VALUES (12,3,'SERVEUR MOBA','SERVEUR MOBA','STR - SALLE TECH.'); 



Atcom
INSERT INTO SousEnsemble VALUES (13,2,'VOIP GATEWAY FXS 1','ATCOM 1','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (14,2,'VOIP GATEWAY FXS 2','ATCOM 2','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (15,2,'KVM','ATCOM 3','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (16,2,'GATEWAY FXO GRANDSTREAM 1','ATCOM 4','STR 1° ETAGE - SIMU'); 
INSERT INTO SousEnsemble VALUES (17,2,'GATEWAY GSM','ATCOM 5','STR 1° ETAGE - SIMU'); 


select (count(idSousEnsemble))/52 as maintenance from sousensemble;

select (nbrMaintenance)/52 as semaines from Equipement;

select * 
CASE 
	WHEN idSousEnsemble THEN 
	ELSE SousEnsemble
	END AS semaine
FROM SousEnsemble;

create table Maintenance(
idMaintenance int AUTO_INCREMENT NOT NULL,
idEquipement int,
nom varchar(50),
dateToDay date,
dateMaintenance DATE,
primary key(idMaintenance),
FOREIGN KEY(idEquipement) REFERENCES Equipement(idEquipement)
);

INSERT INTO Maintenance VALUES ( 1,1,'Meteo','2024-01-29','2024-02-28'); 

create table Historique(
idHistorique int AUTO_INCREMENT NOT NULL,
idMaintenance int,
dateHistorique DATE,
primary key(idHistorique)
);


create table Chauffeur(
idChauffeur int AUTO_INCREMENT NOT NULL,
Nom varchar(50),
Email varchar(50),
Mdp varchar(50),
Permis varchar(50),
Experience int,
primary key(idChauffeur)
);

INSERT INTO Chauffeur VALUES ( 1,'Andre','Andre@gmail.com','1234',"B",5); 
INSERT INTO Chauffeur VALUES ( 2,'Luck','Luck@gmail.com','1234',"B",10); 



select * from ResultFormule order by idResult DESC limit 3; 


SELECT idResult,idFormule,idMatiereP,ResteStock,ResultF FROM ResultFormule WHERE idFormule = 1 Order by idResult DESC limit 3;

//seulement la partie gauche 
select NomMatiere from MatiereP
LEFT JOIN formule on MatiereP.idMatiereP=formule.idMatiereP WHERE formule.idMatiereP is null;

select NomMatiere from MatiereP
LEFT JOIN formule on MatiereP.idMatiereP=formule.idMatiereP WHERE nomFormule='Yaourt à la Fraise' is null;


select idFormule,ProduitF.NomProduit,nomFormule,pourcentage
from formule
JOIN ProduitF on formule.idProduitF=ProduitF.idProduitF;

//tsy miverimberina ilay nom
 select distinct nomFormule from FormuleProduit;

UPDATE MatiereP
SET quantiteMatiere = '1'
WHERE idMatiereP = 4;

update NomTable set NomColonne=new_Valeur;
update NomTable set NomColonne=new_Valeur ,NomColonne2=new_Valeur where ;
delete from NomTable;
delete from NomTable where ;
drop table NomTable;
drop database Maintenance;