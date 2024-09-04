CREATE TABLE User_(
   ID_User INT,
   Pseudonym VARCHAR(250) NOT NULL,
   Email VARCHAR(250) NOT NULL,
   Password INT NOT NULL,
   isAdmin LOGICAL NOT NULL,
   PRIMARY KEY(ID_User)
);

CREATE TABLE Sport(
   ID_Sport INT,
   Name VARCHAR(250) NOT NULL,
   PRIMARY KEY(ID_Sport)
);

CREATE TABLE Program(
   ID_Program VARCHAR(50),
   name VARCHAR(250) NOT NULL,
   image VARCHAR(250) NOT NULL,
   ID_Sport INT NOT NULL,
   PRIMARY KEY(ID_Program),
   FOREIGN KEY(ID_Sport) REFERENCES Sport(ID_Sport)
);

CREATE TABLE Exercise(
   ID_Exercise VARCHAR(50),
   Name VARCHAR(50),
   image VARCHAR(250),
   description VARCHAR(250) NOT NULL,
   serie INT NOT NULL,
   ID_Program VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Exercise),
   FOREIGN KEY(ID_Program) REFERENCES Program(ID_Program)
);

CREATE TABLE Categorie(
   ID_Categorie INT,
   Name_ VARCHAR(250) NOT NULL,
   PRIMARY KEY(ID_Categorie)
);

CREATE TABLE Food(
   ID_Food INT,
   Name VARCHAR(250) NOT NULL,
   description VARCHAR(250) NOT NULL,
   ingredient VARCHAR(250) NOT NULL,
   Image VARCHAR(250) NOT NULL,
   ID_Categorie INT,
   PRIMARY KEY(ID_Food),
   FOREIGN KEY(ID_Categorie) REFERENCES Categorie(ID_Categorie)
);

CREATE TABLE User_has_day_has_program(
   ID_User INT,
   ID_Program VARCHAR(50),
   days DATE NOT NULL,
   PRIMARY KEY(ID_User, ID_Program),
   FOREIGN KEY(ID_User) REFERENCES User_(ID_User),
   FOREIGN KEY(ID_Program) REFERENCES Program(ID_Program)
);
