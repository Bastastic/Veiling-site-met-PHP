use EenmaalAndermaal

delete Bestand
delete Bod
delete Feedback
delete Gebruikerstelefoon
delete Voorwerp_in_Rubriek
delete Voorwerp
delete Verkoper
delete Gebruiker
delete Rubriek
delete Vraag

insert into Vraag values
	(1, 'Wat is je lievelingsvruit?')

insert into Gebruiker values
	('Peter1', 'Peter', 'Petersen', 'Sesamstraat', null, '1234 AB', 'Arnhem', 'Nederland', '01/01/1990', 'peter@gmail.com', 'plaintext', 1, 'Appels', 1),
	('Peter2', 'Peter2', 'Petersen', 'Sesamstraat', null, '1234 AB', 'Arnhem', 'Nederland', '01/01/1990', 'peter2@gmail.com', 'plaintext', 1, 'Appels', 0)

insert into Verkoper values
	('Peter1', 'ING', 'INGB-123-414234-231', 'iDeal', null)

insert into Voorwerp values
	(1, 'JoJo t-shirt', 'Bring out your inner weeb', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null)

insert into Bestand values
	('E', 1)

insert into Bod values
	(1, 12, 'Peter1', GETDATE(), CURRENT_TIMESTAMP)

insert into Feedback values
	(1, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst')

insert into Gebruikerstelefoon values
	(1, 'Peter1', '06-12345678')

insert into Rubriek values
	(1, 'Kleding', null, 1),
	(2, 't-shirts', 1, 2)

insert into Voorwerp_in_Rubriek values
	(1, 2)
