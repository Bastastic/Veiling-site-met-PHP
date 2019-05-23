CREATE FUNCTION [dbo].[udf_OmzetValuta] (@bedrag
NUMERIC (8,2), @valuta VARCHAR(MAX))
RETURNS VARCHAR(MAX)
AS 
BEGIN
IF @valuta = 'CAD'
	BEGIN
		SET @bedrag = @bedrag * 1.5064
	END

	IF @valuta = 'USD'
		BEGIN
			SET @bedrag = @bedrag * 1.1181
		END

	IF  @valuta = 'GBP'
		BEGIN
			SET @bedrag = @bedrag * 0.8682
	END
	RETURN @bedrag
	END