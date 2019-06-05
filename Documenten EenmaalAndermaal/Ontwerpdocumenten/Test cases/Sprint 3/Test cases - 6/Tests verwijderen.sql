select * from Voorwerp_in_Rubriek
where Rubriek_op_Laagste_Niveau = 138

select * from Rubriek
where Hoofdrubriek = 138

insert into Rubriek values (138, 'Overige Disneyana', 137, 138)

insert into Voorwerp values ('Rub verwijder test', 'abc', 1, 'Creditcard', null, 'Arnhem', 'Nederland', 1, GETDATE(), CURRENT_TIMESTAMP, null, null, 'gebruiker', null, GETDATE()+1, CURRENT_TIMESTAMP, 0, null)
insert into Voorwerp_in_Rubriek values (400807919465, 138)

select * from Voorwerp where titel like 'Rub ver%'
select * from Voorwerp_in_Rubriek where Voorwerp = 400807919465

delete from Voorwerp_in_Rubriek where Voorwerp = 400807919465
delete from Voorwerp where titel like 'Rub ver%'