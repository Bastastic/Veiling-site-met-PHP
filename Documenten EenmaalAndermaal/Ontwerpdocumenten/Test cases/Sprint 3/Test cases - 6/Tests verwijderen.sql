--Test scripts om test cases uit te voeren bij veranderingen in de database via de admin pagina

--maakt 2 producten aan en zet ze in een rubriek, voorwerpnummers worden automatisch opgehaald met subqueries
insert into Voorwerp values ('Rub verwijder test', 'abc', 1, 'Creditcard', null, 'Arnhem', 'Nederland', 1, GETDATE(), CURRENT_TIMESTAMP, null, null, 'gebruiker', null, GETDATE()+1, CURRENT_TIMESTAMP, 0, null)
insert into Voorwerp values ('Rub verwijder test2', 'abc', 1, 'Creditcard', null, 'Arnhem', 'Nederland', 1, GETDATE(), CURRENT_TIMESTAMP, null, null, 'gebruiker', null, GETDATE()+1, CURRENT_TIMESTAMP, 0, null)
insert into Voorwerp_in_Rubriek values ((select Voorwerpnummer from Voorwerp where titel = 'Rub verwijder test'), 3) --laatste getal hier is de rubriek waar hij in komt
insert into Voorwerp_in_Rubriek values ((select Voorwerpnummer from Voorwerp where titel = 'Rub verwijder test2'), 3)

--om ze te bekijken
select * from Voorwerp where titel like 'Rub ver%'
select * from Voorwerp_in_Rubriek where Voorwerp in (select Voorwerpnummer from Voorwerp where titel like 'Rub ver%')

--om ze te verwijderen
delete from Voorwerp_in_Rubriek where Voorwerp in (select Voorwerpnummer from Voorwerp where titel like 'Rub ver%')
delete from Voorwerp where titel like 'Rub ver%'
