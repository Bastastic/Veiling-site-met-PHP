use iproject15
go

delete Bestand
delete Bod
delete Feedback
delete Voorwerp
delete Verkoper
delete Gebruikerstelefoon
delete Gebruiker
--delete Rubriek
delete Voorwerp_in_Rubriek
delete Vraag

insert into Vraag values
	(1, 'Wat is je lievelingsFfruit?'),
	(2, 'Wat is je lievelingseten?'),
	(3, 'Hoe heet jouw beste vriend/vriedin?'),
	(4, 'wat is de naam van jouw eerste baas?'),
	(5, 'Hoe hete jouw eerste  engels docent?')

insert into Gebruiker values
	('Peter1', 'Peter', 'Petersen', 'Pastoor van beijnenstraat 181', null, '5081 AP', 'Hilvarenbeek', 'Nederland', '1989-01-01', 'peter@gmail.com', 'plaintextLol2', 1, 'Appels', 1),
	('Peter2', 'Peter', 'Ekkel', 'Azaleastraat 116', null, '9581 CB', 'Musselkanaal', 'Nederland', '1990-01-01', 'Peter2@gmail.com', 'Bazinga1', 3, 'Alexander', 0),
	('Henk1','Henk', 'Jansen', 'Lantsheerstraat 160', null, '4356 AZ', 'Oostkappelle', 'Nederland', '1991-01-01', 'Jan2@gmail.com', 'Wachtwoord2', 2, 'Appeltaart', 0),
	('Henk2','Henk', 'Streefland', 'Deken Vaasstraat 8', null, '8472 AA', 'Wolvega', 'Nederland', '1992-01-01', 'henk22@gmail.com', 'Wachtwoord3', 5, 'Dirk', 1),
	('Henk3', 'Henk', 'Smeltink', 'Spoorpad 172', null, '5111 BW', 'Baarle-Nassau', 'Nederland', '1993-01-01', 'Henk3@gmail.com', 'Wachtwoord4', 2, 'Lasanga', 1),
	('Henk4', 'Henk', 'Henkies', 'Willem van Oranjestraat 11', null, '4931 NJ', 'Geertruidenberg', 'Nederland', '1994-01-01', 'Henk4@gmail.com', 'Wachtwoord5', 2, 'Brood', 1),
	('Wesley5', 'Wesley', 'Weslies', 'Fultonstraat 182', null, '2562 XC', 'Den Haag', 'Nederland', '1995-01-01', 'wesley2@gmail.com', 'Wachtwoord6', 4, 'Hareld', 0),
	('Harry2', 'Harry', 'Haries', 'Weesperzijde 118', null, '1097 DS', 'Amsterdam', 'Nederland', '1996-01-01', 'Harry2@gmail.com', 'Wachtwoord7', 1, 'Citroen', 1),
	('Harry1','Harry', 'Hekkie', 'Buizerdstraat 84', null, '3312 TC', 'Dordrecht', 'Nederland', '1997-01-01', 'Harry3@gmail.com', 'Wachtwoord8', 5, 'Berend', 0),
	('Bas3', 'Bas', 'Bassie', 'Hoofdweg 181', null, '9684 CL', 'Finsterwolde', 'Nederland', '1998-01-01', 'Bas3@gmail.com', 'Wachtwoord9', 3, 'Martijn', 0),
	('Bas2','Bas', 'Adriaan', 'In de Molt 162', null, '6269 EK', 'Margraten', 'Nederland', '1999-01-01', 'Bas2@gmail.com', 'Wachtwoord10', 4, 'Appels', 0),
	('Bas1','Bas', 'Bakkie', 'Louis Couperusstraat 44', null, '1054 CJ', 'Amsterdam', 'Nederland', '1990-08-06', 'Bas1@gmail.com', 'Wachtwoord11', 4, 'Rikkert', 1),
	('Dani3', 'Dani', 'Banaanie', 'Burgemeester Sustoriusstraat 156', null, '4813 PN', 'Breda', 'Nederland', '1990-08-09', 'Dani3@gmail.com', 'Wachtwoord12', 3, 'Greetje', 1),
	('Dani4','Dani', 'Dank', 'Count basiestraat 191', null, '3813 ZP', 'Amersfoort', 'Nederland', '1994-12-24', 'Dani4@gmail.com', 'Wachtwoord13', 3, 'Gert-jan', 0),
	('Dani2','Dani', 'Spinakie', 'Galgenstraat 149', null, '1012 LT', 'Amsterdam', 'Nederland', '1995-12-28', 'Dani2@gmail.com', 'Wachtwoord14', 2, 'Spekkoek', 1),
	('Erkan2', 'Erkan', 'Bam', 'De nije Kamers 172', null, '9076 JD', 'Sint Annaparochie', 'Nederland', '1991-11-28', 'Erkan2@gmail.com', 'Wachtwoord15', 5, 'Brian', 0),
	('Erkan3','Erkan', 'Berkan', 'Europark 143', null, '7102 AM', 'Winterswijk', 'Nederland', '1999-03-01', 'Erkan3@gmail.com', 'Wachtwoord16', 5, 'Egbert', 1),
	('Erkan1','Erkan', 'Slaags', 'Scheldekade 125', null, '4531 EG', 'Terneuzen', 'Nederland', '1999-05-01', 'Erkan1@gmail.com', 'Wachtwoord17', 3, 'Richard', 0),
	('Bazinga12','Bata', 'bat', 'Esperantolaan 106', null, '6824 LW', 'Arnhem', 'Nederland', '1999-07-01', 'Bazinga12@gmail.com', 'Wachtwoord18', 2, 'Boerenkool', 0),
	('DioBrando2', 'Dio', 'Brando', 'Touwslagerwie 200', null, '5551SJ', 'Volkenswaard', 'Nederland', '1999-4-12', 'Diobrando1@gmail.com', 'Wachtwoord19', 4, 'Banaan', 1)

	insert into Verkoper values
	('Peter1', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Peter2','ING', 'INGB-123-414234-231', 'iDeal', null),
	('Henk1', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Henk2', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Henk3',  'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Henk4', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Wesley5', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Harry2', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Harry1', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Bas3',  'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Bas2', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Bas1', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Dani3',  'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Dani4', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Dani2', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Erkan2', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Erkan3', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Erkan1', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('Bazinga12', 'ING', 'INGB-123-414234-231', 'iDeal', null),
	('DioBrando2', 'ING', 'INGB-123-414234-231', 'iDeal', null)

insert into Voorwerp (Titel, Beschrijving, Kleur, Afmeting, Merk, Conditie, Startprijs, Betalingswijze, Betalingsinstructie, Plaatsnaam, Land, Looptijd, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten, Verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeiligGesloten, Verkoopprijs)
values
	('JoJo t-shirt', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Mooie auto', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Dikke BWM', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Schep', 'Bring out your inner weeb', null, null, null, 'zgan', 20 , 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('PS4', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Nintendo switch', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('PS3', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('xbox 360', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Motorola G', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Vodafone Smart 2', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('grasmaaier', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Bestek', 'Bring out your inner weeb', null, null, null,'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Mok (batman)', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Mooie bankestel', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Tafel', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('theekopjes', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Schilderij (mona lisa)', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('tulpenbollen', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Rolschaatsen', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	('Skateboard', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null)

insert into Bestand values
('F:\afb\0',0),
('F:\afb\1',1),
('F:\afb\2',2),
('F:\afb\3',3),
('F:\afb\4',4),
('F:\afb\5',5),
('F:\afb\6',6),
('F:\afb\7',7),
('F:\afb\8',8),
('F:\afb\9',9),
('F:\afb\10',10),
('F:\afb\11',11),
('F:\afb\12',12),
('F:\afb\13',13),
('F:\afb\14',14),
('F:\afb\15',15),
('F:\afb\16',16),
('F:\afb\17',17),
('F:\afb\18',18),
('F:\afb\19',19)

insert into Bod values
	(0, 12, 'Peter1', '2019-04-25', '16:52:56'),
	(1, 20, 'Peter2', '2019-04-25', '18:00:23'),
	(2, 25, 'Henk1', '2019-04-25', '17:23:42'),
	(3, 15, 'Henk2', '2019-04-25', '13:42:32'),
	(4, 10, 'Henk3', '2019-04-25', '10:23:12'),
	(5, 8, 'Henk4', '2019-04-25', '19:42:45'),
	(6, 18, 'Wesley5', '2019-04-25','12:23:32'),
	(7, 43, 'Harry2', '2019-04-25', '14:23:21'),
	(8, 21, 'Harry1', '2019-04-25', '09:21:23'),
	(9, 50, 'Bas3', '2019-04-25', '11:09:21'),
	(10, 75, 'Bas2', '2019-04-25', '13:43:59'),
	(11, 70, 'Bas1', '2019-04-25', '13:49:12'),
	(12, 65, 'Dani3', '2019-04-25', '16:27:41'),
	(13, 14, 'Dani4', '2019-04-25', '23:12:32'),
	(14, 32, 'Dani2', '2019-04-25', '22:43:12'),
	(15, 35, 'Erkan2', '2019-04-25', '21:43:21'),
	(16, 40, 'Erkan3', '2019-04-25', '20:53:18'),
	(17, 32, 'Erkan1', '2019-04-25', '18:52:23'),
	(18, 20, 'Bazinga12', '2019-04-25', '03:23:50'),
	(19, 43, 'DioBrando2', '2019-04-25', '01:26:32')

insert into Feedback values
	(0, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(1, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(2, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(3, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(4, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(5, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(6, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(7, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(8, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(9, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(10, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(11, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(12, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(13, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(14, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(15, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(16, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(17, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(18, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(19, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst')

insert into Gebruikerstelefoon values
	(1, 'Peter1','+31634234342'),
	(2, 'Peter2','+31634534534'),
	(3, 'Henk1','+31652452454'),
	(4, 'Henk2','+31645345435'),
	(5, 'Henk3','+31634534534'),
	(6, 'Henk4','+31623842837'),
	(7, 'Wesley5','+31634234839'),
	(8, 'Harry2','+31612345678'),
	(9, 'Harry1','+31635245242'),
	(10,'Bas3','+316342335543'),
	(11,'Bas2','+316345354353'),
	(12,'Bas1','+316345345342'),
	(13,'Dani3','+31608324983'),
	(14,'Dani4','+31602384723'),
	(15,'Dani2','+31612890824'),
	(16,'Erkan2','+31608235063'),
	(17,'Erkan3','+31623491879'),
	(18,'Erkan1','+31623479237'),
	(19,'Bazinga12','+31620398082'),
	(20,'DioBrando2','+31629377239')

insert into Voorwerp_in_Rubriek values
	(0, 1),
	(1, 2),
	(2, 3),
	(3, 4),
	(4, 5),
	(5, 6),
	(6, 7),
	(7, 8),
	(8, 9),
	(9, 10),
	(10, 11),
	(11, 12),
	(12, 13),
	(13, 14),
	(14, 15),
	(15, 16),
	(16, 17),
	(17, 18),
	(18, 19),
	(19, 20)