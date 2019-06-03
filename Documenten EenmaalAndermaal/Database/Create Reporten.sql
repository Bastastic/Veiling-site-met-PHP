DROP TABLE IF EXISTS Rapporteren

CREATE TABLE Rapporteren (
    AdvertentieID BIGINT NOT NULL,
    Rapporteerde VARCHAR (25) NOT NULL,
    Omschrijving VARCHAR (1000) NOT NULL,
    CONSTRAINT PK_Rapporteren PRIMARY KEY (AdvertentieID, Rapporteerde),
    constraint FK_Rapporteren_Rappoteerde foreign key (Rapporteerde)
		references Gebruiker (Gebruikersnaam)
            on update no action on delete no action,
        constraint FK_Rapporteren_AdvertentieID foreign key (AdvertentieID)
		references Voorwerp (Voorwerpnummer)
            on update no action on delete no action

);