INSERT INTO iproject15.dbo.Rubriek
SELECT DISTINCT CAST(ID AS int) AS Rubrieknummer,
LEFT(name,100) AS Rubrieknaam,
CAST (Parent AS int) AS Hoofdrubriek ,
CAST (ID AS int) AS Volgnr
FROM Dataconversie.dbo.Categorieen

UPDATE iproject15.dbo.Rubriek
SET Hoofdrubriek = null
WHERE Hoofdrubriek = -1

DELETE FROM iproject15.dbo.Rubriek
WHERE Rubrieknummer = -1

---------------Rubriek--------------------------

INSERT INTO iproject15.dbo.Gebruiker
SELECT DISTINCT LEFT(Username,25) AS Gebruikersnaam,
'Voornaam' AS Voornaam,
'Achternaam' AS Achternaam,
'straat 11' AS Adresregel1,
NULL AS Adresregel2,
LEFT (Postalcode,7) AS Postcode,
'Plek' AS Plaatsnaam,
LEFT (Location,40) AS Land,
'1999-05-19' AS Geboortedag,
'Test@gmail.com' AS Mailbox,
'Wachtwoord123' AS Wachtwoord,
1 AS Vraag,
'soep met aardappelen' AS Antwoordtext,
0 AS Verkoper,
0 AS Geactiveerd
FROM Dataconversie.dbo.Users

------------Gebruikers------------

SET IDENTITY_INSERT dbo.Voorwerp ON
GO
INSERT INTO iproject15.dbo.Voorwerp
SELECT CAST (ID AS int) AS Voorwerpnummer,
LEFT (Titel,50) AS Titel,
CAST (dbo.udf_StripHTML([Beschrijving]) AS varchar(2000)) AS Beschrijving,
CAST (Prijs AS numeric(8,2)) AS Startprijs,
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
'2019-05-21' AS LooptijdeindeDag,
'12:34:54' AS LooptijdeindeTijdstip,
0 AS VeiligGesloten,
NULL AS Verkoopprijs
FROM Dataconversie.dbo.Items
SET IDENTITY_INSERT dbo.Voorwerp OFF
GO

UPDATE Voorwerp
SET Plaatsnaam = LEFT(Plaatsnaam, CHARINDEX(',', Plaatsnaam) - 1)
WHERE CHARINDEX(',', Plaatsnaam) > 0

--------------Voorwerp---------------


INSERT INTO iproject15.dbo.Bestand
SELECT DISTINCT LEFT (IllustratieFile,200) AS Filenaam,
CAST (ItemID AS int) AS Voorwerp 
FROM Dataconversie.dbo.Illustraties

-------Bestand---------------

INSERT INTO iproject15.dbo.Movie_Genre
SELECT DISTINCT CAST (Id AS int) AS movie_id,
LEFT (Genre,255) AS genre_name
FROM MYIMDB.dbo.Imported_Genre

INSERT INTO iproject15.dbo.Movie_Directors
SELECT DISTINCT CAST (Mid AS int) AS movie_id,
CAST (Did AS int) AS person_id
FROM MYIMDB.dbo.Imported_Movie_Directors

INSERT INTO iproject15.dbo.Movie_Cast
SELECT DISTINCT CAST (Mid AS int) AS movie_id,
CAST(Pid + 88801 AS int) AS person_id ,
LEFT(Role,255) AS role
FROM MYIMDB.dbo.Imported_Cast
