INSERT INTO iproject15.dbo.Rubriek
SELECT DISTINCT CAST(ID AS int) AS Rubrieknummer,
LEFT(name,100) AS Rubrieknaam,
CAST (Parent AS int) AS Hoofdrubriek ,
CAST (ID AS int) AS Volgnr
FROM iproject15.dbo.Categorieen

--UPDATE iproject15.dbo.Rubriek
--SET Hoofdrubriek = null
--WHERE Hoofdrubriek = -1

--DELETE FROM iproject15.dbo.Rubriek
--WHERE Rubrieknummer = -1

---------------Rubriek--------------------------

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
0 AS Geactiveerd
FROM iproject15.dbo.Users

UPDATE iproject15.dbo.Gebruiker
SET iproject15.dbo.Gebruiker.Verkoper = 1
FROM iproject15.dbo.Gebruiker, iproject15.dbo.Items
WHERE iproject15.dbo.Gebruiker.Gebruikersnaam = iproject15.dbo.Items.Verkoper


------------Gebruikers------------

INSERT INTO iproject15.dbo.Verkoper
SELECT DISTINCT LEFT(Username,25) AS Gebruikersnaam,
NULL AS Bank,
NULL AS Bankrekening,
'Creditcard' AS Controleoptie,
123244232 AS Creditcard
FROM iproject15.dbo.Users

DELETE FROM iproject15.dbo.Verkoper
WHERE Gebruiker IN 
(SELECT Gebruikersnaam FROM iproject15.dbo.Gebruiker
WHERE Verkoper = 0); 
-----------Verkoper--------------
SET IDENTITY_INSERT iproject15.dbo.Voorwerp ON
GO
INSERT INTO iproject15.dbo.Voorwerp (Voorwerpnummer,Titel,Beschrijving,Startprijs,Betalingswijze,Betalingsinstructie,Plaatsnaam,Land,Looptijd,LooptijdbeginDag,LooptijdbeginTijdstip,Verkoper,Koper,Verzendkosten,Verzendinstructies,LooptijdeindeDag,LooptijdeindeTijdstip,VeiligGesloten,Verkoopprijs)
SELECT CAST (ID AS bigint) AS Voorwerpnummer,
LEFT (Titel,50) AS Titel,
CAST (dbo.udf_StripHTML([Beschrijving]) + Conditie  AS varchar(2000)) AS Beschrijving,
CAST (dbo.udf_OmzetValuta([Prijs]) AS numeric(8,2)) AS Startprijs,
'Creditcard' AS Betalingswijze,
NULL AS Betalingsinstructie,
LEFT (Locatie,50) AS Plaatsnaam,
LEFT (Locatie,40) AS Land,
6 AS Looptijd,
'2019-05-15' AS LooptijdbeginDag,
'12:34:54' AS LooptijdbeginTijdstip,
LEFT (Verkoper,25) AS Verkoper,
NULL AS Koper, 	
NULL AS Verzendkosten,
NULL AS Verzendinstructies,
Convert(date, getdate()) + 7 AS LooptijdeindeDag,
'12:34:54' AS LooptijdeindeTijdstip,
0 AS VeiligGesloten,
NULL AS Verkoopprijs
FROM iproject15.dbo.Items
SET IDENTITY_INSERT iproject15.dbo.Voorwerp OFF
GO

UPDATE Voorwerp
SET Plaatsnaam = LEFT(Plaatsnaam, CHARINDEX(',', Plaatsnaam) - 1)
WHERE CHARINDEX(',', Plaatsnaam) > 0

UPDATE Voorwerp
SET Land = LEFT(Plaatsnaam, CHARINDEX(',', Plaatsnaam) - 1)
WHERE CHARINDEX(',', Plaatsnaam) > 0

--------------Voorwerp---------------

INSERT INTO iproject15.dbo.Bestand
SELECT DISTINCT 'pics/' + LEFT (IllustratieFile,200) AS Filenaam,
CAST (ItemID AS bigint) AS Voorwerp 
FROM iproject15.dbo.Illustraties

-------Bestand---------------

INSERT INTO [iproject15].[dbo].[Voorwerp_in_Rubriek]
SELECT DISTINCT CAST (ID AS bigint) AS Voorwerp,
CAST (Categorie AS int) AS Rubriek_op_Laagste_Niveau
FROM iproject15.dbo.items

---------Voorwerp_in_Rubriek-----------

-- dingen random maken? ID toevoegen bij Email.

