

DROP TABLE IF EXISTS geblokkeerdeVeilingen

CREATE TABLE geblokkeerdeVeilingen (
    AdvertentieID BIGINT NOT NULL,
    Datum date NOT NULL,
    Reden VARCHAR (1000) NOT NULL,
    CONSTRAINT PK_geblokkeerdeVeilingen PRIMARY KEY (AdvertentieID),
    constraint FK_geblokkeerdeVeilingen_AdvertentieID foreign key (AdvertentieID)
		references Voorwerp (Voorwerpnummer)
            on update no action on delete no action,
);



