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
SET IDENTITY_INSERT Tbl_Cartoons  ON
GO
INSERT INTO Dataconversie.dbo.Items
SELECT CAST (ID AS bigint) AS Voorwerpnummer,
LEFT (Titel,50) AS Titel,
LEFT (Beschrijving,2000), AS Beschrijving
NULL AS Kleur,
NULL AS Afmeting,
NULL AS Merk,
'zgan' AS Conditie,

CAST (Year AS int) AS publication_year,
NULL AS cover_image,
NULL AS previous_part,
(999.99) AS price, 
NULL AS URL
FROM MYIMDB.dbo.Imported_Movie
SET IDENTITY_INSERT Tbl_Cartoons  OFF
GO

INSERT INTO iproject15.dbo.Genre
SELECT DISTINCT LEFT (Genre,255) AS genre_name,
NULL AS discription
FROM MYIMDB.dbo.Imported_Genre

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
