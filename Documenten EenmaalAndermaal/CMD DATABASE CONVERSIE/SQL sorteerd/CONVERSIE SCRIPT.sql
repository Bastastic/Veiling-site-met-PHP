USE Dataconversie

INSERT INTO iproject15.dbo.Rubriek
SELECT DISTINCT CAST(ID AS int) AS Rubrieknummer,
LEFT(name,100) AS Rubrieknaam,
CAST (Parent AS int) AS Hoofdrubriek ,
CAST (ID AS int) AS Volgnr
FROM Dataconversie.dbo.Categorieen

/* iproject15 Person Table van MYIMDB Imported_Person*/
INSERT INTO iproject15.dbo.Person
SELECT DISTINCT CAST(Id + 88801 AS int) AS person_id ,
LEFT(Lname,50) AS lastname ,
LEFT(Fname,50) AS firstname ,
CAST (Gender AS char(1)) AS gender
FROM MYIMDB.dbo.Imported_Person

INSERT INTO iproject15.dbo.Movie
SELECT CAST (id AS int) AS movie_id,
LEFT (Name,255) AS title,
NULL AS duration,
LEFT (Nyr,255) AS description,
CAST (Year AS int) AS publication_year,
NULL AS cover_image,
NULL AS previous_part,
(999.99) AS price, 
NULL AS URL
FROM MYIMDB.dbo.Imported_Movie

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