<?php
    require '../php/connectDB.php';

    // Hier wordt de gestuurde Verificatiecode gecontroleerd met de ingevulde code. Als het klopt ga je naar profiel en anders blijf je op dezelfde pagina
    if (isset($_POST['code'])) {
        $code = intval($_POST['code']);
        $query = "SELECT *
            FROM Verificatie
            WHERE Verificatiecode = :code";
        $sql = $dbh->prepare($query);
        $sql->bindValue(":code", $code);
        $sql->execute();
        $resultaat = $sql->fetch(PDO::FETCH_ASSOC);

        if ($resultaat) {
            $query = "UPDATE Gebruiker
                    SET Geactiveerd = '1'
                    FROM Gebruiker
                    JOIN Verificatie
                    ON Gebruiker.Gebruikersnaam = Verificatie.Gebruikersnaam
                    WHERE Verificatiecode = :code";
            $sql = $dbh->prepare($query);
            $sql->bindValue(":code", $code);
            $sql->execute();

            $query = "DELETE FROM Verificatie
            WHERE Verificatiecode = :code";
            $sql = $dbh->prepare($query);
            $sql->bindValue(":code", $code);
            $sql->execute();

            header('Location: ../profiel.php?succ=1');
        } else {
            header('Location: ../mailverstuurd.php?errc=2');
        }
    } else {
        header('Location: ../mailverstuurd.php?errc=1');
    }

?>
