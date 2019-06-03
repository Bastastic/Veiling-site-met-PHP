DROP TABLE IF EXISTS geblokkeerd

CREATE TABLE geblokkeerd (
    Gebruiker VARCHAR (25) NOT NULL,
    Datum date NOT NULL,
    Reden VARCHAR (1000) NOT NULL,
    CONSTRAINT PK_geblokkeerd PRIMARY KEY (Gebruiker),
    constraint FK_Geblokkeerd_Gebruiker foreign key (Gebruiker)
		references Gebruiker (Gebruikersnaam)
            on update no action on delete no action,

);