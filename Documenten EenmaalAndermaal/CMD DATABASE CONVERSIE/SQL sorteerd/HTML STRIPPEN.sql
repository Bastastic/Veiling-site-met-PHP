CREATE FUNCTION [dbo].[udf_StripHTML] (@HTMLText VARCHAR(MAX))
RETURNS VARCHAR(MAX) AS
BEGIN
    DECLARE @Start INT
    DECLARE @End INT
    DECLARE @Length INT
    SET @Start = CHARINDEX('<',@HTMLText)
    SET @End = CHARINDEX('>',@HTMLText,CHARINDEX('<',@HTMLText))
    SET @Length = (@End - @Start) + 1
    WHILE @Start > 0 AND @End > 0 AND @Length > 0
    BEGIN
        SET @HTMLText = STUFF(@HTMLText,@Start,@Length,'')
        SET @Start = CHARINDEX('<',@HTMLText)
        SET @End = CHARINDEX('>',@HTMLText,CHARINDEX('<',@HTMLText))
        SET @Length = (@End - @Start) + 1
    END
    RETURN LTRIM(RTRIM(@HTMLText))
END
GO

ALTER FUNCTION [dbo].[udf_StripHTML]
(
@HTMLText varchar(MAX)
)
RETURNS varchar(MAX)
AS
BEGIN
DECLARE @Start  int
DECLARE @End    int
DECLARE @Length int

-- Replace the HTML entity &amp; with the '&' character (this needs to be done first, as
-- '&' might be double encoded as '&amp;amp;')
SET @Start = CHARINDEX('&amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
SET @Start = CHARINDEX('&amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- Replace the HTML entity &lt; with the '<' character
SET @Start = CHARINDEX('&lt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '<')
SET @Start = CHARINDEX('&lt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- Replace the HTML entity &gt; with the '>' character
SET @Start = CHARINDEX('&gt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '>')
SET @Start = CHARINDEX('&gt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- Replace the HTML entity &amp; with the '&' character
SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- Replace the HTML entity &nbsp; with the ' ' character
SET @Start = CHARINDEX('&nbsp;', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
SET @Start = CHARINDEX('&nbsp;', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1
END


-- Replace any <br> tags with a newline

SET @Start = CHARINDEX('<br>', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'CHAR(13) + CHAR(10')
SET @Start = CHARINDEX('<br>', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- Replace any <br/> tags with a newline
SET @Start = CHARINDEX('<br/>', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'CHAR(13) + CHAR(10)')
SET @Start = CHARINDEX('<br/>', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- Replace any <br /> tags with a newline
SET @Start = CHARINDEX('<br />', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, 'CHAR(13) + CHAR(10)')
SET @Start = CHARINDEX('<br />', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1
END

SET @Start = CHARINDEX('<STYLE', @HTMLText)
SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('<', @HTMLText)) + 7
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
SET @Start = CHARINDEX('<STYLE', @HTMLText)
SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('</STYLE>', @HTMLText)) + 7
SET @Length = (@End - @Start) + 1
END

SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
SET @End = CHARINDEX('</SCRIPT', @HTMLText, CHARINDEX('<', @HTMLText)) + 8
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
SET @End = CHARINDEX('</SCRIPT>', @HTMLText, CHARINDEX('</SCIRPT>', @HTMLText)) + 8
SET @Length = (@End - @Start) + 1
END

-- Remove anything between <whatever> tags
SET @Start = CHARINDEX('<', @HTMLText)
SET @End = CHARINDEX('>', @HTMLText, CHARINDEX('<', @HTMLText))
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
SET @Start = CHARINDEX('<', @HTMLText)
SET @End = CHARINDEX('>', @HTMLText, CHARINDEX('<', @HTMLText))
SET @Length = (@End - @Start) + 1
END

RETURN LTRIM(RTRIM(@HTMLText))

END

--SELECT DISTINCT dbo.udf_StripHTML([Beschrijving]) as col1
--FROM Items

--SELECT TOP(10) Beschrijving
--FROM Items

--UPDATE iproject15.dbo.Items
--SET iproject15.dbo.Items.Beschrijving = dbo.udf_StripHTML([Beschrijving])
--FROM iproject15.dbo.Items

SELECT voorwerpnummer, titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip 
													FROM Voorwerp
													WHERE voorwerpnummer BETWEEN 20 AND 20 + 30