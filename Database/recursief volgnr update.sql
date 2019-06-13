/*
alter PROCEDURE [dbo].updateVolgnr(@rubrieknr int, @volgnr int) as
begin
    set nocount on

    update Rubriek
    set volgnr = @volgnr
    where Rubrieknummer = @rubrieknr;

    with Hierarchy(Rubrieknummer, Hoofdrubriek, VolgnrOut)
    as (select R.Rubrieknummer, R.Hoofdrubriek, R.volgnr
        from Rubriek R
        where R.Rubrieknummer = @rubrieknr
        union all
        select R.Rubrieknummer, R.Hoofdrubriek,
            H.VolgnrOut
        from Hierarchy H
            join Rubriek R on R.Hoofdrubriek = H.Rubrieknummer
    )
    update Rubriek
    set volgnr = H.VolgnrOut
    from Rubriek R
        join Hierarchy H on H.Rubrieknummer = R.Rubrieknummer
    where
        R.Rubrieknummer != @rubrieknr
end

EXEC updateVolgnr -1, 0;
*/
ALTER PROCEDURE updateVolgnr as
BEGIN
    UPDATE Rubriek set volgnr = 0;
    DECLARE @i int = 0;
    DECLARE @length INT;
        SELECT @length = TOTAL FROM (
        SELECT TOP (1) rubrieknummer AS TOTAL FROM Rubriek ORDER BY rubrieknummer DESC) DET

    WHILE @i < @length
    BEGIN
        DECLARE @j int = 0;
        DECLARE @sub INT;
            SELECT @sub = TOTAL FROM (
            SELECT COUNT(rubrieknummer) AS TOTAL
            FROM Rubriek WHERE Hoofdrubriek = (@i + 1) ) DET
        PRINT @sub;
        WHILE @j < @sub
        BEGIN
            UPDATE TOP (1) Rubriek set volgnr = (@j + 1)
            WHERE Hoofdrubriek = (@i + 1) AND volgnr = 0
            SET @j = @j + 1;
        END
        SET @i = @i + 1;
    END;
END;

update Rubriek set volgnr = 0 

exec updateVolgnr;