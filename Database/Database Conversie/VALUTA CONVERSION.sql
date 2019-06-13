use iproject15
go

CREATE FUNCTION [dbo].[udf_OmzetValuta] (@bedrag
NUMERIC (8,2), @valuta VARCHAR(MAX))
-- in functie moet je de prijs en soort valuta invoeren
RETURNS VARCHAR(MAX)
AS 
BEGIN
-- Canadeese dollar, €1 = 1.5064
IF @valuta = 'CAD'
	BEGIN
		SET @bedrag = @bedrag * 1.5064
	END
-- Amerikaanse dollar, €1 = 1.1181
	IF @valuta = 'USD'
		BEGIN
			SET @bedrag = @bedrag * 1.1181
		END
-- Britse pond, €1 = 0.8682
	IF  @valuta = 'GBP'
		BEGIN
			SET @bedrag = @bedrag * 0.8682
	END
	RETURN @bedrag
END