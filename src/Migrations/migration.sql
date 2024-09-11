
CREATE TABLE Categorie
(
  ID_Categorie INT          NOT NULL AUTO_INCREMENT,
  name         VARCHAR(250) NOT NULL,
  PRIMARY KEY (ID_Categorie)
);

ALTER TABLE Categorie
  ADD CONSTRAINT UQ_ID_Categorie UNIQUE (ID_Categorie);

CREATE TABLE Exercise
(
  ID_Exercise INTEGER      NOT NULL AUTO_INCREMENT,
  name        VARCHAR(50)  NOT NULL,
  image       VARCHAR(250) NOT NULL,
  description VARCHAR(250) NOT NULL,
  serie       INT          NOT NULL,
  ID_Program  INTEGER      NOT NULL,
  PRIMARY KEY (ID_Exercise)
);

ALTER TABLE Exercise
  ADD CONSTRAINT UQ_ID_Exercise UNIQUE (ID_Exercise);

CREATE TABLE Food
(
  ID_Food      INT          NOT NULL AUTO_INCREMENT,
  name         VARCHAR(250) NOT NULL,
  description  VARCHAR(250) NOT NULL,
  ingredient   VARCHAR(250) NOT NULL,
  image        VARCHAR(250) NOT NULL,
  ID_Categorie INT          NOT NULL,
  PRIMARY KEY (ID_Food)
);

ALTER TABLE Food
  ADD CONSTRAINT UQ_ID_Food UNIQUE (ID_Food);

CREATE TABLE Program
(
  ID_Program INTEGER      NOT NULL AUTO_INCREMENT,
  name       VARCHAR(250) NOT NULL,
  image      VARCHAR(250) NOT NULL,
  ID_Sport   INT          NOT NULL,
  PRIMARY KEY (ID_Program)
);

ALTER TABLE Program
  ADD CONSTRAINT UQ_ID_Program UNIQUE (ID_Program);

CREATE TABLE Sport
(
  ID_Sport INT          NOT NULL AUTO_INCREMENT,
  name     VARCHAR(250) NOT NULL,
  PRIMARY KEY (ID_Sport)
);

ALTER TABLE Sport
  ADD CONSTRAINT UQ_ID_Sport UNIQUE (ID_Sport);

CREATE TABLE User_has_day_has_program
(
  ID_User    INT     NOT NULL,
  ID_Program INTEGER NOT NULL,
  days       DATE    NOT NULL,
  PRIMARY KEY (ID_User, ID_Program)
);

CREATE TABLE Users
(
  ID_User   INT          NOT NULL AUTO_INCREMENT,
  pseudonym VARCHAR(250) NOT NULL,
  email     VARCHAR(250) NOT NULL,
  password  VARCHAR(250) NOT NULL,
  isAdmin   BOOLEAN      NOT NULL,
  PRIMARY KEY (ID_User)
);

ALTER TABLE Users
  ADD CONSTRAINT UQ_ID_User UNIQUE (ID_User);

ALTER TABLE Program
  ADD CONSTRAINT FK_Sport_TO_Program
    FOREIGN KEY (ID_Sport)
    REFERENCES Sport (ID_Sport);

ALTER TABLE Exercise
  ADD CONSTRAINT FK_Program_TO_Exercise
    FOREIGN KEY (ID_Program)
    REFERENCES Program (ID_Program);

ALTER TABLE Food
  ADD CONSTRAINT FK_Categorie_TO_Food
    FOREIGN KEY (ID_Categorie)
    REFERENCES Categorie (ID_Categorie);

ALTER TABLE User_has_day_has_program
  ADD CONSTRAINT FK_Users_TO_User_has_day_has_program
    FOREIGN KEY (ID_User)
    REFERENCES Users (ID_User);

ALTER TABLE User_has_day_has_program
  ADD CONSTRAINT FK_Program_TO_User_has_day_has_program
    FOREIGN KEY (ID_Program)
    REFERENCES Program (ID_Program);
