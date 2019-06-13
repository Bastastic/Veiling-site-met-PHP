use iproject15
go

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

-- vervang HTML tag &amp; met de  '&' Karakter 
SET @Start = CHARINDEX('&amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
SET @Start = CHARINDEX('&amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- Vervang HTML tag: &lt; met de '<' Karakter
SET @Start = CHARINDEX('&lt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '<')
SET @Start = CHARINDEX('&lt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- vervang de HTML tag &gt; met de '>' karakter
SET @Start = CHARINDEX('&gt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '>')
SET @Start = CHARINDEX('&gt;', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- Vervang HTML tag &amp; met de '&' character
SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '&')
SET @Start = CHARINDEX('&amp;amp;', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- vervang de tag &nbsp; met de ' ' character
SET @Start = CHARINDEX('&nbsp;', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
SET @Start = CHARINDEX('&nbsp;', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1
END


-- vervang elke <br> tag met een ' ' karakter

SET @Start = CHARINDEX('<br>', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
SET @Start = CHARINDEX('<br>', @HTMLText)
SET @End = @Start + 3
SET @Length = (@End - @Start) + 1
END

-- vervang <br/> tag met een ' ' karakter
SET @Start = CHARINDEX('<br/>', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
SET @Start = CHARINDEX('<br/>', @HTMLText)
SET @End = @Start + 4
SET @Length = (@End - @Start) + 1
END

-- vervang <br /> tag met een ' ' karakter
SET @Start = CHARINDEX('<br />', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, ' ')
SET @Start = CHARINDEX('<br />', @HTMLText)
SET @End = @Start + 5
SET @Length = (@End - @Start) + 1
END

-- vervang <STYLE or </STYLE> met ''
SET @Start = CHARINDEX('<STYLE', @HTMLText)
SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('<', @HTMLText)) + 7
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
SET @Start = CHARINDEX('<STYLE', @HTMLText)
SET @End = CHARINDEX('</STYLE>', @HTMLText, CHARINDEX('</STYLE>', @HTMLText)) + 7
SET @Length = (@End - @Start) + 1
END

-- vervang <SCRIPT or </SCRIPT met ''
SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
SET @End = CHARINDEX('</SCRIPT', @HTMLText, CHARINDEX('<', @HTMLText)) + 8
SET @Length = (@End - @Start) + 1

WHILE (@Start > 0 AND @End > 0 AND @Length > 0) BEGIN
SET @HTMLText = STUFF(@HTMLText, @Start, @Length, '')
SET @Start = CHARINDEX('<SCRIPT', @HTMLText)
SET @End = CHARINDEX('</SCRIPT>', @HTMLText, CHARINDEX('</SCIRPT>', @HTMLText)) + 8
SET @Length = (@End - @Start) + 1
END

-- Alles wat tussen '<>' tags staat, weghalen
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
GO
