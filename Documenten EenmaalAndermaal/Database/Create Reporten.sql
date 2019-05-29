DROP TABLE IF EXISTS Reporten

CREATE TABLE Reporten (
    AdvertendieID BIGINT NOT NULL,
    Raporteerde VARCHAR (25) NOT NULL,
    Omschrijving VARCHAR (1000) NOT NULL,
    CONSTRAINT PK_Reporten PRIMARY KEY (AdvertendieID, Raporteerde),
    add constraint FK_Report_Rapoteerde foreign key (Raporteerde)
		references Gebruiker (Gebruikersnaam)
            on update no action on delete no action,
        constraint FK_Report_AdvertentieID foreign key (AdvertendieID)
		references Voorwerp (Voorwerpnummer)
            on update no action on delete no action

);