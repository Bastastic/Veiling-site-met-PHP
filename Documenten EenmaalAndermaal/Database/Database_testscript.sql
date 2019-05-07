use iproject15

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

insert into Voorwerp values
	(125325126, 'JoJo t-shirt', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(723273823, 'Mooie auto', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(214783973, 'Dikke BWM', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(712430294, 'Schep', 'Bring out your inner weeb', null, null, null, 'zgan', 20 , 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(930840283, 'PS4', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234923943, 'Nintendo switch', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234892383, 'PS3', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(123983293, 'xbox 360', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(293289033, 'Motorola G', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234988433, 'Vodafone Smart 2', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(293297323, 'grasmaaier', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(102930892, 'Bestek', 'Bring out your inner weeb', null, null, null,'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(239482333, 'Mok (batman)', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(238749329, 'Mooie bankestel', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234923894, 'Tafel', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234938433, 'theekopjes', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(134783472, 'Schilderij (mona lisa)', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234983488, 'tulpenbollen', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(234234792, 'Rolschaatsen', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null),
	(388348392, 'Skateboard', 'Bring out your inner weeb', null, null, null, 'zgan', 20, 'Bank', null, 'Arnhem', 'Nederland', '7',  GETDATE(), CURRENT_TIMESTAMP, 0.95, null, 'Peter1', 'Peter2', GETDATE()+7, CURRENT_TIMESTAMP, 0, null)


insert into Bestand values
('F:\afb\125325126',125325126),
('F:\afb\723273823',723273823),
('F:\afb\214783973',214783973),
('F:\afb\712430294',712430294),
('F:\afb\930840283',930840283),
('F:\afb\234923943',234923943),
('F:\afb\234892383',234892383),
('F:\afb\123983293',123983293),
('F:\afb\293289033',293289033),
('F:\afb\234988433',234988433),
('F:\afb\293297323',293297323),
('F:\afb\102930892',102930892),
('F:\afb\239482333',239482333),
('F:\afb\238749329',238749329),
('F:\afb\234923894',234923894),
('F:\afb\234938433',234938433),
('F:\afb\134783472',134783472),
('F:\afb\234983488',234983488),
('F:\afb\234234792',234234792),
('F:\afb\388348392',388348392)

insert into Bod values
	(125325126, 12, 'Peter1', '2019-04-25', '16:52:56'),
	(723273823, 20, 'Peter2', '2019-04-25', '18:00:23'),
	(214783973, 25, 'Henk1', '2019-04-25', '17:23:42'),
	(712430294, 15, 'Henk2', '2019-04-25', '13:42:32'),
	(930840283, 10, 'Henk3', '2019-04-25', '10:23:12'),
	(234923943, 8, 'Henk4', '2019-04-25', '19:42:45'),
	(234892383, 18, 'Wesley5', '2019-04-25','12:23:32'),
	(123983293, 43, 'Harry2', '2019-04-25', '14:23:21'),
	(293289033, 21, 'Harry1', '2019-04-25', '09:21:23'),
	(234988433, 50, 'Bas3', '2019-04-25', '11:09:21'),
	(293297323, 75, 'Bas2', '2019-04-25', '13:43:59'),
	(102930892, 70, 'Bas1', '2019-04-25', '13:49:12'),
	(239482333, 65, 'Dani3', '2019-04-25', '16:27:41'),
	(238749329, 14, 'Dani4', '2019-04-25', '23:12:32'),
	(234923894, 32, 'Dani2', '2019-04-25', '22:43:12'),
	(234938433, 35, 'Erkan2', '2019-04-25', '21:43:21'),
	(134783472, 40, 'Erkan3', '2019-04-25', '20:53:18'),
	(234983488, 32, 'Erkan1', '2019-04-25', '18:52:23'),
	(234234792, 20, 'Bazinga12', '2019-04-25', '03:23:50'),
	(388348392, 43, 'DioBrando2', '2019-04-25', '01:26:32')

insert into Feedback values
	(125325126, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(723273823, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(214783973, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(712430294, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(930840283, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234923943, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234892383, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(123983293, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(293289033, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234988433, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(293297323, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(102930892, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(239482333, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(238749329, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234923894, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234938433, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(134783472, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234983488, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(234234792, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst'),
	(388348392, 'Koper', 5, GETDATE(), CURRENT_TIMESTAMP, 'testTekst')

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
	(125325126, 1),
	(723273823, 2),
	(214783973, 3),
	(712430294, 4),
	(930840283, 5),
	(234923943, 6),
	(234892383, 7),
	(123983293, 8),
	(293289033, 9),
	(234988433, 10),
	(293297323, 11),
	(102930892, 12),
	(239482333, 13),
	(238749329, 14),
	(234923894, 15),
	(234938433, 16),
	(134783472, 17),
	(234983488, 18),
	(234234792, 19),
	(388348392, 20)