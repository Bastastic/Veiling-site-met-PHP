USE iproject15;

create table Bestand (
	Filenaam			varchar(200)	not null,
	Voorwerp			int				not null,
	constraint PK_Bestand primary key (filenaam)
)

create table Bod (
	Voorwerp			int				not null,
	Bodbedrag			numeric(8,2)	not null,
	Gebruiker			varchar(25)		not null,
	BodDag				date			not null,
	BodTijdstip			time			not null,
	constraint PK_Bod primary key (Voorwerp, Bodbedrag),
	constraint AK_VoorwerpBodDatum unique (Voorwerp, BodDag, BodTijdstip),
	constraint AK_GebruikerBodDatum unique (Gebruiker, BodDag, BodTijdstip)
)

create table Feedback (
	Voorwerp			int				not null,
	Soort_Gebruiker		char(8)			not null, /* moet altijd koper of verkoper in staan */
	Feedbacksoort		numeric(1)		not null, /* 1 tot 5 */
	Dag					date			not null,
	Tijdstip			time			not null,
	Commentaar			varchar(300)	null,
	constraint PK_Feedback primary key (Voorwerp, Soort_Gebruiker),
	constraint CK_SoortGebruiker check (Soort_Gebruiker IN ('Koper', 'Verkoper')),
	constraint CK_Feedback_min check (Feedbacksoort >= 1),
	constraint CK_Feedback_max check (Feedbacksoort <= 5)
)

create table Gebruiker (
	Gebruikersnaam		varchar(25)		not null,
	Voornaam			varchar(30)		not null,
	Achternaam			varchar(30)		not null,
	Adresregel1			varchar(40)		not null,
	Adresregel2			varchar(40)		null,
	Postcode			char(7)			not null,
	Plaatsnaam			varchar(50)		not null,
	Land				varchar(40)		not null,
	GeboorteDag			date			not null,
	Mailbox				varchar(255)	not null,
	Wachtwoord			varchar(100)	not null, /* hashed */
	Vraag				tinyint			not null,
	Antwoordtext		varchar(100)	not null, /* hashed */
	Verkoper			bit				not null
	constraint PK_Gebruiker primary key (gebruikersnaam)
)

create table Gebruikerstelefoon (
	Volgnr				tinyint			not null,
	Gebruiker			varchar(25)		not null,
	Telefoon			varchar(15)		not null
	constraint PK_Gebruikerstelefoon primary key (volgnr, Gebruiker)
)

create table Rubriek (
	Rubrieknummer		smallint		not null,
	Rubrieknaam			varchar(24)		not null,
	Rubriek				smallint		null,
	Volgnr				smallint		not null
	constraint PK_Rubriek primary key (rubrieknummer)
)

create table Verkoper (
	Gebruiker			varchar(25)		not null,
	Bank				varchar(20)		null,
	Bankrekening		varchar(50)		null,
	Controle_optie		varchar(20)		not null,
	Creditcard			varchar(20)		null
	constraint PK_Verkoper primary key (Gebruiker)
)

create table Voorwerp (
	Voorwerpnummer			int				not null,
	Titel					varchar(20)		not null,
	beschrijving			varchar(2000)	not null,
	Startprijs				numeric(8,2)	not null,
	Betalingswijze			varchar(40)		not null,
	Betalingsinstructie		varchar(200)	null,
	Plaatsnaam				varchar(50)		not null,
	Land					varchar(40)		not null,
	Looptijd				tinyint			not null,
	LooptijdbeginDag		date			not null,
	LooptijdbeginTijdstip	time			not null,
	Verzendkosten			numeric(8,2)	null,
	Verzendinstructies		varchar(200)	null,
	Verkoper				varchar(25)		not null,
	Koper					varchar(25)		not null,
	LooptijdeindeDag		date			not null,
	LooptijdeindeTijdstip	time			not null,
	VeiligGesloten			bit				not null,
	Verkoopprijs			smallmoney		null
	constraint PK_Voorwerp primary key (Voorwerpnummer)
)

create table Voorwerp_in_Rubriek (
	Voorwerp					int				not null,
	Rubriek_op_Laagste_Niveau	smallint		not null
	constraint PK_VoorwerpInRubriek primary key (Voorwerp, Rubriek_op_Laagste_Niveau)
)

create table Vraag (
	Vraagnummer					tinyint			not null,
	Tekst_vraag					varchar(30)		not null
	constraint PK_Vraag primary key (Vraagnummer)
)



alter table Bestand
	add constraint FK_Bestand_Ref_Voorwerp foreign key (Voorwerp)
			references Voorwerp (Voorwerpnummer)
			on update no action on delete no action

alter table Bod
	add constraint FK_Bod_Ref_Voorwerp foreign key (Voorwerp)
			references Voorwerp (Voorwerpnummer)
			on update no action on delete no action,
		constraint FK_Bod_Ref_Gebruikersnaam foreign key (Gebruiker)
			references Gebruiker (Gebruikersnaam)
			on update no action on delete no action

alter table Feedback
	add constraint FK_Feedback_Ref_Voorwerpnummer foreign key (Voorwerp)
			references Voorwerp (Voorwerpnummer)
			on update no action on delete no action

alter table Gebruiker
	add constraint FK_Gebruiker_Ref_Vraagnummer foreign key (Vraag)
			references Vraag (Vraagnummer)
			on update cascade on delete cascade /* veranderingen aan een gebruiker moeten overal komen */

alter table Gebruikerstelefoon
	add constraint FK_Gebruikerstelefoon_Ref_Gebruikersnaam foreign key (Gebruiker)
			references Gebruiker (Gebruikersnaam)
			on update no action on delete no action

alter table Rubriek
	add constraint FK_Rubriek_Ref_Rubrieknummer foreign key (Rubriek)
			references Rubriek (Rubrieknummer)
			on update no action on delete no action

alter table Verkoper
	add constraint FK_Verkoper_Ref_Gebruikersnaam foreign key (Gebruiker)
			references Gebruiker (Gebruikersnaam)
			on update no action on delete no action

alter table Voorwerp
	add constraint FK_Voorwerp_Ref_Verkoper foreign key (Verkoper)
			references Verkoper (Gebruiker)
			on update no action on delete no action,
		constraint FK_Voorwerp_Ref_Gebruiker foreign key (Koper)
			references Gebruiker (Gebruikersnaam)
			on update no action on delete no action

alter table Voorwerp_in_Rubriek
	add constraint FK_VRubriek_Ref_Voorwerpnummer foreign key (Voorwerp)
			references Voorwerp (Voorwerpnummer)
			on update no action on delete no action,
		constraint FK_VRubriek_Ref_Rubrieknummer foreign key (Rubriek_op_Laagste_Niveau)
			references Rubriek (Rubrieknummer)
			on update no action on delete no action