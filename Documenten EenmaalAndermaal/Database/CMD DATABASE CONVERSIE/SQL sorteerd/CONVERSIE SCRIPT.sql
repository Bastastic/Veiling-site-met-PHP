----leegmaken van database-------
DELETE Verificatie
DELETE Bestand
DELETE Bod
DELETE Feedback
DELETE Gebruikerstelefoon
DELETE Voorwerp_in_Rubriek
DELETE Rapporteren
DELETE geblokkeerd
DELETE geblokkeerdeVeilingen
DELETE Voorwerp
DELETE Verkoper
DELETE Gebruiker
DELETE Gebruikerstelefoon
DELETE Rubriek
DELETE Verkoper
DELETE Voorwerp
DELETE Voorwerp_in_Rubriek
DELETE Vraag

---- Testvragen ------
insert into Vraag values
	(1, 'In welke straat ben je geboren?'),
	(2, 'Wat is de meisjesnaam je moeder'),
	(3, 'Wat is je lievelingsgerecht?'),
	(4, 'Hoe heet je oudste zusje?'),
	(5, 'Hoe heet je huisdier?')


---------------Rubriek--------------------------
INSERT INTO iproject15.dbo.Rubriek
SELECT DISTINCT CAST(ID AS int) AS Rubrieknummer,
LEFT(name,100) AS Rubrieknaam,
CAST (Parent AS int) AS Hoofdrubriek ,
CAST (ID AS int) AS Volgnr
FROM iproject15.dbo.Categorieen


------------Gebruikers------------
-- Maken van unieke data, doormiddel van gebruiker van unieke gebruikersnamen. 
INSERT INTO iproject15.dbo.Gebruiker
SELECT DISTINCT LEFT(Username,25) AS Gebruikersnaam,
LEFT(Username,29) + 'V' AS Voornaam,
LEFT(Username,29) + 'A' AS Achternaam,
LEFT(Username,38) + '11' AS Adresregel1,
NULL AS Adresregel2,
LEFT (Postalcode,7) AS Postcode,
'Plek' AS Plaatsnaam,
LEFT (Location,40) AS Land,
'1999-05-19' AS Geboortedag,
LEFT(Username,240) + '@gmail.com' AS Mailbox,
'$argon2i$v=19$m=1024,t=2,p=2$bGIycFJVMTlhMk9jQW1WNA$Arv8yrHb5WW7xWinhBLeQZE17i0pxflvtRg2OECnpBY' AS Wachtwoord,
1 AS Vraag,
'soep met aardappelen' AS Antwoordtext,
0 AS Verkoper,
1 AS Geactiveerd
FROM iproject15.dbo.Users

-- Checkt of de gebruiker veilingen heeft, als dat zo is, wordt verkoper = 1
UPDATE iproject15.dbo.Gebruiker
SET iproject15.dbo.Gebruiker.Verkoper = 1
FROM iproject15.dbo.Gebruiker, iproject15.dbo.Items
WHERE iproject15.dbo.Gebruiker.Gebruikersnaam = iproject15.dbo.Items.Verkoper


-----------Verkoper--------------
INSERT INTO iproject15.dbo.Verkoper
SELECT DISTINCT LEFT(Username,25) AS Gebruikersnaam,
NULL AS Bank,
NULL AS Bankrekening,
'Goedgekeurd' AS Controleoptie,
123244232 AS Creditcard
FROM iproject15.dbo.Users

-- extra gebruiker waarop we kunnen inloggen
insert into Gebruiker values
	('Gebruiker', 'Gebruiker', 'Gebruiker', 'Pastoor van beijnenstraat 181', null, '5081 AP', 'Hilvarenbeek', 'Nederland', '1989-01-01', 'IProject15-Gebruiker@hotmail.com', '$argon2i$v=19$m=1024,t=2,p=2$bGIycFJVMTlhMk9jQW1WNA$Arv8yrHb5WW7xWinhBLeQZE17i0pxflvtRg2OECnpBY', 1, 'Appels', 1, 1)
insert into Verkoper values
	('Gebruiker', 'ABN-Amro', 'NL91ABNA0417164300', 'Goedgekeurd', null)


--------------Voorwerp---------------
SET IDENTITY_INSERT iproject15.dbo.Voorwerp ON
GO
INSERT INTO iproject15.dbo.Voorwerp (Voorwerpnummer,Titel,Beschrijving,Startprijs,Betalingswijze,Betalingsinstructie,Plaatsnaam,Land,Looptijd,LooptijdbeginDag,LooptijdbeginTijdstip,Verkoper,Koper,Verzendkosten,Verzendinstructies,LooptijdeindeDag,LooptijdeindeTijdstip,VeiligGesloten,Verkoopprijs)
SELECT CAST (ID AS bigint) AS Voorwerpnummer,
LEFT (Titel,50) AS Titel,
CAST (dbo.udf_StripHTML([Beschrijving]) + Conditie AS varchar(2000)) AS Beschrijving,
CAST (dbo.udf_OmzetValuta([Prijs], [Valuta]) AS numeric(8,2)) AS Startprijs,
'Creditcard' AS Betalingswijze,
NULL AS Betalingsinstructie,
LEFT (Locatie,50) AS Plaatsnaam,
LEFT (Locatie,40) AS Land,
7 AS Looptijd,
'2019-05-15' AS LooptijdbeginDag,
'12:34:54' AS LooptijdbeginTijdstip,
LEFT (Verkoper,25) AS Verkoper,
NULL AS Koper, 	
NULL AS Verzendkosten,
NULL AS Verzendinstructies,
Convert(date, getdate() + 7) AS LooptijdeindeDag,
'12:34:54' AS LooptijdeindeTijdstip,
0 AS VeiligGesloten,
NULL AS Verkoopprijs
FROM iproject15.dbo.Items
SET IDENTITY_INSERT iproject15.dbo.Voorwerp OFF
GO

-- bij de plaatsnaam, wordt de land ervoor wegehaald. anders staat het land ervoor erbij
UPDATE Voorwerp
SET Plaatsnaam = LEFT(Plaatsnaam, CHARINDEX(',', Plaatsnaam) - 1)
WHERE CHARINDEX(',', Plaatsnaam) > 0

UPDATE Voorwerp
SET Land = LEFT(Land, CHARINDEX(',', Land) - 1)
WHERE CHARINDEX(',', Land) > 0

right(Land, len(Land) - charindex('-', Land))


----------Bestand---------------
-- Alle foto's van de veilingen van de dataconversie staan in het mapje 'pics/'.
INSERT INTO iproject15.dbo.Bestand
SELECT DISTINCT 'pics/' + LEFT (IllustratieFile,200) AS Filenaam,
CAST (ItemID AS bigint) AS Voorwerp 
FROM iproject15.dbo.Illustraties


---------Voorwerp_in_Rubriek-----------
INSERT INTO [iproject15].[dbo].[Voorwerp_in_Rubriek]
SELECT DISTINCT CAST (ID AS bigint) AS Voorwerp,
CAST (Categorie AS int) AS Rubriek_op_Laagste_Niveau
FROM iproject15.dbo.items
